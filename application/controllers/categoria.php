<?php

//use Categoria;
//require '~/models/categoria.php';

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->model('Categoria','',TRUE);
    }

//    function testando()
//    {
//        parent::Controller();
//    }
    function index() {
//        $categoria = new Categoria();
//        $categoria->cat_codigo = 1;
//        $data['categoria'] = 1;
//        
        //$categoria->cat_codigo = 1;
//        $this->load->helper('url_helper');
//        $this->load->library('form_validation');
//        $this->load->library('session');
          $this->load->model('categoriaModel');
          
         
        $data['query'] = $this->categoriaModel->obterTodos();
        
        $this->load->helper('url');
        $this->load->view('head');
        $this->load->view('categoria', $data);
//        $this->load->model('categoria');
    }

    function inserir() {
        //carrega model
        $this->load->model('categoriaModel');

        //recebe quantidade de Elementos inseridos na página
        $qtd = $this->input->post('qtdElementos');
        //pega o post de cat_nome
        $data['cat_nome'] = $this->input->post('cat_nome');
        //pega post do status
        $cat_status = $this->input->post('cat_status');

        //verfifica se status está checado ou não e atribui 1 ou 0
        if (!strcmp($cat_status, "on")) {
            $data['cat_status'] = 1;
        } else {
            $data['cat_status'] = 0;
        }
        // invoca método da model que insere no banco
        $this->categoriaModel->inserir($data);

        //pega outros elementos da página pra gravar no anco 
        for ($i = 2; $i <= $qtd; $i++) {
//            echo "'cat_nome" . $i . "'";
            $elemento = "cat_nome" . $i . "";
            $strStatus = "cat_status" . $i . "";

            $data['cat_nome'] = $this->input->post($elemento);
            $cat_status = $this->input->post($strStatus);

            //verfifica se status está checado ou não e atribui 1 ou 0
            if (!strcmp($cat_status, "on")) {
                $data['cat_status'] = 1;
            } else {
                $data['cat_status'] = 0;
            }

            $this->categoriaModel->inserir($data);
        }
//        $this->load->view('head');
//        $this->load->view('categoria');
        redirect(base_url() . 'index.php/categoria/categoria');
    }

    function excluir($cat_codigo)
    {
       echo "ja era";
       
    }
//
//    public function inserirCategoria() {
//        $this->load->library('form_validation');
//        $this->form_validation->set_rules('cat_nome', 'cat_nome', 'required');
//        $cat_nome = $this->input->post('cat_nome');
//        
//        if ($this->form_validation->run() === false) {
//            echo "problema";
//        }
//
////        
//        echo $cat_nome;
////        }
////        else
////        {
//        echo "bugou";
////        }
//    }
}
