<?php

// Arquivo pertencente ao Model
class ProdutoModel extends CI_Model {

    private $pro_codigo;
    private $cat_codigo;
    private $pro_nome;
    private $pro_status;

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        $this->load->database(); //Seleciona o banco
        $this->db->insert('produto', $data); //Realiza a consulta na tabela especificada
    }

    function obterTodos() {
        $this->load->database();
        $this->db->order_by("pro_nome", "asc"); 
        return $this->db->get('produto');
    }

    function obterConsulta($consulta) {
        $this->load->database();
        return $this->db->query($consulta);
    }
    
    function obter($pro_codigo1) {
        $this->load->database();
        return $this->db->query('SELECT * FROM produto WHERE pro_codigo = ' . $pro_codigo1);
    }

}

?>