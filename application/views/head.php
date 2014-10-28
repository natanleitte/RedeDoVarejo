<?php
include 'application/controllers/login.php';
//$this->func = new Login();
//$this->func->segurancaPagina();
Login::segurancaPagina();
?>
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
        <link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet">
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
                <!--                 Brand and toggle get grouped for better mobile display 
                                <div class="navbar-header page-scroll">
                                    <img src="<?php echo base_url() . 'assets\img\logo.png' ?>">
                                </div>
                --> 
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url() . 'index.php/pedidos/pedidos' ?>">Pedidos</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url() . 'index.php/categoria/categoria' ?>">Categoria</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url() . 'index.php/produto/produto' ?>">Produto</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url() . 'index.php/item/item' ?>">Item</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url() . 'index.php/usuario/usuario' ?>">Usuários</a>
                        </li>
                        <li>
                            <?php echo form_open('index.php/login/valida'); ?>
                            <button class="btn btn-xl">Sair</button>
                            <?php echo form_close(); ?>
                        </li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header>            
            <div class="container">
                <div class="navbar-header page-scroll">
                    <img src="<?php echo base_url() . 'assets\img\logo.png' ?>">
                </div>
            </div>
        </header>
    </body>
</html>