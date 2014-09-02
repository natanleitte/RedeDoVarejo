<?php

class itemModel extends CI_Model {

    private $item_codigo;
    private $pro_codigo; // chave estrangeira
    private $tpmed_codigo;
    private $item_nome;
    private $item_descricao;
    private $item_preco_antigo;
    private $item_preco_atual;
    private $item_status;
    private $item_medida;
    private $item_novo;
    private $item_dt_promocao;

    function __construct() {
        parent::__construct();
    }

//insere elemento no banco
    function inserir($data) {
        $this->load->database();
//        echo "chegou";
        $this->db->insert('item', $data);
    }

    function obterTodos() {
        $this->load->database();
        return $this->db->get('item');
    }
    
    function obter($item_codigo) {
        $this->load->database();
        return $this->db->query('SELECT * FROM item WHERE item_codigo = ' . $item_codigo);
    }

}

?>