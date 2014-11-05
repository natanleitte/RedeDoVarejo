<?php

class Item extends CI_Controller {

    public function index() {
        $this->load->model('itemmodel');
        $this->load->model('produtomodel');
        $this->load->model('categoriamodel');

        $data['medida'] = $this->itemmodel->obterTipoMedida();

        $data['categoria'] = $this->categoriamodel->obterTodos();
        $data['produto'] = $this->produtomodel->obterTodos();

        $query = $this->itemmodel->obterConsulta("SELECT *
        FROM item LEFT JOIN produto ON item.pro_codigo = produto.pro_codigo
        LEFT JOIN tipo_medida ON item.tpmed_codigo = tipo_medida.tpmed_codigo");

        $data['totalRegistroConsulta'] = $query->num_rows();

//        $data['item'] = $query;

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
        $imagem_dir = "assets/img/img-itens/" . $this->removeAscento($queryImg['categoria']) . "/" . $this->removeAscento($queryImg['produto']) . "/";

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
        $data['item_img'] = Item::insereImagem($data['pro_codigo']);
        $data['item_descricao'] = $this->input->post('item_descricao');
        $data['item_preco_antigo'] = $this->input->post('item_preco_antigo');
        $data['item_preco_atual'] = $this->input->post('item_preco_atual');
        $data['item_preco_compra'] = $this->input->post('precoCompra');
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
        $this->load->model('produtomodel');

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
                $row->item_img,
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
            $data['item_img'] = Item::insereImagem($data['pro_codigo']);
            return $data;
        } else {
            $imagemNome = $this->itemmodel->obtemNomeImg($data['item_codigo']);
            $imagem_dir = "assets/img/img-itens/" . $this->removeAscento($pathOld['categoria']) . "/" . $this->removeAscento($pathOld['produto']) . "/" . $imagemNome;
            //Remove o arquivo antigo
            unlink($imagem_dir);
            $data['item_img'] = Item::insereImagem($data['pro_codigo']);
            return $data;
        }
    }

    public function excluir() {
        $this->load->model('itemmodel');

        $itemCodigo = $this->input->post('item_codigo');

        $pathOld = $this->itemmodel->obtemPathOld($itemCodigo);
        $imagemNome = $this->itemmodel->obtemNomeImg($itemCodigo);
        $imagem_dir = "assets/img/img-itens/" . $this->removeAscento($pathOld['categoria']) . "/" . $this->removeAscento($pathOld['produto']) . "/" . $imagemNome;

        //Remove o arquivo antigo
        unlink($imagem_dir);

        $this->itemmodel->deleteItem($itemCodigo);
        header('Location:' . base_url() . 'index.php/admin/item/item?succsses=' . urlencode('Item excluído com sucesso!'));
    }

    function removeAscento($string) {
        $map = array(
            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            'Á' => 'A',
            'À' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'É' => 'E',
            'Ê' => 'E',
            'Í' => 'I',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ú' => 'U',
            'Ü' => 'U',
            'Ç' => 'C'
        );
        return strtr($string, $map); // funciona corretamente
    }

    public function geraPDF() {
        $this->load->helper(array('dompdf', 'file'));
        $this->load->model('itemmodel');

        $data['cat_codigo'] = $this->input->post('cat_codigo');
        $data['pro_codigo'] = $this->input->post('pro_codigo');
        $data['item_status'] = $this->input->post('cat_codigo');

        if ($data['cat_codigo'] == -1 && $data['pro_codigo'] == -1 && $data['item_codigo'] == -1) {
            $item = $this->itemmodel->obterConsulta("SELECT *
            FROM item i LEFT JOIN produto p ON i.pro_codigo = p.pro_codigo
            LEFT JOIN categoria c ON p.cat_codigo = c.cat_codigo");
        } else {
            if ($data['pro_codigo'] == -1 && $data['item_codigo'] == -1) {
                $item = $this->itemmodel->obterConsulta("SELECT * "
                        . "FROM item i LEFT JOIN produto p ON i.pro_codigo = p.pro_codigo "
                        . "LEFT JOIN categoria c ON c.cat_codigo = p.cat_codigo "
                        . "WHERE cat_codigo=" . $data['cat_codigo']);
            } else {
                if ($data['item_status'] == -1) {
                    $item = $this->itemmodel->obterConsulta("SELECT * "
                            . "FROM item i LEFT JOIN produto p ON i.pro_codigo = p.pro_codigo "
                            . "LEFT JOIN categoria c ON c.cat_codigo = p.cat_codigo "
                            . "WHERE cat_codigo=" . $data['cat_codigo'] . " AND pro_codigo=" . $data['pro_codigo']);
                } else {
                    $item = $this->itemmodel->obterConsulta("SELECT * "
                            . "FROM item i LEFT JOIN produto p ON i.pro_codigo = p.pro_codigo "
                            . "LEFT JOIN categoria c ON c.cat_codigo = p.cat_codigo "
                            . "WHERE cat_codigo=" . $data['cat_codigo'] . " AND pro_codigo=" . $data['pro_codigo'] . " AND item_status=" . $data['item_status']);
                }
            }
        }

        $HTML = $this->geraHTML($item);
        pdf_create($HTML, "Tabela de Itens");
    }

    function geraHTML($item) {
        return '<html>
                    <head>
                      <style="text/css">
                        body {
                          font-family: Calibri, DejaVu Sans, Arial;
                          margin: 0;
                          padding: 0;
                          border: none;
                          font-size: 10px;
                        }
                        #tabela {
                            align: center
                        }
                        #exemplo {
                          width: 100%;
                          height: auto;
                          overflow: hidden;
                          padding: 5px 0;
                          text-align: center;
                          background-color: #FF3333;
                          font-size: 17px;
                          color: #FFF;
                        </style>
                            </head>
                            <body>
                              
                                <label>Informações da Compra:</label>
                                    <table class="tabela">
                                        <tr>
                                            <td><b>Nome Item</b></td>
                                            <td><b>Nome Produto</b></td>
                                            <td><b>Mercado</b></td>
                                            <td><b>Descrição</b></td>
                                            <td><b>Observação</b></td>
                                            <td><b>Medida</b></td>
                                            <td><b>Tipo da Medida</b></td>
                                            <td><b>Preço Antigo</b></td>
                                            <td><b>Preço Atual</b></td>
                                            <td><b>Data de Promoção</b></td>
                                            <td><b>Novidade?</b></td>
                                            <td><b>Status</b></td>
                                            <td><b>Editar</b></td>
                                            <td><b>Excluir</b></td>
                                        </tr>';
        foreach ($item->result() as $row) {
            echo "<tr>";
            echo "<td>" . $row->item_nome . "</td>";
            //echo "<td>" . $row->pro_codigo . "</td>";
            echo "<td>" . $row->pro_nome . "</td>";
            echo "<td>" . $row->item_mercado . "</td>";
            //echo "<td>" . $row->item_codigo . "</td>";
            echo "<td>" . $row->item_descricao . "</td>";
            echo "<td>" . $row->item_observacao . "</td>";
            echo "<td>" . $row->item_medida . "</td>";
            echo "<td>" . $row->tpmed_nome . "</td>";
            echo "<td>" . 'R$' . number_format($row->item_preco_antigo, 2, ',', '.') . "</td>";
            echo "<td>" . 'R$' . number_format($row->item_preco_atual, 2, ',', '.') . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($row->item_dt_promocao)) . "</td>";
            echo "<td>" . (($row->item_novo == 1) ? 'Sim' : 'Não') . "</td>";
            //                            echo "<td>" . $row->item_imagem_nome . "</td>";
            echo "<td>" . (($row->item_status == 1) ? 'Ativo' : 'Inativo') . "</td>";
            echo "</tr>";
        }
        echo '</table>
                                    <p><b>Total compra: R$ ' . number_format($row->item_qtd * $total, 2, ',', '.') . '</b></p>
                                    <br>
                                    <hr>
                                </div>
                            </body>
                        </html>';
    }

}
