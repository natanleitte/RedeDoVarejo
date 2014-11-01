<?php

class CompraModel extends CI_Model {

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
        $this->db->insert('compra', $data);
        return $this->db->insert_id();
    }
    
    function obterTodos(){
        $this->load->database();
        return $this->db->get('compra');
    }
    
    function obterConsulta($consulta){
        $this->load->database();
        return $this->db->query($consulta);
    }
    
    function obterPorCliente($cli_codigo){
        $this->load->database();
        $this->db->where('cli_codigo', $cli_codigo);
        return $this->db->get('compra');
    }
}