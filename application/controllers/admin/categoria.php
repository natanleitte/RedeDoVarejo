<?php

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {

        $this->load->model('categoriamodel');
        $data['query'] = $this->categoriamodel->obterTodos();
        $this->load->helper('url');
        $this->load->view('admin/head');
        $this->load->view('admin/categoria', $data);
    }

    public function inserir() {
        //carrega model
        $this->load->model('categoriamodel');

        //recebe quantidade de Elementos inseridos na página
        $qtd = $this->input->post('qtdElementos');

        for ($i = 1; $i <= $qtd; $i++) {
            if ($i == 1) {
                //pega o post de cat_nome
                $data['cat_nome'] = trim($this->input->post('cat_nome'));
                $valida = trim($this->input->post('cat_nome'));
                $cat_status = $this->input->post('cat_status');
                $data['cat_status'] = (!strcmp($cat_status, "on")) ? 1 : 0;
            } else {
                $elemento = "cat_nome" . $i . "";
                $strStatus = "cat_status" . $i . "";

                $data['cat_nome'] = trim($this->input->post($elemento));
                $valida = trim($this->input->post($elemento));

                $cat_status = $this->input->post($strStatus);

                //verfifica se status está checado ou não e atribui 1 ou 0
                $data['cat_status'] = (!strcmp($cat_status, "on")) ? 1 : 0;
            }

            // consulta para verificar se a categoria ja existe
            $exist = $this->categoriamodel->obterConsulta("SELECT cat_nome FROM categoria WHERE cat_nome = '" . $valida . "'");

            // verifica se os campos foram inicializados
            if ($data['cat_nome'] == '') {
                // Retorna para a página informando o erro
                header('Location:' . base_url() . 'index.php/admin/categoria/categoria?error=' . urlencode('Existe(m) campo(s) vazio(s)!'));
            } else
            // verifica se já existe
            if ($exist->num_rows()) {
                // Retorna para a página informando o erro
                header('Location:' . base_url() . 'index.php/admin/categoria/categoria?error=' . urlencode('Categoria já existe!'));
            } else {
                // Realiza a inserção da pasta com o nome da nova categoria
                mkdir("assets/img/img-itens/" . $this->removeAscento($data['cat_nome']), 0777);

                // invoca método da model que insere no banco
                $this->categoriamodel->inserir($data);

                // Retorna para a página com a mensagem de sucesso
                header('Location:' . base_url() . 'index.php/admin/categoria/categoria?sucess=' . urlencode('Cadastro realizado com sucesso!'));
            }
        }
    }

    public function jsonCategoria() {
        //carrega model
        $this->load->model('categoriamodel');

        $editaCodigo = $this->input->post('var');

        $query = "SELECT * FROM categoria WHERE cat_codigo = " . $editaCodigo;
        $result = $this->categoriamodel->obterConsulta($query);

        foreach ($result->result() as $row) {
            $array = array(
                $row->cat_codigo,
                $row->cat_nome,
                $row->cat_status,
            );
        }
        echo json_encode($array);
    }

    public function editar() {
        //carrega model
        $this->load->model('categoriamodel');

        //Recebe os novos valores dos campos
        $data['cat_nome'] = trim($this->input->post('cat_nome'));
        $pathNew = trim($this->input->post('cat_nome'));
        $data['cat_codigo'] = $this->input->post('cat_codigo');
        $data['cat_status'] = $this->input->post('cat_status');

        // verifica se os campos foram inicializados
        if ($data['cat_nome'] == '' OR $data['cat_status'] == '') {
            // Retorna para a página informando o erro
            header('Location:' . base_url() . 'index.php/admin/categoria/categoria?error=' . urlencode('Existe(m) campo(s) vazio(s)!'));
        } else {

            $query = "UPDATE categoria"
                    . " SET cat_nome = '" . $data['cat_nome'] . "', cat_codigo= '" . $data['cat_codigo'] . "', cat_status= '" . $data['cat_status']
                    . "' WHERE cat_codigo= '" . $data['cat_codigo'] . "'";

            // Renomeia a pasta de categoria
            $query2 = $this->categoriamodel->obterConsulta('SELECT cat_nome FROM categoria WHERE cat_codigo=' . $data['cat_codigo']);
            foreach ($query2->result() as $row) {
                $pathOld = $row->cat_nome;
            }
            rename("assets/img/img-itens/" . $this->removeAscento($pathOld), "assets/img/img-itens/" . $this->removeAscento($pathNew));

            //Realiza a consulta (Editar Produto)
            $this->categoriamodel->obterConsulta($query);

            //Redireciona para a pagina principal
            header('Location:' . base_url() . 'index.php/admin/categoria/categoria?edit=' . urlencode('Edição realizada com sucesso!'));
        }
    }

    public function excluir() {
        // Load nas Model
        $this->load->model('categoriamodel');

        //Pega o número do código
        $data['cat_codigo'] = $this->input->post('cat_codigo');
        $data['cat_nome'] = trim($this->input->post('cat_nome'));

        //Verifica se não existem produtos que pertencem a esta categoria
        $queryPro = $this->categoriamodel->obterConsulta("SELECT pro_codigo, pro_nome FROM produto WHERE cat_codigo=" . $data['cat_codigo']);

        if ($queryPro->num_rows() > 0) {
            $produtoID = $queryPro->row('pro_codigo');

            //Verifica se não existem itens que pertencem a esta categoria
            $queryItem = $this->categoriamodel->obterConsulta("SELECT item_codigo, item_nome, item_img FROM item WHERE pro_codigo=" . $produtoID);

            $pathOld = $data['cat_nome'];
            if ($queryItem->num_rows() > 0) {
                foreach ($queryItem->result() as $row) {
                    $imagemNome = $row->item_img;
                    $imagem_dir = "assets/img/img-itens/" . $this->removeAscento($pathOld) . "/" . $this->removeAscento($queryPro->row('pro_nome')) . "/" . $imagemNome;
                    //Remove o arquivo antigo
                    unlink($imagem_dir);

                    //Exclui do banco
                    $this->categoriamodel->obterConsulta('DELETE FROM item WHERE item_codigo = ' . $row->item_codigo);
                }
            }

            //Deleta pasta dos produtos
            rmdir("assets/img/img-itens/" . $this->removeAscento($pathOld) . "/" . $this->removeAscento($queryPro->row('pro_nome')));

            //Realiza a consulta (Excluir Produto)
            $this->categoriamodel->obterConsulta("DELETE FROM produto WHERE pro_codigo = " . $produtoID);
        }

        //Realiza a exlusão em banco
        $this->categoriamodel->obterConsulta('DELETE FROM categoria WHERE cat_codigo = ' . $data['cat_codigo']);

        //Deleta pasta dos produtos
        rmdir("assets/img/img-itens/" . $this->removeAscento($data['cat_nome']));

        //Redireciona para a pagina principal
        header('Location:' . base_url() . 'index.php/admin/categoria/categoria?edit=' . urlencode('Exclusão realizada com sucesso!'));
    }

    function removeAscento($string) {
        $map = array(
            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            'Á' => 'A',
            'À' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'É' => 'E',
            'Ê' => 'E',
            'Í' => 'I',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ú' => 'U',
            'Ü' => 'U',
            'Ç' => 'C'
        );
        return strtr($string, $map); // funciona corretamente
    }

}
