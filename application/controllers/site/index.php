<?php

//use Categoria;
//require '~/models/categoria.php';

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->model('Categoria','',TRUE);
    }

//    function testando()
//    {
//        parent::Controller();
//    }
    function index() {
        //Carrega categoriaModel
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();

        $this->load->view('site/header', $data);
//        $this->load->view('site/index');
    }

    function produto() {
        $pro_codigo = $this->input->get('pro_codigo'); // recupera a informação via get

        $this->load->model('itemModel');
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();

        $data['prod'] = $this->produtoModel->obter($pro_codigo);
        $data['itens'] = $this->itemModel->obterTodos();

//        $data['itens'] = $this->itemModel->obterTodos();
        
        
        
        $this->load->view('site/header', $data);
        $this->load->view('site/produto', $data);
    }

}
