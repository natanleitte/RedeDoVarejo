<?php

class ClienteModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function obter($cli_codigo)
    {
        $this->db->where('cli_codigo', $cli_codigo);
        return $this->db->get('cliente');
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
    
    //atualiza cliente
    function atualizar($cli_codigo, $data)
    {
        echo $cli_codigo;
        $this->load->database();
        $this->db->where('cli_codigo', $cli_codigo);
        $this->db->update('cliente', $data); 
    }
}

?>