<?php

//use Categoria;
//require '~/models/categoria.php';

class Testando extends CI_Controller {

    function testando() {
        parent::__construct();
    }

//    function testando()
//    {
//        parent::Controller();
//    }
    function index() {
//        $categoria = new Categoria();
//        $categoria->cat_codigo = 1;
//        $data['categoria'] = 1;
//        
        //$categoria->cat_codigo = 1;
//        $this->load->helper('url_helper');
//        $this->load->library('form_validation');
//        $this->load->library('session');

        $this->load->view('testando');
    }

    public function inserirCategoria() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_nome', 'cat_nome', 'required');
        $cat_nome = $this->input->post('cat_nome');
        
        if ($this->form_validation->run() === false) {
            echo "problema";
        }

//        
        echo $cat_nome;
//        }
//        else
//        {
        echo "bugou";
//        }
    }

}

?>