<?php

//use Categoria;
//require '~/models/categoria.php';

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
//        $this->load->model('Categoria','',TRUE);
    }

    function inserir() {
        //carrega model
        $this->load->model('clienteModel');
        echo "clienteInserir";
        $data['cli_login'] = $this->input->post('login');
        $data['cli_email'] = $this->input->post('email');
        $data['cli_senha'] = $this->input->post('senha');

        $this->clienteModel->inserir($data);

        redirect(base_url() . 'index.php/site/index/');
    }

    function login() {
        
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');

        $this->load->model('clienteModel');
        
        //obtem todos os clientes do banco
        $clientes = $this->clienteModel->obterTodos();
        
        //verifica se cliente existe na base
        foreach ($clientes->result() as $cliente) {
                   

            if (!strcmp($cliente->cli_email, $email)) {
                if (!strcmp($cliente->cli_senha, $senha)) {
                    $cli_codigo = $cliente->cli_codigo;
                    $cli_nome = $cliente->cli_nome;
                    $this->insereNaSessao($email, $senha, $cli_codigo, $cli_nome);
                    return;
                }
            }
        }
        
        return false;
    }
    
    //função que faz a inserção do usuario
    function insereNaSessao($email, $senha, $cli_codigo, $cli_nome)
    {
        $novoUsuario = array(
                   'username'  => $cli_nome,
                   'email'     => $email,
                   'is_logged_in' => TRUE
               );

        $this->session->set_userdata($novoUsuario);
                            echo "LOGIN";

    }
    
    function sairDaSessao()
    {
        $this->session->sess_destroy();
    }
}