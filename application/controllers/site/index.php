<?php

//use Categoria;
//require '~/models/categoria.php';

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('cart');
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

    //método que adiciona ao carrinho
    function addAoCarrinho() {
        $this->is_logged_in();

//        $this->load->library('session');
        $item_codigo = $this->input->get('item_codigo'); // recupera a informação via get
        $item_preco = $this->input->get('item_preco'); // recupera a informação via get
        $item_nome = $this->input->get('item_nome'); // recupera a informação via get
        $item_img = $this->input->get('item_img'); // recupera a informação via get

        echo $item_codigo . $item_img . $item_nome . $item_preco;

        $item = array(
            'id' => $item_codigo,
            'qty' => 1,
            'price' => $item_preco,
            'name' => $item_nome,
            'options' => array('img' => $item_img)
        );

        //verifica se o item já está no carrinho
        $qty = $this->contemItem($item_codigo); // retorna 0 se não tem ninguém com o mesmo id
        if ($qty != 0) {
            $item = array(
                'id' => $item_codigo,
                'qty' => $qty + 1,
                'price' => $item_preco,
                'name' => $item_nome,
                'options' => array('img' => $item_img)
            );
        }

        $this->cart->insert($item);

        redirect(base_url() . 'index.php/site/index/carrinho');
    }

    function carrinho() {

        //load models para a header
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();

        $this->load->view('site/header', $data);
        $this->load->view('site/carrinho', $data);
    }

    function removeDoCarrinho() {
        $rowid = $this->input->post('rowid');
        //rowid com qty 0 remove o produto da sessão
        $item = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($item);
        echo "removeDoCarrinho";

        redirect(base_url() . 'index.php/site/index/carrinho');
    }

    function contemItem($item_codigo) {
        echo "contemItem";
        foreach ($this->cart->contents() as $item) {
            if ($item['id'] == $item_codigo) {
                return $item['qty'];
            }
        }
        return 0;
    }

    function conta() {
        
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        echo $is_logged_in;
        if (!isset($is_logged_in) || $is_logged_in != true) {
            echo 'You don\'t have permission to access this page.';
            die();
            //$this->load->view('login_form');
        } else {

            return true;
        }
    }
    
    function finalizar_compra1(){
         //load models para a header
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
         $this->load->view('site/header', $data);
        $this->load->view('site/finalizar_compra1');
        
    }
    
    function finalizar_compra2(){
         //load models para a header
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
         $this->load->view('site/header', $data);
        $this->load->view('site/finalizar_compra2');
        
    }
    
    function finalizar_compra3(){
         //load models para a header
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
         $this->load->view('site/header', $data);
        $this->load->view('site/finalizar_compra3');
        
    }

}
