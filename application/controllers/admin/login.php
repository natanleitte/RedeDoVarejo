<?php

class Login extends CI_Controller {

    public function index() {
        $this->load->view('admin/login');
    }

    public function valida() {
        //Inicializa a sessão
        session_start();

        $login = $this->input->post('usu_login');
        $senha = $this->input->post('usu_senha');
        $custo = '08';
        $salt = 'Cf1f11ePArKlBJomM0F6aJ';

        // Gera um hash baseado em bcrypt
        $senha = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

        if (Login::validaVisitante($login, $senha)) {
            //Guarda as informações na sessão
            $_SESSION['loginUsuario'] = $login;
            $_SESSION['senhaUsuario'] = $senha;
            header("Location:" . base_url() . "index.php/admin/categoria/categoria");
        } else {
            $mensagem = 'Senha ou Login incorretos!';
            Login::expulsaVisitante($mensagem);
        }
    }

    public function validaVisitante($login, $senha) {
        if (empty($login) || empty($senha)) {
            return false;
        } else {
            $this->load->model('loginmodel');

            $query = "SELECT usu_nome, usu_senha FROM usuario WHERE usu_login= '" . $login . "' AND usu_senha = '" . $senha . "'";

            $resultado = $this->loginmodel->obterConsulta($query);
            $hash = $resultado->row('usu_senha');
            $valida = $resultado->row('usu_nome');

            $_SESSION['nomeUsuario'] = $valida;
            
            //Verifica se encontrou o usuário
            return (!empty($valida)) ? true : false;
        }
    }

    public function segurancaPagina() {
        $func = new Login;
        session_start();
        if (!isset($_SESSION['loginUsuario']) OR ! isset($_SESSION['senhaUsuario'])) {
            // Não há usuário logado, manda pra página de login
            $mensagem = 'Sessão não inicializada, por favor faça o login!';
            Login::expulsaVisitante($mensagem);
        } else
        if (!isset($_SESSION['loginUsuario']) OR ! isset($_SESSION['senhaUsuario'])) {
            $mensagem = 'Sessão não inicializada, por favor faça o login!';
            Login::expulsaVisitante($mensagem);
        } else {
            // Verifica se os dados salvos na sessão batem com os dados do banco de dados
            if (!$func->validaVisitante($_SESSION['loginUsuario'], $_SESSION['senhaUsuario'])) {
                // Os dados não batem, manda pra tela de login
                $mensagem = 'Usuário inválido!';
                Login::expulsaVisitante($mensagem);
            }
        }
    }

    public function expulsaVisitante($mensagem) {
        // Remove as variáveis da sessão (caso elas existam)
        unset($_SESSION['loginUsuario'], $_SESSION['senhaUsuario'], $_SESSION['nomeUsuario']);
        // Manda pra tela de login
        header('Location:' . base_url() . 'index.php/admin/login/login?error=' . urlencode($mensagem));
    }

}

?>