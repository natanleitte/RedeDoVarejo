<?php form_open('index.php/login/segurancaPagina'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <input type="hidden" id="url" value="<?php base_url() ?>"/>
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center bg-light-gray">
                    <?php echo form_open('index.php/usuario/insere'); ?>
                    <h2 class="section-heading">Inserir novo usuário</h2>
                    <input type='hidden' name='qtdElementos' id='qtdElementos' value="1"/>
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class=\"alert alert-danger\">" . $_GET['error'] . "</div>";
//                        echo '<meta http-equiv="refresh" content="2;URL=' . base_url() . 'index.php/usuario/usuario" />';
                    }

                    if (isset($_GET['success'])) {
                        echo "<div class=\"alert alert-success\">" . $_GET['success'] . "</div>";
//                        echo '<meta http-equiv="refresh" content="2;URL=' . base_url() . 'index.php/usuario/usuario" />';
                    }
                    ?>
                    <div class="row">
                        <div class="col-lg-offset-2"></div>
                        <div class="col-lg-offset-3 col-lg-6">
                            <div class="form-group">
                                <div class='form-inline'>
                                    <input type="text" name="usu_nome" class="form-control" placeholder="Nome" id="pro_nome" >
                                    <input type="text" name="usu_sobrenome" class="form-control" placeholder="Sobrenome" id="pro_nome" >
                                    <input type="text" name="usu_login" class="form-control" placeholder="Login" id="pro_nome" >
                                    <input type="text" name="usu_cpf" class="form-control" placeholder="CPF" id="pro_nome" >
                                    <input type="password" name="usu_senha" class="form-control" placeholder="Senha" id="pro_nome" >
                                    <input type="password" name="usu_senha2" class="form-control" placeholder="Confirme a senha" id="pro_nome" >
                                </div>
                            </div>
                        </div>
                        <!-- Aqui entrará os novos itens -->
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
                        <h2 class="section-heading">Usuários</h2>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <input type='hidden' name='qtdElementos2' id='qtdElementos2' value="1"/>
                    <div>
                        <?php echo form_open('index.php/usuario/editar'); ?>
                        <div id='novoElemento2'>

                        </div>
                        <?php echo form_close(); ?>
                    </div>

                    <div>
                        <?php echo form_open('index.php/usuario/excluir'); ?>
                        <div id='novoElemento3'>

                        </div>
                        <?php echo form_close(); ?>
                    </div>

                    <table class="table table-striped table-bordered table-responsive">

                        <tr>
                            <td><b>Código</b></td>
                            <td><b>Nome</b></td>
                            <td><b>Sobrenome</b></td>
                            <td><b>Login</b></td>
                            <td><b>CPF</b></td>
                            <td><b>Editar</b></td>
                            <td><b>Excluir</b></td>
                        </tr>
                        <?php
                        foreach ($query->result() as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->usu_codigo . "</td>";
                            echo "<td>" . $row->usu_nome . "</td>";
                            echo "<td>" . $row->usu_sobrenome . "</td>";
                            echo "<td>" . $row->usu_login . "</td>";
                            echo "<td>" . $row->usu_cpf . "</td>";
                            echo "<td><span class='fa-stack'>
                                        <i class='fa fa-pencil fa-stack-2x' onclick='editarUsuario($row->usu_codigo);'></i>
                                        </span>
                                    </td>";
                            echo "<td><span class='fa-stack'>
                                        <i class='fa fa-trash-o fa-stack-2x' onclick='excluirUsuario($row->usu_codigo);'></i>
                                        </span>
                                    </td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>

                </div>

                <!-- Portfolio Modal 1 -->
                <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h2>Project Name</h2>
                                        <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                        <img class="img-responsive" src="img/portfolio/roundicons-free.png" alt="">
                                        <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                        <p>
                                            <strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">RoundIcons.com</a>, or you can purchase the 1500 icon set <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">here</a>.</p>
                                        <ul class="list-inline">
                                            <li>Date: July 2014</li>
                                            <li>Client: Round Icons</li>
                                            <li>Category: Graphic Design</li>
                                        </ul>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Modal 2 -->
                <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="modal-body">
                                        <h2>Project Heading</h2>
                                        <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                        <img class="img-responsive img-centered" src="img/portfolio/startup-framework-preview.png" alt="">
                                        <p><a href="http://designmodo.com/startup/?u=787">Startup Framework</a> is a website builder for professionals. Startup Framework contains components and complex blocks (PSD+HTML Bootstrap themes and templates) which can easily be integrated into almost any design. All of these components are made in the same style, and can easily be integrated into projects, allowing you to create hundreds of solutions for your future projects.</p>
                                        <p>You can preview Startup Framework <a href="http://designmodo.com/startup/?u=787">here</a>.</p>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Modal 3 -->
                <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h2>Project Name</h2>
                                        <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                        <img class="img-responsive img-centered" src="<?php echo base_url() . 'assets/img/portfolio/treehouse-preview.png' ?>" alt="">
                                        <p>Treehouse is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. This is bright and spacious design perfect for people or startup companies looking to showcase their apps or other projects.</p>
                                        <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/treehouse-free-psd-web-template/">FreebiesXpress.com</a>.</p>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Modal 4 -->
                <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h2>Project Name</h2>
                                        <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                        <img class="img-responsive img-centered" src="<?php echo base_url() . 'assets/img/portfolio/golden-preview.png' ?>" alt="">
                                        <p>Start Bootstrap's Agency theme is based on Golden, a free PSD website template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Golden is a modern and clean one page web template that was made exclusively for Best PSD Freebies. This template has a great portfolio, timeline, and meet your team sections that can be easily modified to fit your needs.</p>
                                        <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/golden-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Modal 5 -->
                <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h2>Project Name</h2>
                                        <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                        <img class="img-responsive img-centered" src="<?php echo base_url() . 'assets/img/portfolio/escape-preview.png' ?>" alt="">
                                        <p>Escape is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Escape is a one page web template that was designed with agencies in mind. This template is ideal for those looking for a simple one page solution to describe your business and offer your services.</p>
                                        <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/escape-one-page-psd-web-template/">FreebiesXpress.com</a>.</p>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Modal 6 -->
                <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h2>Project Name</h2>
                                        <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                        <img class="img-responsive img-centered" src="<?php echo base_url() . 'assets/img/portfolio/dreams-preview.png' ?>" alt="">
                                        <p>Dreams is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Dreams is a modern one page web template designed for almost any purpose. It’s a beautiful template that’s designed with the Bootstrap framework in mind.</p>
                                        <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/dreams-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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


                </body>

                </html>

                <!--<html>
                    <body>
                        <h1>Teste</h1>
                
                        <form method="post" action="index.php/testando/functionTeste"  name="sentMessage" id="contactForm">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="cat_nome">Nome da categoria</label>
                                        <input type="text" class="form-control" placeholder="Nome da Categoria" id="cat_nome" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="cat_nome">Descrição da Categoria</label>
                                        <textarea type="text" class="form-control" placeholder="Descrição da Categoria" id="cat_descricao" ></textarea>
                                    </div>
                                </div>
                            </div>
                
                            <div class="row">
                                <input type="submit" /> 
                                <button type="button" class="btn btn-xl">Salvar</button>
                            </div>
                        </form>
                <?php
//        $categoria->cat_codigo;
//            echo $categoria;
                ?>
                    </body>
                </html>-->