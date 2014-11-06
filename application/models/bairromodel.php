<?php

class BairroModel extends CI_Model {

    private $pro_codigo;
    private $cat_codigo;
    private $pro_nome;
    private $pro_status;

    function __construct() {
        parent::__construct();
    }
    
    //insere elemento no banco
    function inserir($data) {
        $this->load->database();
        $this->db->insert('bairro', $data);
    }
    
    function obterTodos(){
        $this->load->database();
        return $this->db->get('bairro');
    }
    
    function obterConsulta($consulta){
        $this->load->database();
        return $this->db->query($consulta);
    }
}