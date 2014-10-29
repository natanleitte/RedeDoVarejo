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
        $this->db->insert('item', $data);
    }

    function obterTodos() {
        $this->load->database();
        return $this->db->get('item');
    }

    function obterTipoMedida() {
        $this->load->database();
        return $this->db->get('tipo_medida');
    }

    function obter($item_codigo) {
        $this->load->database();
        return $this->db->query('SELECT * FROM item WHERE item_codigo = ' . $item_codigo);
    }

    //Faz uma busca de itens que contem a string passada
    function obterItensPorNome($item_nome)
    {
        $this->load->database();       
        $this->db->like('item_nome', $item_nome);
        return $this->db->get('item');       
    }

    function obterConsulta($consulta) {
        $this->load->database();
        return $this->db->query($consulta);
    }

    function obtemPathNew($pro_codigo) {
        $this->load->database();

        $query = "SELECT categoria.cat_nome, produto.pro_nome
                FROM produto LEFT JOIN categoria ON produto.cat_codigo = categoria.cat_codigo
                WHERE produto.pro_codigo =" . $pro_codigo;
        $result = $this->db->query($query);

        $data['produto'] = $result->row('pro_nome');
        $data['categoria'] = $result->row('cat_nome');

        return $data;
    }

    function obtemPathOld($item_codigo) {
        $this->load->database();

        $query = "SELECT categoria.cat_nome, produto.pro_nome
                FROM produto LEFT JOIN categoria ON produto.cat_codigo = categoria.cat_codigo
                WHERE produto.pro_codigo = (SELECT pro_codigo
                                            FROM item
                                            WHERE item_codigo =" . $item_codigo . " )";
        $result = $this->db->query($query);

        $data['produto'] = $result->row('pro_nome');
        $data['categoria'] = $result->row('cat_nome');

        return $data;
    }

    function obtemNomeImg($itemCodigo) {
        $this->load->database();

        $query = "SELECT item_imagem_nome FROM item WHERE item_codigo =" . $itemCodigo;

        $result = $this->db->query($query);

        return $result->row('item_imagem_nome');
    }

    function upDateData($data) {
        $this->load->database();
        $this->db->where('item_codigo', $data['item_codigo']);
        $this->db->update('item', $data);
    }

    function deleteItem($itemCodigo) {
        $this->load->database();

        $query = 'DELETE FROM item WHERE item_codigo = ' . $itemCodigo;

        $this->db->query($query);
    }

}

?>