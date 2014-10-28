<?php

class Produto extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //Load na model
        $this->load->model('modelProduto');

        // Consultas
        $data['query'] = $this->modelProduto->obterTodos('produto');
        $data['query1'] = $this->modelProduto->obterTodos('categoria');
        $data['consulta'] = $this->modelProduto->obterConsulta('SELECT * FROM categoria c LEFT JOIN (produto p) ON (p.cat_codigo = c.cat_codigo) WHERE NOT ISNULL(pro_codigo)');

        $this->load->helper('url');
        $this->load->view('head');
        $this->load->view('produto', $data);
    }

    public function inserir() {
        //Load na model
        $this->load->model('modelProduto');

        //recebe quantidade de Elementos inseridos na página
        $qtd = $this->input->post('qtdElementos');

        // Informa a tabela
        $tabela = "produto";

        for ($i = 1; $i <= $qtd; $i++) {
            if ($i == 1) {
                //pega os valores
                $data['cat_codigo'] = $this->input->post('cat_codigo');
                $data['pro_nome'] = $this->input->post('pro_nome');
                $valida = $this->input->post('pro_nome');
                $pro_status = $this->input->post('pro_status');
                $data['pro_status'] = (!strcmp($pro_status, "on")) ? 1 : 0;
            } else {
                $elemento = "pro_nome" . $i . "";
                $strStatus = "pro_status" . $i . "";
                $data['cat_codigo'] = $this->input->post('cat_codigo');
                $data['pro_nome'] = $this->input->post($elemento);
                $valida = $this->input->post($elemento);
                $pro_status = $this->input->post($strStatus);
                $data['pro_status'] = (!strcmp($pro_status, "on")) ? 1 : 0;
            }

            // consulta para verificar se a categoria ja existe
            $exist = $this->modelProduto->obterConsulta("SELECT pro_nome FROM produto WHERE pro_nome = '" . $valida . "' AND cat_codigo='" . $data['cat_codigo'] . "'");

            if ($data['pro_nome'] == '') {
                // Retorna para a página informando o erro
                header('Location:' . base_url() . 'index.php/produto/produto?error=' . urlencode('Existe(m) campo(s) vazio(s)!'));
            } else
            if ($exist->num_rows()) {
                // Retorna para a página informando o erro
                header('Location:' . base_url() . 'index.php/produto/produto?error=' . urlencode('Produto já existe!'));
            } else {
                // Cria a pasta com o nome do novo produto na categoria selecionada
                $consulta = "SELECT cat_nome FROM categoria WHERE cat_codigo = " . $data['cat_codigo'];
                $categoria = $this->modelProduto->obterConsulta($consulta, 'categoria');
                mkdir("assets/img/categoria/" . $categoria->row('cat_nome') . "/" . $data['pro_nome'], 0777);

                // Insere no banco
                $this->modelProduto->inserir($data, $tabela);

                // Retorna para a página informando o status
                header('Location:' . base_url() . 'index.php/produto/produto?sucess=' . urlencode('Inserido(s) com sucesso!'));
            }
        }
    }

    function excluir() {
        // Load Model
        $this->load->model('modelProduto');

        //Pega o código do produto
        $data['pro_codigo'] = $this->input->post('pro_codigo');
        $data['pro_nome'] = $this->input->post('pro_nome');
        $data['cat_codigo'] = $this->input->post('cat_codigo');

        //Realiza a consulta (Excluir Produto)
        $this->modelProduto->obterConsulta('DELETE FROM produto WHERE pro_codigo = ' . $data['pro_codigo']);

        //Deleta pasta dos produtos
        $consulta = "SELECT cat_nome FROM categoria WHERE cat_codigo = " . $data['cat_codigo'];
        $categoria = $this->modelProduto->obterConsulta($consulta);

        foreach ($categoria->result() as $row) {
            rmdir("assets/img/categoria/" . $row->cat_nome . "/" . $data['pro_nome']);
        }

        // Retorna para a página informando o erro
        header('Location:' . base_url() . 'index.php/produto/produto?sucess=' . urlencode('Exclusão realizada com sucesso!'));
    }

    public function editar() {
        //Load Model
        $this->load->model('modelProduto');

        //Pega o código do produto
        $data['pro_codigo'] = $this->input->post('pro_codigo');

        //Recebe os novos valores dos campos
        $data['pro_nome'] = $this->input->post('pro_nome');
        $pathNew = $this->input->post('pro_nome');
        $data['cat_codigo'] = $this->input->post('cat_codigo');
        $data['pro_status'] = $this->input->post('pro_status');

        $consulta = "UPDATE produto"
                . " SET pro_nome = '" . $data['pro_nome'] . "', cat_codigo= '" . $data['cat_codigo'] . "', pro_status= '" . $data['pro_status']
                . "' WHERE pro_codigo= " . $data['pro_codigo'];

        if ($data['pro_nome'] == '' || $data['cat_codigo'] == '' || $data['pro_status'] == '') {
            // Retorna para a página informando o erro
            header('Location:' . base_url() . 'index.php/produto/produto?error=' . urlencode('Edição não realizada: Existe(m) campo(s) vazio(s)!'));
        } else {

            //Obtem pasta dos produtos
            $query = $this->modelProduto->obterConsulta("SELECT cat_nome FROM categoria WHERE cat_codigo = " . $data['cat_codigo']);
            $data['categoria'] = $query->row('cat_nome');

            // Renomeia a pasta do produto
            $query2 = $this->modelProduto->obterConsulta("SELECT pro_nome FROM produto WHERE pro_codigo= " . $data['pro_codigo']);
            $pathOld = $query2->row('pro_nome');
            rename("assets/img/categoria/" . $data['categoria'] . "/" . $pathOld, "assets/img/categoria/" . $data['categoria'] . "/" . $pathNew);

            //Realiza a consulta (Editar Produto)
            $this->modelProduto->obterConsulta($consulta);

            // Retorna para a página informando o erro
            header('Location:' . base_url() . 'index.php/produto/produto?sucess=' . urlencode('Edição realizada com sucesso!'));
        }
    }

    public function jsonProduto() {
        //carrega model
        $this->load->model('modelProduto');

        $editaCodigo = $this->input->post('var');

        $query = "SELECT * FROM produto WHERE pro_codigo = " . $editaCodigo;
        $result = $this->modelProduto->obterConsulta($query);

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

}
