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
        
        $senha = $this->input->post('senha');
        $confirmaSenha = $this->input->post('confirmaSenha');
        $email = $this->input->post('email');
        
        //verificar se as senhas são iguais
        if(strcmp($senha, $confirmaSenha) != 0)
        {
            echo 'senha';
            return;
        }
        
        //valida email
        if(!$this->isMail($email))
        {
            echo 'email';
            return;
        }
        
        $this->load->model('clienteModel');
//        echo "clienteInserir";
//        $data['cli_login'] = $this->input->post('login');
        $data['cli_email'] = $this->input->post('email');
        $data['cli_senha'] = $this->input->post('senha');

        $this->clienteModel->inserir($data);
        
        //**** LOGIN ****
        //obtem todos os clientes do banco
        $clientes = $this->clienteModel->obterTodos();
        
        //verifica se cliente existe na base
        foreach ($clientes->result() as $cliente) {
                   

            if (!strcmp($cliente->cli_email, $email)) {
                if (!strcmp($cliente->cli_senha, $senha)) {
                    $cli_codigo = $cliente->cli_codigo;
                    $cli_nome = $cliente->cli_nome;
                    $this->insereNaSessao($email, $senha, $cli_codigo, $cli_nome);
                    redirect(base_url() . 'index.php/site/index/');

                    return;
                }
            }
        }
        //**** LOGIN ****

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
                    redirect(base_url() . 'index.php/site/index/');

                    return;
                }
            }
        }
        
        echo 'erro';
        return false;
    }
    
    //função que faz a inserção do usuario
    function insereNaSessao($email, $senha, $cli_codigo, $cli_nome)
    {
        $novoUsuario = array(
                   'username'  => $cli_nome,
                   'email'     => $email,
                   'is_logged_in' => TRUE,
                   'cli_codigo' => $cli_codigo
               );

        $this->session->set_userdata($novoUsuario);
                            echo "LOGIN";

    }
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/site/index/');
    }
    
    //recebe e processa informações da tela de finalizar compra 1
    function finalizaCompra1()
    {
        $cli_codigo = $this->session->userdata('cli_codigo');
        $data['cli_codigo'] = $cli_codigo;
        $data['end_logradouro'] = $this->input->post('endereco');
        $data['end_numero'] = $this->input->post('numero');
        $data['end_cidade'] = $this->input->post('cidade');
        $data['end_complemento'] = $this->input->post('complemento');
        $data['end_bairro'] = $this->input->post('bairro');
        $data['end_cep'] = $this->input->post('cep');
        $data['end_uf'] = $this->input->post('estado');
        $data['end_referencia'] = $this->input->post('referencia');

//        $data['end_telefone'] = $this->input->post('telefone');
        
        $this->load->model('enderecoModel');
        $this->enderecoModel->inserir($data);
        
        redirect(base_url() . 'index.php/site/index/finalizar_compra2');
        
    }
    
    function atualizaDadosPessoais()
    {
        $cli_codigo = $this->session->userdata('cli_codigo');
//        $data['cli_codigo'] = $cli_codigo;
        $data['cli_nome'] = $this->input->post('nome');
        $data['cli_sobrenome'] = $this->input->post('sobrenome');
        $data['cli_cpf_cnpj'] = $this->input->post('cpf');
        $data['cli_sexo'] = $this->input->post('sexo');
        $data['cli_divulgacao'] = $this->input->post('newsletter');
        
        $this->load->model('clienteModel');
        $this->clienteModel->atualizar($cli_codigo, $data);
        
        redirect(base_url() . 'index.php/site/index/adicionarEndereco');
    }
   
    function adicionaEndereco()
    {
        $cli_codigo = $this->session->userdata('cli_codigo');
        $data['cli_codigo'] = $cli_codigo;
        $data['end_logradouro'] = $this->input->post('endereco');
        $data['end_numero'] = $this->input->post('numero');
        $data['end_cidade'] = $this->input->post('cidade');
        $data['end_complemento'] = $this->input->post('complemento');
        $data['end_bairro'] = $this->input->post('bairro');
        $data['end_cep'] = $this->input->post('cep');
        $data['end_uf'] = $this->input->post('estado');
        $data['end_referencia'] = $this->input->post('referencia');

//        $data['end_telefone'] = $this->input->post('telefone');
        
        $this->load->model('enderecoModel');
        $this->enderecoModel->inserir($data);
        
        redirect(base_url() . 'index.php/site/index/minha_conta');
        
    }
    
    //valida email
    function isMail($email){
    $er = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";
    if (preg_match($er, $email)){
    return true;
    } else {
    return false;
    }
    }

    
}