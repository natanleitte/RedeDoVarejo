<?php

class PdfModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obterTodos() {
        $this->load->database();
        return $this->db->get('compra_item');
    }

    public function obterCompras() {
        $this->load->database();
        $query = "SELECT DISTINCT i.item_nome, i.item_preco_atual, ci.item_qtd, i.item_mercado,
                    c.com_codigo, cli.cli_nome, cli.cli_email, ciii.com_data
                    
                  FROM compra c LEFT JOIN compra_item ci ON c.com_codigo = ci.com_codigo,
                  compra_item cii LEFT JOIN item i ON cii.item_codigo = i.item_codigo,
                  compra ciii LEFT JOIN cliente cli ON ciii.cli_codigo = cli.cli_codigo";
        return $this->db->query($query);
    }
}
