<?php

class PedidosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obterCompras() {
        $this->load->database();
        
        $query = "
            SELECT cliente.cli_nome, cliente.cli_email, compra.com_data, compra_item.com_codigo, COUNT(item.item_codigo) as item_qtd, SUM(item.item_preco_atual*compra_item.item_qtd) as comp_total
            FROM
            compra_item LEFT JOIN compra ON compra_item.com_codigo = compra.com_codigo
            LEFT JOIN item ON compra_item.item_codigo = item.item_codigo
            LEFT JOIN cliente ON compra.cli_codigo = cliente.cli_codigo
            WHERE NOT ISNULL(compra.com_codigo)
                "; 
        return $this->db->query($query);
    }

}
