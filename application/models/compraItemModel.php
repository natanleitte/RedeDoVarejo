<?php

class CompraItemModel extends CI_Model {

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
        $this->db->insert('compra_item', $data);
    }
    
    function obterTodos(){
        $this->load->database();
        return $this->db->get('compra_item');
    }
    
    function obterConsulta($consulta){
        $this->load->database();
        return $this->db->query($consulta);
    }
    
    function obterPorComCodigo($com_codigo){
        $this->load->database();
        $this->db->where('com_codigo', $com_codigo);
        return $this->db->get('compra_item');
    }
    
}