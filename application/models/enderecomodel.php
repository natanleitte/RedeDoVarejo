<?php

class EnderecoModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    //insere elemento no banco
    function inserir($data) {
        $this->load->database();
        $this->db->insert('endereco', $data);
        
        echo "inseriu";
    }
    
    function obterTodos(){
        $this->load->database();
        return $this->db->get('endereco');
    }
    
    function obterConsulta($consulta){
        $this->load->database();
        return $this->db->query($consulta);
    }
    
    function obterPorCliente($cli_codigo)
    {
        $this->load->database();
        $this->db->limit(1);
        $this->db->where('cli_codigo', $cli_codigo); 
        return $this->db->get('endereco');
//        echo "cheguei";
//        return $query->row();

    }
}

?>