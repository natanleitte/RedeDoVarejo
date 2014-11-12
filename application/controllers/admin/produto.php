<?php

class Produto extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //Load na model
        $this->load->model('produtomodel');
        $this->load->model('categoriamodel');

        // Consultas
        $data['query'] = $this->produtomodel->obterTodos();
        $data['query1'] = $this->categoriamodel->obterTodos();
        $data['consulta'] = $this->produtomodel->obterConsulta('SELECT * FROM categoria c LEFT JOIN (produto p) ON (p.cat_codigo = c.cat_codigo) WHERE NOT ISNULL(pro_codigo)');

        $this->load->helper('url');
        $this->load->view('admin/head');
        $this->load->view('admin/produto', $data);
    }

    public function inserir() {
        //Load na model
        $this->load->model('produtomodel');

        //recebe quantidade de Elementos inseridos na página
        $qtd = $this->input->post('qtdElementos');

        for ($i = 1; $i <= $qtd; $i++) {
            if ($i == 1) {
                //pega os valores
                $data['cat_codigo'] = $this->input->post('cat_codigo');
                $data['pro_nome'] = trim($this->input->post('pro_nome'));
                $valida = trim($this->input->post('pro_nome'));
                $pro_status = $this->input->post('pro_status');
                $data['pro_status'] = (!strcmp($pro_status, "on")) ? 1 : 0;
            } else {
                $elemento = "pro_nome" . $i . "";
                $strStatus = "pro_status" . $i . "";
                $data['cat_codigo'] = $this->input->post('cat_codigo');
                $data['pro_nome'] = trim($this->input->post($elemento));
                $valida = trim($this->input->post($elemento));
                $pro_status = $this->input->post($strStatus);
                $data['pro_status'] = (!strcmp($pro_status, "on")) ? 1 : 0;
            }

            // consulta para verificar se a categoria ja existe
            $exist = $this->produtomodel->obterConsulta("SELECT pro_nome FROM produto WHERE pro_nome = '" . $valida . "' AND cat_codigo='" . $data['cat_codigo'] . "'");

            if ($data['pro_nome'] == '') {
                // Retorna para a página informando o erro
                header('Location:' . base_url() . 'index.php/admin/produto/produto?error=' . urlencode('Existe(m) campo(s) vazio(s)!'));
            } else
            if ($exist->num_rows()) {
                // Retorna para a página informando o erro
                header('Location:' . base_url() . 'index.php/admin/produto/produto?error=' . urlencode('Produto já existe!'));
            } else {
                // Cria a pasta com o nome do novo produto na categoria selecionada
                $consulta = "SELECT cat_nome FROM categoria WHERE cat_codigo = " . $data['cat_codigo'];
                $categoria = $this->produtomodel->obterConsulta($consulta);
                mkdir("assets/img/img-itens/" . $this->removeAscento($categoria->row('cat_nome')) . "/" . $this->removeAscento($data['pro_nome']), 0777);

                // Insere no banco
                $this->produtomodel->inserir($data);

                // Retorna para a página informando o status
                header('Location:' . base_url() . 'index.php/admin/produto/produto?sucess=' . urlencode('Inserido(s) com sucesso!'));
            }
        }
    }

    function excluir() {
        // Load Model
        $this->load->model('produtomodel');
        $this->load->model('itemmodel');

        //Pega o código do produto
        $data['pro_codigo'] = $this->input->post('pro_codigo');
        $data['pro_nome'] = trim($this->input->post('pro_nome'));
        $data['cat_codigo'] = $this->input->post('cat_codigo');

        //Verifica se não existe itens para este produto
        $queryItem = $this->produtomodel->obterConsulta('SELECT item_img, item_codigo FROM item WHERE pro_codigo=' . $data['pro_codigo']);
        //Verifica a categoria
        $queryCat = $this->produtomodel->obterConsulta('SELECT cat_nome FROM categoria WHERE cat_codigo=' . $data['cat_codigo']);
        
        $pathOld = $queryCat->row('cat_nome');
        
        if ($queryItem->num_rows() > 0) {
            foreach ($queryItem->result() as $row) {
                $imagemNome = $row->item_img;
                $imagem_dir = "assets/img/img-itens/" . $this->removeAscento($pathOld) . "/" . $this->removeAscento($data['pro_nome']) . "/" . $imagemNome;

                //Remove o arquivo antigo
                unlink($imagem_dir);

                //Exclui do banco
                $this->produtomodel->obterConsulta('DELETE FROM item WHERE item_codigo = ' . $row->item_codigo);
            }
        }

        //Deleta pasta dos produtos
        rmdir("assets/img/img-itens/" . $this->removeAscento($pathOld) . "/" . $this->removeAscento($data['pro_nome']));

        //Realiza a consulta (Excluir Produto)
        $this->produtomodel->obterConsulta("DELETE FROM produto WHERE pro_codigo = " . $data['pro_codigo']);

        // Retorna para a página informando o erro
        header('Location:' . base_url() . 'index.php/admin/produto/produto?sucess=' . urlencode('Exclusão realizada com sucesso!'));
    }

    public function editar() {
        //Load Model
        $this->load->model('produtomodel');

        //Pega o código do produto
        $data['pro_codigo'] = $this->input->post('pro_codigo');

        //Recebe os novos valores dos campos
        $data['pro_nome'] = trim($this->input->post('pro_nome'));
        $pathNew = trim($this->input->post('pro_nome'));
        $data['cat_codigo'] = $this->input->post('cat_codigo');
        $data['pro_status'] = $this->input->post('pro_status');

        $consulta = "UPDATE produto"
                . " SET pro_nome = '" . $data['pro_nome'] . "', cat_codigo= '" . $data['cat_codigo'] . "', pro_status= '" . $data['pro_status']
                . "' WHERE pro_codigo= " . $data['pro_codigo'];

        if ($data['pro_nome'] == '' || $data['cat_codigo'] == '' || $data['pro_status'] == '') {
            // Retorna para a página informando o erro
            header('Location:' . base_url() . 'index.php/admin/produto/produto?error=' . urlencode('Edição não realizada: Existe(m) campo(s) vazio(s)!'));
        } else {

            //Obtem pasta dos produtos
            $query = $this->produtomodel->obterConsulta("SELECT cat_nome FROM categoria WHERE cat_codigo = " . $data['cat_codigo']);
            $pathNew_cat = $query->row('cat_nome');

            // Renomeia a pasta do produto
            $query3 = $this->produtomodel->obterConsulta("SELECT pro_nome, cat_codigo FROM produto WHERE pro_codigo= " . $data['pro_codigo']);
            $pathOld = $query3->row('pro_nome');

            //Obtem pasta dos produtos
            $query2 = $this->produtomodel->obterConsulta("SELECT cat_nome FROM categoria WHERE cat_codigo = " . $query3->row('cat_codigo'));
            $pathOld_cat = $query2->row('cat_nome');

            //Remove a pasta para a nova categoria
            if ($pathOld_cat != $pathNew_cat) {
                $this->copyr($data['pro_codigo'], $pathOld_cat, $pathNew_cat, $pathOld, $pathNew);
            } else {
                $img_old = "assets/img/img-itens/" . $this->removeAscento($pathOld_cat) . "/" . $this->removeAscento($pathOld);
                $img_new = "assets/img/img-itens/" . $this->removeAscento($pathNew_cat) . "/" . $this->removeAscento($pathNew);
                rename($img_old, $img_new);
            }
            //Realiza a consulta (Editar Produto)
            $this->produtomodel->obterConsulta($consulta);

            // Retorna para a página informando o erro
            header('Location:' . base_url() . 'index.php/admin/produto/produto?sucess=' . urlencode('Edição realizada com sucesso!'));
        }
    }

    function jsonProduto() {
        //carrega model
        $this->load->model('produtomodel');

        $editaCodigo = $this->input->post('var');

        $query = "SELECT * FROM produto WHERE pro_codigo = " . $editaCodigo;
        $result = $this->produtomodel->obterConsulta($query);

        foreach ($result->result() as $row) {
            $array = array(
                $row->pro_codigo,
                $row->cat_codigo,
                $row->pro_nome,
                $row->pro_status,
            );
        }
        echo json_encode($array);
    }

    function removeAscento($string) {
        $map = array(
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
            'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ð' => 'D', 'Ñ' => 'N',
            'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
            'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Ŕ' => 'R',
            'Þ' => 's', 'ß' => 'B', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
            'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
            'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y',
            'þ' => 'b', 'ÿ' => 'y', 'ŕ' => 'r'
        );
        return strtr($string, $map); // funciona corretamente
    }

    function copyr($pro_codigo, $pathOld_cat, $pathNew_cat, $pathOld, $pathNew) {
        $this->load->model('produtomodel');

        $query = $this->produtomodel->obterConsulta("SELECT item_img "
                . "FROM item i "
                . "LEFT JOIN produto c ON i.pro_codigo = c.pro_codigo "
                . "WHERE i.pro_codigo = " . $pro_codigo);

        $img_old = "assets/img/img-itens/" . $this->removeAscento($pathOld_cat) . "/" . $this->removeAscento($pathOld);
        $img_new = "assets/img/img-itens/" . $this->removeAscento($pathNew_cat) . "/" . $this->removeAscento($pathNew);

        mkdir($img_new, 0777);

        foreach ($query->result() as $row) {
            copy($img_old . "/" . $row->item_img, $img_new . "/" . $row->item_img);
        }

        foreach ($query->result() as $row) {
            unlink($img_old . "/" . $row->item_img);
        }
        rmdir($img_old);
    }

}
