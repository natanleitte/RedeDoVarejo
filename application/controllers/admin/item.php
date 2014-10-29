<?php

class Item extends CI_Controller {

    public function index() {
        $this->load->model('itemmodel');
        $this->load->model('produtomodel');

        $data['medida'] = $this->itemmodel->obterTipoMedida();

        $data['produto'] = $this->produtomodel->obterTodos();

        $data['item'] = $this->itemmodel->obterConsulta("SELECT *
        FROM item LEFT JOIN produto ON item.pro_codigo = produto.pro_codigo
        LEFT JOIN tipo_medida ON item.tpmed_codigo = tipo_medida.tpmed_codigo");

        $this->load->view('admin/head');
        $this->load->view('admin/item', $data);
    }

    public function validaExistencia($item_nome, $pro_codigo) {
        $this->load->model('itemmodel');
        $query = $this->itemmodel->obterConsulta("SELECT item_nome FROM item WHERE item_nome='" . $item_nome . "' AND pro_codigo=" . $pro_codigo);
        return ($query->num_rows()) ? TRUE : FALSE;
    }

    public function insereImagem($pro_codigo) {
        $this->load->model('itemmodel');

        // Caminho de onde a imagem ficará
        $queryImg = $this->itemmodel->obtemPathNew($pro_codigo);
        $imagem_dir = "assets/img/categoria/" . $queryImg['categoria'] . "/" . $queryImg['produto'] . "/";

        //Configurações da imagem
        $config['upload_path'] = $imagem_dir;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3000';
        $config['max_width'] = '285';
        $config['max_height'] = '380';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            header('Location:' . base_url() . 'index.php/admin/item/item?error=' . urlencode($this->upload->display_errors()));
            exit();
        } else {
            $data = array('upload_data' => $this->upload->data());
            foreach ($data as $item) {
                $item_imagem_nome = md5(uniqid(time())) . "" . $item['file_ext'];
                rename($imagem_dir . "" . $item['file_name'], $imagem_dir . $item_imagem_nome);
                return $item_imagem_nome;
            }
        }
    }

    public function insere() {
        $this->load->model('itemmodel');

        // Recebe os campos
        $data['pro_codigo'] = $this->input->post('pro_codigo');
        $data['tpmed_codigo'] = $this->input->post('tpmed_codigo');
        $data['item_nome'] = $this->input->post('item_nome');
        $data['item_mercado'] = $this->input->post('item_mercado');
        $data['item_imagem_nome'] = Item::insereImagem($data['pro_codigo']);
        $data['item_descricao'] = $this->input->post('item_descricao');
        $data['item_preco_antigo'] = $this->input->post('item_preco_antigo');
        $data['item_preco_atual'] = $this->input->post('item_preco_atual');
        $data['item_status'] = 1;
        $data['item_medida'] = $this->input->post('item_medida');
        $data['item_novo'] = $this->input->post('item_novo');
        $data['item_observacao'] = $this->input->post('item_observacao');
        $data['item_dt_promocao'] = $this->input->post('item_dt_promocao');


        if (empty($data['item_nome']) || empty($data['item_preco_atual']) || empty($data['item_medida'])) {
            // Existem campos obrigatórios vazios.
            header('Location:' . base_url() . 'index.php/admin/item/item?error=' . urlencode('Existe(m) campo(s) vazio(s)!'));
            exit();
        } else if (Item::validaExistencia($data['item_nome'], $data['pro_codigo'])) {
            // Existem campos obrigatórios vazios.
            header('Location:' . base_url() . 'index.php/admin/item/item?error=' . urlencode('Item já cadastrado!'));
            exit();
        } else {
            $this->itemmodel->inserir($data);
            header('Location:' . base_url() . 'index.php/admin/item/item?succsses=' . urlencode('Cadastro Realizado com sucesso!'));
        }
    }

    public function jsonItem() {
        //carrega model
        $this->load->model('itemmodel');

        $editaCodigo = $this->input->post('var');

        $query = "SELECT * FROM item WHERE item_codigo = " . $editaCodigo;
        $result = $this->itemmodel->obterConsulta($query);

        foreach ($result->result() as $row) {
            $array = array(
                $row->item_codigo,
                $row->item_nome,
                $row->item_status,
                $row->pro_codigo,
                $row->item_descricao,
                $row->tpmed_codigo,
                $row->item_preco_antigo,
                $row->item_preco_atual,
                $row->item_dt_promocao,
                $row->item_observacao,
                $row->item_imagem_nome,
                $row->item_medida,
                $row->item_novo,
                $row->item_mercado
            );
        }
        echo json_encode($array);
    }

    public function editar() {
        $this->load->model('itemmodel');

        // Recebe os campos
        $data['pro_codigo'] = $this->input->post('pro_codigo');
        $data['tpmed_codigo'] = $this->input->post('tpmed_codigo');
        $data['item_nome'] = $this->input->post('item_nome');
        $data['item_mercado'] = $this->input->post('item_mercado');
        $data['item_codigo'] = $this->input->post('item_codigo');
        $data['item_descricao'] = $this->input->post('item_descricao');
        $data['item_preco_atual'] = $this->input->post('item_preco_atual');
        $data['item_preco_antigo'] = $this->input->post('item_preco_antigo');
        $data['item_status'] = $this->input->post('item_status');
        $data['item_medida'] = $this->input->post('item_medida');
        $data['item_novo'] = $this->input->post('item_novo');
        $data['item_observacao'] = $this->input->post('item_observacao');
        $data['item_dt_promocao'] = $this->input->post('item_dt_promocao');

//        if (empty($data['item_nome']) || empty($data['item_preco_atual']) || empty($data['item_medida'])) {
//            // Existem campos obrigatórios vazios.
//            header('Location:' . base_url() . 'index.php/admin/item/item?error=' . urlencode('Existe(m) campo(s) vazio(s)!'));
//        } else {

            //Imagem foi alterada
            $valida = $_FILES['userfile']['name'];
            if (!empty($valida)) {
                $data = Item::editarImagem($data);
                $this->itemmodel->upDateData($data);
                header('Location:' . base_url() . 'index.php/admin/item/item?succsses=' . urlencode('Edição realizada com sucesso!'));
            } else {
                $this->itemmodel->upDateData($data);
                header('Location:' . base_url() . 'index.php/admin/item/item?succsses=' . urlencode('Edição realizada com sucesso!'));
            }
//        }
    }

    public function editarImagem($data) {
        $this->load->model('itemmodel');

        $pathOld = $this->itemmodel->obtemPathOld($data['item_codigo']);
        $pathNew = $this->itemmodel->obtemPathNew($data['pro_codigo']);

        if ($pathOld['produto'] == $pathNew['produto']) {
            $data['item_imagem_nome'] = Item::insereImagem($data['pro_codigo']);
            return $data;
        } else {
            $imagemNome = $this->itemmodel->obtemNomeImg($data['item_codigo']);
            $imagem_dir = "assets/img/categoria/" . $pathOld['categoria'] . "/" . $pathOld['produto'] . "/" . $imagemNome;
            //Remove o arquivo antigo
            unlink($imagem_dir);
            $data['item_imagem_nome'] = Item::insereImagem($data['pro_codigo']);
            return $data;
        }
    }

    public function excluir() {
        $this->load->model('itemmodel');
        
        $itemCodigo = $this->input->post('item_codigo');
        
        $pathOld = $this->itemmodel->obtemPathOld($itemCodigo);
        $imagemNome = $this->itemmodel->obtemNomeImg($itemCodigo);
        $imagem_dir = "assets/img/categoria/" . $pathOld['categoria'] . "/" . $pathOld['produto'] . "/" . $imagemNome;
        
        //Remove o arquivo antigo
        unlink($imagem_dir);
        
        $this->itemmodel->deleteItem($itemCodigo);
        header('Location:' . base_url() . 'index.php/admin/item/item?succsses=' . urlencode('Item excluído com sucesso!'));
    }
}

?>