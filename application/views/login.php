<?php ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Rede do Varejo - Admin</title>
        <!-- Bootstrap Core CSS -->
        <!--<link href="http://localhost/CodeIgniterTest2/assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">-->
        <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
        <script src="<?php echo base_url() . 'assets/js/categoria/categoria.js' ?>"></script>

        <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->

        <!-- Custom CSS -->
        <link href="<?php echo base_url() . 'assets/css/agency.css' ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url() . 'assets/font-awesome-4.1.0/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="col-lg-offset-3 col-lg-6">
                        <div class="form-group">
                            <?php echo form_open('index.php/login/valida'); ?>
                            <img src="assets\img\logos\logo.png">
                            <h3>área admnistrativa</h3>
                            <?php
                            if (isset($_GET['error'])) {
                                echo "<div class=\"alert alert-danger\">" . $_GET['error'] . "</div>";
//                                echo '<meta http-equiv="refresh" content="2;URL=' . base_url() . 'index.php" />';
                            }
                            ?>
                            <input type="text" name="usu_login" placeholder="Login" class="form-control">
                            <br>
                            <input type="password" name="usu_senha" placeholder="Senha" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-xl">Entrar</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Portfolio Modals -->
        <!-- Use the modals below to showcase details about your portfolio projects! -->

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