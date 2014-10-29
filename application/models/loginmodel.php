<?php

class LoginModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function obterConsulta($consulta){
        $this->load->database();
        return $this->db->query($consulta);
    }
}
?>