<?php

class ClienteModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    //insere elemento no banco
    function inserir($data) {
        $this->load->database();
        $this->db->insert('cliente', $data);
    }
    
    function obterTodos(){
        $this->load->database();
        return $this->db->get('cliente');
    }
    
    function obterConsulta($consulta){
        $this->load->database();
        return $this->db->query($consulta);
    }
}

?>