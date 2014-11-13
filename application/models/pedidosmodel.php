<?php

class PedidosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obterCompras() {
        $this->load->database();

        $query = "
            
            ";
        return $this->db->query($query);
    }

}
