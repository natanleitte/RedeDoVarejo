<?php form_open('index.php/admin/login/segurancaPagina'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <input type="hidden" id="url" value="<?php base_url() ?>"/>
    <div class="row">
        <div class="col-lg-12"><br></div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center bg-light-gray">
            <h2 class="section-heading">Itens</h2>
        </div>
    </div>
    <br/>
    <div class="row">
        <table class="table table-striped table-bordered table-responsive">

            <tr>
                <td><b>Nome Item</b></td>
                <!--<td><b>Codigo Produto</b></td>-->
                <td><b>Nome Produto</b></td>
                <!--<td><b>Codigo Item</b></td>-->
                <td><b>Mercado</b></td>
                <td><b>Descrição</b></td>
                <td><b>Observação</b></td>
                <td><b>Medida</b></td>
                <td><b>Tipo da Medida</b></td>
                <td><b>Preço Antigo</b></td>
                <td><b>Preço Atual</b></td>
                <td><b>Data de Promoção</b></td>
                <td><b>Novidade?</b></td>
                <!--<td><b>Imagem</b></td>-->
                <td><b>Status</b></td>
                <td><b>Editar</b></td>
                <td><b>Excluir</b></td>
            </tr>
            <?php
//                        foreach ($item->result() as $row) {
//                            echo "<tr>";
//                            echo "<td>" . $row->item_nome . "</td>";
//                            //echo "<td>" . $row->pro_codigo . "</td>";
//                            echo "<td>" . $row->pro_nome . "</td>";
//                            echo "<td>" . $row->item_mercado . "</td>";
//                            //echo "<td>" . $row->item_codigo . "</td>";
//                            echo "<td>" . $row->item_descricao . "</td>";
//                            echo "<td>" . $row->item_observacao . "</td>";
//                            echo "<td>" . $row->item_medida . "</td>";
//                            echo "<td>" . $row->tpmed_nome . "</td>";
//                            echo "<td>" . 'R$' . number_format($row->item_preco_antigo, 2, ',', '.') . "</td>";
//                            echo "<td>" . 'R$' . number_format($row->item_preco_atual, 2, ',', '.') . "</td>";
//                            echo "<td>" . date('d/m/Y', strtotime($row->item_dt_promocao)) . "</td>";
//                            echo "<td>" . (($row->item_novo == 1) ? 'Sim' : 'Não') . "</td>";
////                            echo "<td>" . $row->item_imagem_nome . "</td>";
//                            echo "<td>" . (($row->item_status == 1) ? 'Ativo' : 'Inativo') . "</td>";
//                            echo "<td><span class='fa-stack'>
//                                        <i class='fa fa-pencil fa-stack-2x' onclick='editarItem($row->item_codigo);'></i>
//                                        </span>
//                                    </td>";
//                            echo "<td><span class='fa-stack'>
//                                        <i class='fa fa-trash-o fa-stack-2x' onclick='excluirItem($row->item_codigo);'></i>
//                                        </span>
//                                    </td>";
//                            echo "</tr>";
//                        }
            ?>
        </table>

    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url() . 'assets/js/jquery-1.11.0.js' ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js' ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo base_url() . 'assets/js/classie.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/cbpAnimatedHeader.js' ?>"></script>


    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url() . 'assets/js/jqBootstrapValidation.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/contact_me.js' ?>"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() . 'assets/js/agency.js' ?>"></script>

</html>