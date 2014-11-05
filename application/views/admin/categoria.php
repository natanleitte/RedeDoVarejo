<!DOCTYPE html>
<html lang="en">
    <head>
    <input type="hidden" id="url" value="<?php base_url() ?>"/>
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center bg-light-gray">
                    <h2 class="section-heading">Inserir Categoria</h2>
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class=\"alert alert-danger\">" . $_GET['error'] . "</div>";
//                        echo '<meta http-equiv="refresh" content="2;URL=' . base_url() . 'index.php/categoria/categoria" />';
                    }

                    if (isset($_GET['sucess'])) {
                        echo "<div class=\"alert alert-success\">" . $_GET['sucess'] . "</div>";
//                        echo '<meta http-equiv="refresh" content="2;URL=' . base_url() . 'index.php/categoria/categoria" />';
                    }

                    if (isset($_GET['edit'])) {
                        echo "<div class=\"alert alert-success\">" . $_GET['edit'] . "</div>";
//                        echo '<meta http-equiv="refresh" content="2;URL=' . base_url() . 'index.php/categoria/categoria" />';
                    }
                    ?>
                    <span class="fa-stack fa-2x" id="adicionar" onclick="adicionar();">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-plus-circle fa-stack-1x fa-inverse"></i>
                    </span>
                    <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
                    <?php echo form_open('index.php/admin/categoria/inserir'); ?>
                    <!--<form method="post" action="index.php/testando/inserirCategoria" name="categoriaForm" id="categoriaForm">-->
                    <input type='hidden' name='qtdElementos' id='qtdElementos' value="1"/>
                    <div class="row">
                        <div class="col-lg-offset-2"></div>
                        <div class="col-lg-offset-3 col-lg-6">
                            <div class="form-group">
                                <label for="cat_nome">Nome da categoria</label>
                                <div class='form-inline'>
                                    <input type="text" name="cat_nome" class="form-control" placeholder="Nome da Categoria" id="cat_nome" >
                                    &nbsp <input type='checkbox' checked='checked' name='cat_status' id='cat_status' /> Ativo
                                </div>
                            </div>
                        </div>

                        <div id="novoElemento">

                        </div>
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
                <div class="row">
                    <div class="col-lg-12 text-center bg-light-gray">
                        <h2 class="section-heading">Categorias</h2>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <input type='hidden' name='qtdElementos2' id='qtdElementos2' value="1"/>
                    <div>
                        <?php echo form_open('index.php/admin/categoria/editar'); ?>
                        <div id='novoElemento2'>

                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div>
                        <?php echo form_open('index.php/admin/categoria/excluir'); ?>
                        <div id='novoElemento3'>

                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <table class="table table-striped table-bordered table-responsive">
                        <tr>
                            <td><b>Código Categoria</b></td>
                            <td><b>Nome da Categoria</b></td>
                            <td><b>Status da Categoria</b></td>
                            <td><b>Editar</b></td>
                            <td><b>Excluir</b></td>


                        </tr>
                        <?php
                        foreach ($query->result() as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->cat_codigo . "</td>";
                            echo "<td>" . $row->cat_nome . "</td>";
                            echo "<td>" . (($row->cat_status == 1) ? 'Ativo' : 'Inativo') . "</td>";
                            echo "<td><span class='fa-stack'>
                                    <i class='fa fa-pencil fa-stack-2x' onclick='editarCategoria(" . $row->cat_codigo . ");'></i>
                                </span>
                            </td>";
                            echo "<td><span class='fa-stack'>
                                    <i class='fa fa-trash-o fa-stack-2x' onclick='excluirCategoria(" . $row->cat_codigo . ");'></i>
                                </span>
                            </td>";
                            echo "</tr>";
                        }
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
