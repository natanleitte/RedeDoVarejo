<?php

class Produto extends CI_Model
{
    private $pro_codigo;
    private $cat_codigo;
    private $pro_nome;
    private $pro_status;
    
     function __construct()
        {
                parent::__construct();
        }
        
        function testando()
        {
            return "teste";
        }
}

?>