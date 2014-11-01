<?php

class Pdf extends CI_Model {
    public function __construct() {
        parent::__construct();
    }   
    
    public function obterTodos(){
        $this->load->database();
        return $this->db->query('compra_item');
    }
    
    
}