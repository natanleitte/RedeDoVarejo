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
//
    }

    public function inserir() {
        //carrega model
        $this->load->model('categoriamodel');
        
        //recebe quantidade de Elementos inseridos na página
        $qtd = $this->input->post('qtdElementos');

        for ($i = 1; $i <= $qtd; $i++) {
            if ($i == 1) {
                //pega o post de cat_nome
                $data['cat_nome'] = $this->input->post('cat_nome');
                $valida = $this->input->post('cat_nome');
                $cat_status = $this->input->post('cat_status');
                $data['cat_status'] = (!strcmp($cat_status, "on")) ? 1 : 0;
            } else {
                $elemento = "cat_nome" . $i . "";
                $strStatus = "cat_status" . $i . "";

                $data['cat_nome'] = $this->input->post($elemento);
                $valida = $this->input->post($elemento);

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
                mkdir("assets/img/categoria/" . $data['cat_nome'], 0777);

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
        $data['cat_nome'] = $this->input->post('cat_nome');
        $pathNew = $this->input->post('cat_nome');
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
            rename("assets/img/categoria/" . $pathOld, "assets/img/categoria/" . $pathNew);

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
        $data['cat_nome'] = $this->input->post('cat_nome');


        //Realiza a exlusão em banco
        $this->categoriamodel->obterConsulta('DELETE FROM categoria WHERE cat_codigo = ' . $data['cat_codigo']);

        //Deleta pasta dos produtos
        rmdir("assets/img/categoria/" . $data['cat_nome']);

        //Redireciona para a pagina principal
        header('Location:' . base_url() . 'index.php/admin/categoria/categoria?edit=' . urlencode('Exclusão realizada com sucesso!'));
    }

}
?>