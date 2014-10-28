<?php

class Usuario extends CI_Controller {

    public function index() {
        $this->load->model('modelUsuario');
// Seleciona a tabela
        $tabela = "usuario";

        $data['query'] = $this->modelUsuario->obterTodos($tabela);

        $this->load->helper('url');
        $this->load->view('head');
        $this->load->view('usuario', $data);
    }

    public function insere() {
        $this->load->model('modelUsuario');

// Seleciona a tabela
        $tabela = "usuario";

// Campos a serem inseridos no BD
        $data['usu_nome'] = $this->input->post('usu_nome');
        $data['usu_sobrenome'] = $this->input->post('usu_sobrenome');
        $data['usu_login'] = $this->input->post('usu_login');
        $data['usu_cpf'] = $this->input->post('usu_cpf');
        $data['usu_senha'] = $this->input->post('usu_senha');
        $senhaValida = $this->input->post('usu_senha2');
        if ($this->modelUsuario->validaLogin($data['usu_login'])) {
            $msgError = 'Login já existe!';
        } else if (empty($data['usu_senha']) || empty($senhaValida)) {
            $msgError = 'Informe uma senha!';
        } else if (!($data['usu_senha'] === $senhaValida)) {
            $msgError = 'Senhas não conferem!';
        } else {
            $data['usu_senha'] = Usuario::validaSenha($data);
        }

        $validaCPF = Usuario::validaCPF($data['usu_cpf']);

        if (!$validaCPF || empty($data['usu_nome']) || empty($data['usu_login'])) {
            $msgError = 'Existe(m) campo(s) vazio(s)!';
        } else {
            $this->modelUsuario->inserir($data, $tabela);
            //Redireciona para a pagina principal
            $msgSuccess = 'Usuário cadastrado com sucesso!';
        }

        if (!empty($msgError)) {
            header('Location:' . base_url() . 'index.php/usuario/usuario?error=' . urlencode($msgError));
        } else {
            header('Location:' . base_url() . 'index.php/usuario/usuario?success=' . urlencode($msgSuccess));
        }
    }

    public function validaSenha($data) {

        if (strlen($data['usu_senha']) >= 8) {

            $senha = $data['usu_senha'];
            $custo = '08';
            $salt = 'Cf1f11ePArKlBJomM0F6aJ';

            // Gera um hash baseado em bcrypt
            return crypt($senha, '$2a$' . $custo . '$' . $salt . '$');
        } else {
            //Redireciona para a pagina principal
            header('Location:' . base_url() . 'index.php/usuario/usuario?error=' . urlencode('A senha tem que ter no mínimo 8 caracteres!'));
            exit();
        }
    }

    public function validaCPF($cpf1) {
        $cpf = str_pad($cpf1, 11, '0', STR_PAD_LEFT);

        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
            $msgError = 'CPF inválido!';
        } else {   // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;

                if ($cpf{$c} != $d) {
                    $msgError = 'CPF inválido!';
                }
            }
            if (!empty($msgError)) {
                header('Location:' . base_url() . 'index.php/usuario/usuario?error=' . urlencode($msgError));
                exit();
            } else {
                return true;
            }
        }
    }

    public function jsonUsuario() {
        //carrega model
        $this->load->model('modelUsuario');

        $editaCodigo = $this->input->post('var');

        $query = "SELECT * FROM usuario WHERE usu_codigo = " . $editaCodigo;
        $result = $this->modelUsuario->obterConsulta($query);

        foreach ($result->result() as $row) {
            $array = array(
                $row->usu_codigo,
                $row->usu_nome,
                $row->usu_sobrenome,
                $row->usu_login,
                $row->usu_cpf,
                $row->usu_senha
            );
        }
        echo json_encode($array);
    }

    public function excluir() {
        $this->load->model('modelUsuario');

        $usuCodigo = $this->input->post('usu_codigo');

        $this->modelUsuario->deleteUsu($usuCodigo);

        header('Location:' . base_url() . 'index.php/usuario/usuario?success    =' . urlencode('Usuário excluído com sucesso!'));
    }

    public function editar() {
        $this->load->model('modelUsuario');

        // Campos a serem inseridos no BD
        $data['usu_codigo'] = $this->input->post('usu_codigo');
        $dadosOld = $this->modelUsuario->obterConsulta('select * FROM usuario WHERE usu_codigo='.$data['usu_codigo']);
        
        $data['usu_nome'] = $this->input->post('usu_nome');
        $data['usu_sobrenome'] = $this->input->post('usu_sobrenome');
        $data['usu_login'] = $dadosOld->row('usu_login');
        $data['usu_cpf'] = $dadosOld->row('usu_cpf');
        $data['usu_senha'] = $this->input->post('usu_senha');
        $senhaValida = $this->input->post('usu_senha2');

        if (!empty($data['usu_senha']) && !empty($senhaValida)) {
            if (!($data['usu_senha'] === $senhaValida)) {
                $msgError = 'Nova senhas não conferem!';
            } else {
                $data['usu_senha'] = Usuario::validaSenha($data);
            }
        } else {
             $data['usu_senha'] = $dadosOld->row('usu_senha');
        }

        if (empty($data['usu_nome']) || empty($data['usu_sobrenome'])) {
            $msgError = 'Existe(m) campo(s) vazio(s)!';
        } else {
            $this->modelUsuario->upDateData($data);
            $msgSuccess = 'Usuário atualizado com sucesso!';
        }
        
        //Redireciona para a pagina principal
        if (!empty($msgError)) {
            header('Location:' . base_url() . 'index.php/usuario/usuario?error=' . urlencode($msgError));
        } else {
            header('Location:' . base_url() . 'index.php/usuario/usuario?success=' . urlencode($msgSuccess));
        }
    }

}
