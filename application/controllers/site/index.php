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
        $this->load->view('site/index');
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
    
    function buscarItem() {
//        $pro_codigo = $this->input->get('pro_codigo'); // recupera a informação via get
        $item_nome = $this->input->post('item_nome'); // recupera a informação via get

        $this->load->model('itemModel');
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();

        $data['prod'] = $this->produtoModel->obterTodos();
        $data['itens'] = $this->itemModel->obterTodos();
        
        //data para fazer a pesquisa dos itens
//        echo $item_nome;
        $data['busca'] = $this->itemModel->obterItensPorNome($item_nome);
        $data['buscaNome'] = $item_nome;
//        $busca = $this->itemModel->obterItensPorNome($item_nome);
//        
//        foreach($busca->result() as $row)
//        {
//          echo $row->item_nome;
//        }
        


        $this->load->view('site/header', $data);
        $this->load->view('site/busca', $data);
    }

    //método que adiciona ao carrinho
    function addAoCarrinho() {
        
        //se não estiver logado
        if($this->is_logged_in() == false)
        {
            redirect(base_url() . 'index.php/site/index/login');
//            $this->login();
        }
        else
        {

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
//        echo $is_logged_in;
        if (!isset($is_logged_in) || $is_logged_in != true) {
//            echo 'You don\'t have permission to access this page.';
//            die();
            
            return false;
//            die();

            //$this->load->view('login_form');
        } else {

            return true;
        }
    }
    
    function finalizar_compra1(){
        if($this->is_logged_in() == false)
        {
            redirect(base_url() . 'index.php/site/index/login');
        }
         //load models para a header
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');
        $this->load->model('enderecoModel');

        
        //Para buuscar o endereço do cliente
        $cli_codigo = $this->session->userdata('cli_codigo');
        
        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        $data['endereco'] = $this->enderecoModel->obterPorCliente($cli_codigo);
//        $endereco = $this->enderecoModel->obterPorCliente($cli_codigo);

//        foreach ($endereco->result() as $end) {
//           echo $end->end_logradouro;
//        }
        
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
    
    function adicionarEndereco()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
         $this->load->view('site/header', $data);
        $this->load->view('site/adicionarEndereco');
        

    }
    
    function login(){
         //load models para a header
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
         $this->load->view('site/header', $data);
        $this->load->view('site/login');
        
    }
    
    function dados_pessoais()
    {
        if($this->is_logged_in() == false)
        {
            redirect(base_url() . 'index.php/site/index/login');
//            $this->login();
        }
        else
        {
            //load models para a header
            $this->load->model('categoriaModel');
            $this->load->model('produtoModel');
            $this->load->model('clienteModel');
            

            //data para header
            $data['categorias'] = $this->categoriaModel->obterTodos();
            $data['produtos'] = $this->produtoModel->obterTodos();
            
            //data para dados pessoais
            $cli_codigo = $this->session->userdata('cli_codigo');
            $cliente = $this->clienteModel->obter($cli_codigo);
            $data['cliente'] = $cliente->first_row();
            
//            $row = $data['cliente']->first_row();       
//            echo $row->cli_email;
            
            $this->load->view('site/header', $data);
            $this->load->view('site/dados-pessoais', $data);
        }
    }
    
    function termos_condicoes()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
         $this->load->view('site/header', $data);
        $this->load->view('site/termos_condicoes');
    }
    
    function quem_somos()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
         $this->load->view('site/header', $data);
        $this->load->view('site/quem_somos');
    }
    
    function contato()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
         $this->load->view('site/header', $data);
        $this->load->view('site/contato');
    }
    
    function esqueceu_senha()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/esqueceu_senha');
        $this->load->view('site/footer');
        
    }
}
