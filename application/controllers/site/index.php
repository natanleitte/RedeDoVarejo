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
        $this->load->model('itemModel');
        $this->load->model('tipoMedidaModel');

        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        $data['itens'] = $this->itemModel->obterTodos();        
        $data['tipo_medida'] = $this->tipoMedidaModel->obterTodos();

//        $email = $this->session->userdata('email');
//        echo $email;


        $this->load->view('site/header', $data);
        $this->load->view('site/index');
        $this->load->view('site/footer', $data);
    }

    function produto() {
        $pro_codigo = $this->input->get('pro_codigo'); // recupera a informação via get

        $this->load->model('itemModel');
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');
        $this->load->model('tipoMedidaModel');

        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();

        $data['prod'] = $this->produtoModel->obter($pro_codigo);
        $data['itens'] = $this->itemModel->obterTodos();

        $data['tipo_medida'] = $this->tipoMedidaModel->obterTodos();
//        $data['itens'] = $this->itemModel->obterTodos();



        $this->load->view('site/header', $data);
        $this->load->view('site/produto', $data);
        $this->load->view('site/footer', $data); //Tirei porque estava BUGANDO
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
        $this->load->view('site/footer', $data);
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

//        echo $item_codigo . $item_img . $item_nome . $item_preco;
        
        //Esta linha serve para permitir que produtos com acentuação no nome sejam aceitos.
        $this->cart->product_name_rules = "'\d\D'";
        
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
        if($this->is_logged_in() == false)
        {
            redirect(base_url() . 'index.php/site/index/login');
        }
        //load models para a header
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();

        $this->load->view('site/header', $data);
        $this->load->view('site/carrinho', $data);
        $this->load->view('site/footer', $data);
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
    
    function atualizaCarrinho()
    {
        $countId = 0;
        foreach ($this->cart->contents() as $item)
        {
//            echo $this->input->post('qtdItem'.$countId);
            $data = array(
               'rowid' => $item['rowid'],
               'qty'   => $this->input->post('qtdItem'.$countId)
            );
            $this->cart->update($data); 
            $countId++;
        }
        redirect(base_url() . 'index.php/site/index/carrinho');        
    }

    function contemItem($item_codigo) {
//        echo "contemItem";
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
        
        //para fazer o select do bairro
        $this->load->model('bairroModel');
        $data['bairros'] = $this->bairroModel->obterTodos();

        
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
        $this->load->view('site/footer', $data);
        
    }
    
    function finalizar_compra2(){
        
        if($this->is_logged_in() == false)
        {
            redirect(base_url() . 'index.php/site/index/login');
        }
         //load models para a header
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        //para fazer o select do bairro
        $cli_codigo = $this->session->userdata('cli_codigo');
        $this->load->model('enderecoModel');
        $this->load->model('bairroModel');
        $data['bairros'] = $this->bairroModel->obterTodos();
        $data['endereco'] = $this->enderecoModel->obterPorCliente($cli_codigo);
        
        
        $this->load->view('site/header', $data);
        $this->load->view('site/finalizar_compra2');
        $this->load->view('site/footer', $data);
        
    }
    
    function finalizar_compra3(){
        if($this->is_logged_in() == false)
        {
            redirect(base_url() . 'index.php/site/index/login');
        }
        
         //load models para a header
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        //para fazer o select do bairro
        $cli_codigo = $this->session->userdata('cli_codigo');
        $this->load->model('enderecoModel');
        $this->load->model('bairroModel');
        $data['bairros'] = $this->bairroModel->obterTodos();
        $data['endereco'] = $this->enderecoModel->obterPorCliente($cli_codigo);
        
        $this->load->view('site/header', $data);
        $this->load->view('site/finalizar_compra3');
        $this->load->view('site/footer', $data);
        
    }
    
    function adicionarEndereco()
    {
        if($this->is_logged_in() == false)
        {
            redirect(base_url() . 'index.php/site/index/login');
        }
        
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');
        $this->load->model('enderecoModel');
        
        //para fazer o select do bairro
        $this->load->model('bairroModel');
        $data['bairros'] = $this->bairroModel->obterTodos();

        //Para buuscar o endereço do cliente
        $cli_codigo = $this->session->userdata('cli_codigo');
        
        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        $data['endereco'] = $this->enderecoModel->obterPorCliente($cli_codigo);
        
        $this->load->view('site/header', $data);
        $this->load->view('site/adicionarEndereco');
        $this->load->view('site/footer', $data);
        

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
        $this->load->view('site/footer', $data);

        
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
            $this->load->view('site/footer', $data);

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
        $this->load->view('site/footer', $data);

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
        $this->load->view('site/footer', $data);

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
        $this->load->view('site/footer', $data);

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
        $this->load->view('site/footer', $data);
        
    }
    
    public function error404() 
    { 
        //Carrega categoriaModel
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');
        $this->load->model('itemModel');

        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        $data['itens'] = $this->itemModel->obterTodos();


        $this->load->view('site/header', $data);
        $this->load->view('site/error404');
        $this->load->view('site/footer', $data);
    }
    
    function salvarCompra()
    {
        $this->load->model('compramodel');
        $this->load->model('compraitemmodel');
        $bairro_frete = $this->input->get('bairro_frete');
//        echo $bairro_frete;
//        $this->load->model('compraItemModel');

        $totalCompra = 0;
        foreach ($this->cart->contents() as $item) {
            $totalCompra += ($item['price'] * $item['qty']);
        }
        $cli_codigo = $this->session->userdata('cli_codigo');
        $data['cli_codigo'] = $cli_codigo;
        $data['ent_codigo'] = 1;
        $data['pag_codigo'] = 1;
        $data['com_valor_total'] = ($totalCompra + $bairro_frete);
        $com_codigo = $this->compramodel->inserir($data);
        
        foreach ($this->cart->contents() as $item) {
//            $this->inserirCompraItem($com_codigo, $item['id'], $item['qty']);
              
//              echo "com_codigo" . $com_codigo . " item_codigo" . $item_codigo . " item_qtd" . $item_qtd . " <br>";
              
             $com_item_codigo = $this->compraitemmodel->inserirEspec($com_codigo, $item['id'], $item['qty']);
//             echo "com_item_codigo " . $com_item_codigo . "<br>"; 
        }
        $this->cart->destroy();
//        echo $com_codigo;
        
        //redireciona para visualizar a compra
        redirect(base_url() . 'index.php/site/index/compra/?com_codigo=' . $com_codigo);
    }
    
    //insere em compra_item
    function inserirCompraItem($com_codigo, $item_codigo, $item_qtd)
    {
        echo "com_codigo" . $com_codigo . " item_codigo" . $item_codigo . " item_qtd" . $item_qtd . " <br>";
        
        
        $this->load->model('compraItemModel');
        
        $data['com_codigo'] = $com_codigo;
        $data['item_codigo'] = $item_codigo;
        $data['item_qtd'] = $item_qtd;
        
        
        
        $this->compraItemModel->inserir($data);
        
    }
    
    function compra()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');
        $this->load->model('itemModel');
        $this->load->model('compraItemModel');
        $this->load->model('compraModel');
        

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        $data['itens'] = $this->itemModel->obterTodos();
        
        $com_codigo = $this->input->get('com_codigo'); // recupera a informação via get
        $data['compra'] = $this->compraModel->obterPorComCodigo($com_codigo);
        $data['compra_itens'] = $this->compraItemModel->obterPorComCodigo($com_codigo);
        
        $this->load->view('site/header', $data);
        $this->load->view('site/compra');
        $this->load->view('site/footer', $data);

    }
    
    function minha_conta()
    {
        if($this->is_logged_in() == false)
        {
            redirect(base_url() . 'index.php/site/index/login');
        }
        
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/minha-conta');
        $this->load->view('site/footer', $data);
    }
    
    function minhas_compras()
    {
        if($this->is_logged_in() == false)
        {
            redirect(base_url() . 'index.php/site/index/login');
        }
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');
        $this->load->model('compraModel');
        $this->load->model('compraitemmodel');


        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $cli_codigo = $this->session->userdata('cli_codigo');

        $data['compras'] = $this->compraModel->obterPorCliente($cli_codigo);
        $data['compra_itens'] = $this->compraitemmodel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/minhas_compras');
        $this->load->view('site/footer', $data);
    }
    
    function testeJson()
    {
        $senha = $this->input->post('senha');
        $confirmaSenha = $this->input->post('confirmaSenha');
        
        if(strcmp($senha,$confirmaSenha) != 0)
        {
            echo 0;
            return;
        }
        
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');
        $this->load->model('compraModel');
        $this->load->model('compraItemModel');


        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $cli_codigo = $this->session->userdata('cli_codigo');

        $data['compras'] = $this->compraModel->obterPorCliente($cli_codigo);
        $data['compra_itens'] = $this->compraItemModel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/minhas_compras');
        $this->load->view('site/footer', $data);
//        echo "entrei";
//        echo json_encode(array('status' => 'error'));
    }
    
    function categoria()
    {
         $cat_codigo = $this->input->get('cat_codigo'); // recupera a informação via get

        $this->load->model('itemModel');
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');
        $this->load->model('tipoMedidaModel');

        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();

        $data['cat'] = $this->categoriaModel->obter($cat_codigo);
        $data['itens'] = $this->itemModel->obterTodos();

        $data['tipo_medida'] = $this->tipoMedidaModel->obterTodos();
//        $data['itens'] = $this->itemModel->obterTodos();



        $this->load->view('site/header', $data);
        $this->load->view('site/categoria', $data);
        $this->load->view('site/footer', $data); //Tirei porque estava BUGANDO
    }
    
    function como_comprar()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/como_comprar');
        $this->load->view('site/footer', $data);
    }
    
    function entrega()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/entrega');
        $this->load->view('site/footer', $data);
    }
    
    function formas_pagamento()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/formas_pagamento');
        $this->load->view('site/footer', $data);
    }
    
      function politica_venda()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/politica_venda');
        $this->load->view('site/footer', $data);
    }

    function politica_troca()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/politica_troca');
        $this->load->view('site/footer', $data);
    }
    
    function seguranca()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/seguranca');
        $this->load->view('site/footer', $data);
    }
    
    function areas_atendidas()
    {
        $this->load->model('categoriaModel');
        $this->load->model('produtoModel');
        $this->load->model('bairromodel');

        //data para header
        $data['categorias'] = $this->categoriaModel->obterTodos();
        $data['produtos'] = $this->produtoModel->obterTodos();
        $data['bairro'] = $this->bairromodel->obterTodos();
        
        $this->load->view('site/header', $data);
        $this->load->view('site/areas_atendidas');
        $this->load->view('site/footer', $data);
    }
}
