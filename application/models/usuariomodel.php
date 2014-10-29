<?php

class UsuarioModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //insere elemento no banco
    function inserir($data) {
        $this->load->database();
        $this->db->insert('usuario', $data);
    }

    function obterTodos() {
        $this->load->database();
        return $this->db->get('usuario');
    }

    function obterConsulta($consulta) {
        $this->load->database();
        return $this->db->query($consulta);
    }

    function validaLogin($usuLogin) {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM usuario WHERE usu_login = '" . $usuLogin . "'");
        return ($query->num_rows() > 0) ? true : false;
    }

    function deleteUsu($usuCodigo) {
        $this->load->database();

        $query = 'DELETE FROM usuario WHERE usu_codigo = ' . $usuCodigo;
        $this->db->query($query);
    }

    function upDateData($data) {
        $this->load->database();
        
        $this->db->where('usu_codigo', $data['usu_codigo']);
        $this->db->update('usuario', $data);
    }

}

?>