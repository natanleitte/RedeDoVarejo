<?php

class CategoriaModel extends CI_Model {

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
//        echo "chegou";
        $this->db->insert('categoria', $data);
    }
    
    function obterTodos(){
        $this->load->database();
        return $this->db->get('categoria');
    }
    
    function obterConsulta($consulta){
        $this->load->database();
        return $this->db->query($consulta);
    }
}

?>