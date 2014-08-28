<?php

/* Nome: Jorge Luiz
 * Data: 20/08/2014
 * 
 */

class Produto extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //Load na model
        $this->load->model('produtoModel');
        $this->load->model('categoriaModel');
        
        // Consultas
        $data['query'] = $this->produtoModel->obterTodos();
        $data['query1'] = $this->categoriaModel->obterTodos();
        $data['consulta'] = $this->categoriaModel->obterConsulta('SELECT * FROM categoria c LEFT JOIN (produto p) ON (p.cat_codigo = c.cat_codigo) WHERE NOT ISNULL(pro_codigo)');
        
        $this->load->helper('url');
        $this->load->view('head');
        $this->load->view('produto', $data);
    }

    function inserir() {
        //Load na model
        $this->load->model('produtoModel');
        $this->load->model('categoriaModel');

        //recebe quantidade de Elementos inseridos na página
        $qtd = $this->input->post('qtdElementos');

        //Pega o código da categoria
        $data['cat_codigo'] = $this->input->post('cat_codigo');
        $data['pro_nome'] = $this->input->post('pro_nome');


        //pega post do status
        $pro_status = $this->input->post('pro_status');

        //verfifica se status está checado ou não e atribui 1 ou 0
        if (!strcmp($pro_status, "on")) {
            $data['pro_status'] = 1;
        } else {
            $data['pro_status'] = 0;
        }

        // Realiza a inserção da pasta com o nome do novo produto na categoria selecionada
        $consulta = "SELECT cat_nome FROM categoria WHERE cat_codigo = " . $data['cat_codigo'];
        $categoria = $this->categoriaModel->obterConsulta($consulta);
        foreach ($categoria->result() as $row) {
            mkdir("assets/img/categoria/" . $row->cat_nome . "/" . $data['pro_nome'], 0700);
        }

        // invoca método da model que insere no banco
        $this->produtoModel->inserir($data);

        //pega outros elementos da página pra gravar no banco 
        for ($i = 2; $i <= $qtd; $i++) {
            $elemento = "pro_nome" . $i . "";
            $strStatus = "pro_status" . $i . "";

            $data['pro_nome'] = $this->input->post($elemento);
            $pro_status = $this->input->post($strStatus);

            //verfifica se status está checado ou não e atribui 1 ou 0
            if (!strcmp($pro_status, "on")) {
                $data['pro_status'] = 1;
            } else {
                $data['pro_status'] = 0;
            }

            // Realiza a inserção da pasta com o nome do novo produto na categoria selecionada
            $consulta = "SELECT cat_nome FROM categoria WHERE cat_codigo = " . $data['cat_codigo'];
            $categoria = $this->categoriaModel->obterConsulta($consulta);
            foreach ($categoria->result() as $row) {
                mkdir("assets/img/categoria/" . $row->cat_nome . "/" . $data['pro_nome'], 0700);
            }

            // Realiza a inserção em banco
            $this->produtoModel->inserir($data);
        }

        function excluir($pro_codigo){
            // Load Model
            $this->load->model('produtoModel');
            
            //Pega o código do produto
            $data['pro_codigo'] = $this->input->post('pro_codigo');
            
            //Realiza a consulta (Excluir Produto)
            $this->produtoModel->obterConsulta('DELETE FROM produto WHERE pro_codigo = '.$pro_codigo);
            
            //Deleta pasta dos produtos
            rmdir($data['pro_nome']);
        }

        //Redireciona para a pagina principal
        redirect(base_url() . 'index.php/produto/produto');
    }
    
    function editar(){
        //Load Model
        $this->load->model('produtoModel');
        
        //Pega o código do produto
        $data['pro_codigo'] = $this->input->post('pro_codigo');
        
        //Recebe os novos valores dos campos
        $data['pro_nome'] = $this->input->post('pro_nome');
        $data['cat_codigo'] = $this->input->post('cat_codigo');
        $data['pro_status'] = $this->input->post('pro_status');
        
        $consulta = "UPDATE produto"
                . " SET pro_nome =". $data['pro_nome'] . ", cat_codigo=". $data['cat_codigo'] .", pro_status=". $data['pro_status'] 
                ."WHERE pro_codigo=".$data['pro_codigo'];
        
        //Realiza a consulta (Editar Produto)
        $this->produtoModel->obterConsulta($consulta);
    }

}
