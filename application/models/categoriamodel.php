<?php

class CategoriaModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    //insere elemento no banco
    function inserir($data) {
        $this->load->database();
        $this->db->insert('categoria', $data);
    }
    
    function obterTodos(){
        $this->load->database();
        $this->db->order_by("cat_nome", "asc"); 
        return $this->db->get('categoria');
    }
    
    function obterConsulta($consulta){
        $this->load->database();
        return $this->db->query($consulta);
    }
    
     function obter($cat_codigo) {
        $this->load->database();
        return $this->db->query('SELECT * FROM categoria WHERE cat_codigo = ' . $cat_codigo);
    }
}