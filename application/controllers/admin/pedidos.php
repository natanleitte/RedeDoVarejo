<?php

class Pedidos extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('admin/head');
        $this->load->view('admin/pedidos');
    }
    
}