<?php form_open('index.php/admin/login/segurancaPagina'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <input type="hidden" id="url" value="<?php base_url() ?>"/>
    <script type="text/javascript" src ="<?php echo base_url() . "assets/js/jquery-1.11.0.js" ?>"></script>

    <script>
        $(document).ready(function() {
            $('#porcentagem').change(function() {
                var precoCompra = $('#precoCompra').val();
                var porcentagem = $('#porcentagem').val();
                precoCompra = parseFloat(precoCompra);
                porcentagem = parseInt(porcentagem);

                var result = precoCompra + (precoCompra * (porcentagem / 100));

                $('#item_preco_atual').val(result);
            });
        });
    </script>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center bg-light-gray">
                    <?php echo form_open_multipart('index.php/admin/item/insere'); ?>
                    <h2 class="section-heading">Inserir novo item</h2>
                    <input type='hidden' name='qtdElementos' id='qtdElementos' value="1"/>
                    <div class="row">
                        <div class="col-lg-offset-2"></div>
                        <div class="col-lg-offset-2 col-lg-8">
                            <div class="form-group">
                                <div class="form-inline">
                                    <label>Tipo de Produto</label>
                                    <select class="form-control" name="pro_codigo">
                                        <?php
                                        foreach ($produto->result() as $row) {
                                            echo "<option value='" . $row->pro_codigo . "'>" . $row->pro_nome . "</option>";
                                        }
                                        ?> 
                                    </select>
                                    <br>
                                    <br>
                                </div>
                                <?php
                                if (isset($_GET['succsses'])) {
                                    echo "<div class=\"alert alert-success\">" . $_GET['succsses'] . "</div>";
//                                    echo '<meta http-equiv="refresh" content="2;URL=' . base_url() . 'index.php/item/item" />';
                                }

                                if (isset($_GET['error'])) {
                                    echo "<div class=\"alert alert-danger\">" . $_GET['error'] . "</div>";
//                                    echo '<meta http-equiv="refresh" content="2;URL=' . base_url() . 'index.php/item/item" />';
                                }
                                ?>
                                <div class='form-inline'>
                                    <input type="text" name="item_nome" class="form-control" placeholder="Nome Item"><p></p>                                    </p>
                                    <input type="text" name="precoCompra" id="precoCompra" class="form-control" placeholder="$Preço Compra">
                                    <input type="text" name="porcentagem" id="porcentagem" class="form-control" placeholder="%Porcentagem"><p></p>
                                    <input type="text" name="item_preco_atual" id="item_preco_atual" class="form-control" placeholder="$Preço Final">
                                    <input type="text" name="item_preco_antigo" class="form-control" placeholder="$Preço Antigo">
                                </div>
                                <div class='form-inline'>
                                    <br>
                                    <input type="text" name="item_medida" class="form-control" placeholder="Medida/Peso/Unidade">
                                    <select class="form-control" name="tpmed_codigo">
                                        <?php
                                        foreach ($medida->result() as $row) {
                                            echo "<option value='" . $row->tpmed_codigo . "'>" . $row->tpmed_nome . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Mercado:</label> <select class="form-control" name="item_mercado">
                                        <option value="Atacadão">Atacadão</option>
                                        <option value="Assai">Assai</option>
                                        <option value="Forte Atacadista">Forte Atacadista</option>
                                    </select>
                                    <br>
                                    <br>
                                    <textarea class="form-control" name="item_descricao" cols="35" rows="4" placeholder="Descrição do produto"></textarea> 
                                    <textarea class="form-control" name="item_observacao" cols="35" rows="4" placeholder="Obeservação"></textarea> 
                                </div>
                                <div class='form-inline'>
                                    <br>
                                    <label>Preencha com o a data fim da promoção:</label>
                                    <input type="date" name="item_dt_promocao" class="form-control">
                                    (Opcional)
                                </div>
                                <div class='form-inline'>
                                    <br>
                                    <label>Incluir item em novidades?</label>
                                    <select class='form-control' name='item_novo'>
                                        <option value='1'>Sim</option>
                                        <option value='0'>Não</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Aqui entrará os novos itens -->
                        <div id="novoElemento">

                        </div>
                    </div>
                    <div class='form-inline'>
                        <label>Insira aqui a imagem do item (L:285 x A:380)</label>
                        <input type="file" name="userfile" id="userfile" class="form-control">
                        <br>
                        <br>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-xl">Salvar</button>
                    </div>
                    <br/>
                    <?php echo form_close(); ?>
                </div>
                <div class="row">
                    <div class="col-lg-12"><br></div>
                </div>
                <br/>
                <div class="class">
                    <div class="form-inline">
                        <?php echo form_open_multipart('index.php/admin/item/geraPDF'); ?>
                        <label>Selecione os filtros para gerar PDF:</label>
                        <hr>
                        Categoria:
                        <select class="form-control" name="cat_codigo">
                            <option value="-1">Selecione um valor</option>
                            <?php
                            foreach ($categoria->result() as $row) {
                                echo "<option value='" . $row->cat_codigo . "'>" . $row->cat_nome . "</option>";
                            }
                            ?>
                        </select>
                        Produto:
                        <select class="form-control" name="pro_codigo">
                            <option value="-1">Selecione um valor</option>
                            <?php
                            foreach ($produto->result() as $row) {
                                echo "<option value='" . $row->pro_codigo . "'>" . $row->pro_nome . "</option>";
                            }
                            ?>
                        </select>
                        Ativo:
                        <select class="form-control" name="item_status">
                            <option value="-1">Selecione um valor</option>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                        &nbsp;&nbsp;<button type="submit" class="btn btn-info">Gerar</button>
                        <?php echo form_close(); ?>
                        <hr>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div id="textoItens" class="col-lg-12 text-center bg-light-gray">
                        <h2 class="section-heading">Itens</h2>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <input type='hidden' name='qtdElementos2' id='qtdElementos2' value="1"/>
                    <div>
                        <?php echo form_open_multipart('index.php/admin/item/editar'); ?>
                        <div id='novoElemento2'>

                        </div>
                        <?php echo form_close(); ?>
                    </div>

                    <div>
                        <?php echo form_open('index.php/admin/item/excluir'); ?>
                        <div id='novoElemento3'>

                        </div>
                        <?php echo form_close(); ?>
                    </div>

                    <table class="table table-striped table-bordered table-responsive">

                        <tr>
                            
                            <!--<td><b>Codigo Produto</b></td>-->
                            <td><b>Nome Produto</b></td>
							<td><b>Nome Item</b></td>
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
                        $this->load->model('itemmodel');

//Total de registros por página
                        $totalRegistros = 50;

//Utiliza a variavel "pagina" para identificar a página atual
                        $pagina = $this->input->get('pagina');
                        $pc = !$pagina ? "1" : $pagina;

//Determina o valor inicial das buscas limitadas
                        $inicio = $pc - 1;
                        $inicio = $inicio * $totalRegistros;

                        $busca = "SELECT * ";
                        $busca .= "FROM item LEFT JOIN produto ON item.pro_codigo = produto.pro_codigo ";
                        $busca .= "LEFT JOIN tipo_medida ON item.tpmed_codigo = tipo_medida.tpmed_codigo ";
                        $busca .= "ORDER BY pro_nome ASC, item_nome DESC ";
                        $busca .= "LIMIT " . $inicio . ', ' . $totalRegistros;

                        $item = $this->itemmodel->obterConsulta($busca);

//Verifica o número total de paginas
                        $tp = $totalRegistroConsulta / $totalRegistros;

                        foreach ($item->result() as $row) {
                            echo "<tr>";
                            //echo "<td>" . $row->pro_codigo . "</td>";
                            echo "<td>" . $row->pro_nome . "</td>";
							echo "<td>" . $row->item_nome . "</td>";
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
                            echo "<td><span class='fa-stack'>
                                        <i class='fa fa-pencil fa-stack-2x' onclick='editarItem($row->item_codigo);'></i>
                                        </span>
                                    </td>";
                            echo "<td><span class='fa-stack'>
                                        <i class='fa fa-trash-o fa-stack-2x' onclick='excluirItem($row->item_codigo);'></i>
                                        </span>
                                    </td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <?php
// agora vamos criar os botões "Anterior e próximo"
                            $anterior = $pc - 1;
                            $proximo = $pc + 1;

                            echo "<li>";
                            if ($pc > 1) {
                                echo form_open('index.php/admin/item/item?pagina=' . $anterior);
                                echo "<button class='btn btn-x1'><< Anterior</button>";
                                echo form_close();
                            }
                            echo "</li>";

                            echo "<li>";
                            if ($pc < $tp) {
                                echo form_open('index.php/admin/item/item?pagina=' . $proximo);
                                echo "<button class='btn btn-x1'>Próximo >></button>";
                                echo form_close();
                            }
                            echo "</li>";
                            ?>
                        </ul>
                    </div>
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