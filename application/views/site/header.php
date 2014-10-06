<!DOCTYPE html>
<?php $prefixLayout = "assets/site/"; 
      $get_url = "index.php/site/index/produto";
?> <!-- prefixo da URL do Layout -->

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <title>TSHOP - Bootstrap E-Commerce Parallax Theme </title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() . $prefixLayout . 'assets/bootstrap/css/bootstrap.css' ?>" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() . $prefixLayout . 'assets/css/style.css' ?>" rel="stylesheet">

        <!-- css3 animation effect for this template -->
        <link href="<?php echo base_url() . $prefixLayout . 'assets/css/animate.min.css' ?>" rel="stylesheet">

        <!-- styles needed by carousel slider -->
        <link href="<?php echo base_url() . $prefixLayout . 'assets/css/owl.carousel.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . $prefixLayout . 'assets/css/owl.theme.css' ?>" rel="stylesheet">
        <!-- styles needed by minimalect -->
        <link href="<?php echo base_url() . $prefixLayout . 'assets/css/jquery.minimalect.min.css' ?>" rel="stylesheet">
        <!-- styles needed by checkRadio -->
        <link href="<?php echo base_url() . $prefixLayout . 'assets/css/ion.checkRadio.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . $prefixLayout . 'assets/css/ion.checkRadio.cloudy.css' ?>" rel="stylesheet">
        <!-- styles needed by mCustomScrollbar -->
        <link href="<?php echo base_url() . $prefixLayout . 'assets/css/jquery.mCustomScrollbar.css' ?>" rel="stylesheet">


        <!-- Just for debugging purposes. -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->  

       
        
        <!-- include pace script for automatic web page progress bar  -->
        <script>
            paceOptions = {
                elements: true
            };
        </script>

        <script src="<?php echo base_url() . $prefixLayout . 'assets/js/pace.min.js' ?>"></script>
        
        
        
    </head>
    <body>

        <!-- Modal Login start -->

        <div class="modal signUpContent fade"id="ModalLogin" tabindex="-1" role="dialog" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                        <h3 class="modal-title-site text-center" > Login </h3>
                    </div>
                    <div class="modal-body">
                        <?php
                        $attributes = array('id' => 'loginForm');
                        echo form_open('index.php/site/cliente/login', $attributes); ?>
                        
                        <!--<form action="index.php/site/cliente/login" id='loginFormt' method="post">-->

                        <div class="form-group login-username">
                            <div >
                                <input name="email" id="email" class="form-control input"  size="20" placeholder="Email" type="text">
                            </div>
                        </div>
                        <div class="form-group login-password">
                            <div >
                                <input name="senha" id="login-password" class="form-control input"  size="20" placeholder="Senha" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div >
                                <div class="checkbox login-remember">
                                    <label>
                                        <input name="rememberme"  value="forever" checked="checked" type="checkbox">
                                        Remember Me </label>
                                </div>
                            </div>
                        </div>
                        <div >
                            <div >
                                <input name="submit" class="btn  btn-block btn-lg btn-primary" value="LOGIN" onclick="entrar();">
                            </div>
                        </div>
                        <!--userForm--> 
                        <?php echo form_close(); ?>

                    </div>
                    <div class="modal-footer">
                        <p class="text-center"> Not here before? <a data-toggle="modal"  data-dismiss="modal" href="#ModalSignup"> Sign Up. </a> <br>
                            <a href="forgot-password.html" > Lost your password? </a> </p>
                    </div>
                </div>
                <!-- /.modal-content --> 

            </div>
            <!-- /.modal-dialog --> 

        </div>
        <!-- /.Modal Login --> 

        <!-- Modal Signup start -->
        <div class="modal signUpContent fade"id="ModalSignup" tabindex="-1" role="dialog" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                        <h3 class="modal-title-site text-center" > REGISTER </h3>
                    </div>
                    <div class="modal-body">
                        <div class="control-group"> <a class="fb_button btn  btn-block btn-lg " href="#"> SIGNUP WITH FACEBOOK </a> </div>
                        <h5 style="padding:10px 0 10px 0;" class="text-center"> OR </h5>
                        <?php echo form_open('index.php/site/cliente/inserir'); ?>

                        <div class="form-group reg-username">
                            <div >
                                <input name="login"  class="form-control input"  size="20" placeholder="Login" type="text">
                            </div>
                        </div>
                        <div class="form-group reg-email">
                            <div >
                                <input name="email"  class="form-control input"  size="20" placeholder="Email" type="text">
                            </div>
                        </div>
                        <div class="form-group reg-password">
                            <div >
                                <input name="senha"  class="form-control input"  size="20" placeholder="Senha" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div >
                                <div class="checkbox login-remember">
                                    <label>
                                        <input name="rememberme" id="rememberme" value="forever" checked="checked" type="checkbox">
                                        Remember Me </label>
                                </div>
                            </div>
                        </div>
                        <div >
                            <div >
                                <input name="submit" class="btn  btn-block btn-lg btn-primary" value="REGISTER" type="submit">
                            </div>
                        </div>
                        <!--userForm--> 
                        <?php echo form_close(); ?>

                    </div>
                    <div class="modal-footer">
                        <p class="text-center"> Already member? <a data-toggle="modal"  data-dismiss="modal" href="#ModalLogin"> Sign in </a> </p>
                    </div>
                </div>
                <!-- /.modal-content --> 

            </div>
            <!-- /.modal-dialog --> 

        </div>

        <!-- Fixed navbar start -->
        <div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
            <div class="navbar-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                            <div class="pull-left">
                                <div class="helpMenu"> <a> HELP </a> <a> <i class="fa fa-phone"></i> CALL 88 01680 53 1352 </a> </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                            <div class="pull-right">
                                <ul class="userMenu">
                                    <li> <a href="account-1.html"> Minha Conta </a> </li>
                                    <li> <a href="checkout-1.html"> Finalizar Compra </a> </li>
                                    <li> <a  data-toggle="modal" data-target="#ModalLogin"> Entrar </a> </li>
                                    <li> <a  data-toggle="modal" data-target="#ModalSignup"> Criar Conta </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.navbar-top-->

            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"> <i class="fa fa-shopping-cart colorWhite"> </i> <span class="cartRespons colorWhite"> Cart ($210.00) </span> </button>
                    <a class="navbar-brand " href="index.html"> <img src="<?php echo base_url() . $prefixLayout . 'images/logo.png' ?>" alt="TSHOP"> </a> 

                    <!-- this part for mobile -->
                    <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                        <div class="input-group">
                            <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
                        </div>
                        <!-- /input-group --> 

                    </div>
                </div>

                <!-- this part is duplicate from cartMenu  keep it for mobile -->
                <div class="navbar-cart  collapse">
                    <div class="cartMenu  col-lg-4 col-xs-12 col-md-4 ">

                        <div class="w100 miniCartTable scroll-pane">
                            <table  >
                                <tbody>
                                    <tr class="miniCartProduct">
                                        <td style="20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="<?php echo base_url() . $prefixLayout . 'images/product/3.jpg' ?>" alt="img"> </a> </div></td>
                                        <td style="40%"><div class="miniCartDescription">
                                                <h4> <a href="product-details.html"> Denim T shirt Black </a> </h4>
                                                <span class="size"> 12 x 1.5 L </span>
                                                <div class="price"> <span> $8.80 </span> </div>
                                            </div></td>
                                        <td  style="10%" class="miniCartQuantity"><a > X 1 </a></td>
                                        <td  style="15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                        <td  style="5%" class="delete"><a > x </a></td>
                                    </tr>
                                    <tr class="miniCartProduct">
                                        <td style="20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="<?php echo base_url() . $prefixLayout . 'images/product/2.jpg' ?>" alt="img"> </a> </div></td>
                                        <td  style="40%"><div class="miniCartDescription">
                                                <h4> <a href="product-details.html"> Denim T shirt Black </a> </h4>
                                                <span class="size"> 12 x 1.5 L </span>
                                                <div class="price"> <span> $8.80 </span> </div>
                                            </div></td>
                                        <td   style="10%" class="miniCartQuantity"><a > X 1 </a></td>
                                        <td  style="15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                        <td  style="5%" class="delete"><a > x </a></td>
                                    </tr>
                                    <tr class="miniCartProduct">
                                        <td style="20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="<?php echo base_url() . $prefixLayout . 'images/product/5.jpg' ?>" alt="img"> </a> </div></td>
                                        <td  style="40%"><div class="miniCartDescription">
                                                <h4> <a href="product-details.html"> Denim T shirt Black </a> </h4>
                                                <span class="size"> 12 x 1.5 L </span>
                                                <div class="price"> <span> $8.80 </span> </div>
                                            </div></td>
                                        <td   style="10%" class="miniCartQuantity"><a > X 1 </a></td>
                                        <td  style="15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                        <td  style="5%" class="delete"><a > x </a></td>
                                    </tr>
                                    <tr class="miniCartProduct">
                                        <td style="20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="<?php echo base_url() . $prefixLayout . 'images/product/3.jpg' ?>" alt="img"> </a> </div></td>
                                        <td  style="40%"><div class="miniCartDescription">
                                                <h4> <a href="product-details.html"> Denim T shirt Black </a> </h4>
                                                <span class="size"> 12 x 1.5 L </span>
                                                <div class="price"> <span> $8.80 </span> </div>
                                            </div></td>
                                        <td   style="10%" class="miniCartQuantity"><a > X 1 </a></td>
                                        <td  style="15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                        <td  style="5%" class="delete"><a > x </a></td>
                                    </tr>
                                    <tr class="miniCartProduct">
                                        <td style="20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="<?php echo base_url() . $prefixLayout . 'images/product/3.jpg' ?>" alt="img"> </a> </div></td>
                                        <td  style="40%"><div class="miniCartDescription">
                                                <h4> <a href="product-details.html"> Denim T shirt Black </a> </h4>
                                                <span class="size"> 12 x 1.5 L </span>
                                                <div class="price"> <span> $8.80 </span> </div>
                                            </div></td>
                                        <td   style="10%" class="miniCartQuantity"><a > X 1 </a></td>
                                        <td  style="15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                        <td  style="5%" class="delete"><a > x </a></td>
                                    </tr>
                                    <tr class="miniCartProduct">
                                        <td style="20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="<?php echo base_url() . $prefixLayout . 'images/product/4.jpg' ?>" alt="img"> </a> </div></td>
                                        <td  style="40%"><div class="miniCartDescription">
                                                <h4> <a href="product-details.html"> Denim T shirt Black </a> </h4>
                                                <span class="size"> 12 x 1.5 L </span>
                                                <div class="price"> <span> $8.80 </span> </div>
                                            </div></td>
                                        <td   style="10%" class="miniCartQuantity"><a > X 1 </a></td>
                                        <td  style="15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                        <td  style="5%" class="delete"><a > x </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!--/.miniCartTable-->

                        <div class="miniCartFooter  miniCartFooterInMobile text-right">
                            <h3 class="text-right subtotal"> Subtotal: $210 </h3>
                            <a class="btn btn-sm btn-danger"> 
                                <i class="fa fa-shopping-cart"> </i> VIEW CART </a> <a class="btn btn-sm btn-primary"> CHECKOUT </a>
                        </div><!--/.miniCartFooter-->

                    </div> <!--/.cartMenu-->
                </div><!--/.navbar-cart-->

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"> <a href="#"> Home </a> </li>
                        <li class="dropdown megamenu-fullwidth"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> New Products <b class="caret"> </b> </a>
                            <ul class="dropdown-menu">
                                <li class="megamenu-content "> 

                                    <ul class="col-lg-3  col-sm-3 col-md-3 unstyled noMarginLeft newCollectionUl">
                                        <li class="no-border">
                                            <p class="promo-1"> <strong> NEW COLLECTION </strong> </p>
                                        </li>
                                        <li> <a href="category.html"> ALL NEW PRODUCTS </a> </li>
                                        <li> <a href="category.html"> NEW TOPS </a> </li>
                                        <li> <a href="category.html"> NEW SHOES </a> </li>
                                        <li> <a href="category.html"> NEW TSHIRT </a> </li>
                                        <li> <a href="category.html"> NEW DENIM </a> </li>
                                    </ul>
                                    <ul class="col-lg-3  col-sm-3 col-md-3  col-xs-4">
                                        <li> <a class="newProductMenuBlock" href="product-details.html"> 
                                                <img class="img-responsive" src="<?php echo base_url() . $prefixLayout . 'images/site/promo1.jpg' ?>" alt="product"> 
                                                <span class="ProductMenuCaption"> 
                                                    <i class="fa fa-caret-right"> </i> JEANS </span> </a>
                                        </li>
                                    </ul>
                                    <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                                        <li> <a class="newProductMenuBlock" href="product-details.html"> 
                                                <img class="img-responsive" src="<?php echo base_url() . $prefixLayout . 'images/site/promo2.jpg' ?>" alt="product"> 
                                                <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> PARTY DRESS </span> 
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                                        <li> <a class="newProductMenuBlock" href="product-details.html"> 
                                                <img class="img-responsive" src="images/site/promo3.jpg" alt="product">
                                                <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> SHOES </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- change width of megamenu = use class > megamenu-fullwidth, megamenu-60width, megamenu-40width -->
                        <li class="dropdown megamenu-80width "> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Sessões <b class="caret"> </b> </a>
                            <ul class="dropdown-menu">
                                <li class="megamenu-content"> 

                                    <!-- megamenu-content -->

                                    <ul class="col-lg-2  col-sm-2 col-md-2  unstyled noMarginLeft">
                                        <li>
                                            <p> <strong> Women Collection </strong> </p>
                                        </li>
                                        <li> <a href="#"> Kameez </a> </li>
                                        <li> <a href="#"> Tops </a> </li>
                                        <li> <a href="#"> Shoes </a> </li>
                                        <li> <a href="#"> T shirt </a> </li>
                                        <li> <a href="#"> Denim </a> </li>
                                        <li> <a href="#"> Party  Dress </a> </li>
                                        <li> <a href="#"> Women Fragrances </a> </li>
                                    </ul>
                                    <ul class="col-lg-2  col-sm-2 col-md-2  unstyled">
                                        <li>
                                            <p> <strong> Men Collection </strong> </p>
                                        </li>
                                        <li> <a href="#"> Panjabi </a> </li>
                                        <li> <a href="#"> Male Fragrances </a> </li>
                                        <li> <a href="#"> Scarf </a> </li>
                                        <li> <a href="#"> Sandal </a> </li>
                                        <li> <a href="#"> Underwear </a> </li>
                                        <li> <a href="#"> Winter Collection </a> </li>
                                        <li> <a href="#"> Men Accessories </a> </li>
                                    </ul>
                                    <ul class="col-lg-2  col-sm-2 col-md-2  unstyled">
                                        <li>
                                            <p> <strong> Top Brands </strong> </p>
                                        </li>
                                        <li> <a href="#"> Diesel </a> </li>
                                        <li> <a href="#"> Farah </a> </li>
                                        <li> <a href="#"> G-Star RAW </a> </li>
                                        <li> <a href="#"> Lyle & Scott </a> </li>
                                        <li> <a href="#"> Pretty Green </a> </li>
                                        <li> <a href="#"> DENIM </a> </li>
                                        <li> <a href="#"> TANJIM </a> </li>
                                    </ul>
                                    <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-6">
                                        <li class="no-margin productPopItem "> 

                                            <a href="product-details.html"> 
                                                <img class="img-responsive" src="<?php echo base_url() . $prefixLayout . 'images/site/g4.jpg' ?>" alt="img"> 
                                            </a> 

                                            <a class="text-center productInfo alpha90" href="product-details.html"> Eodem modo typi <br>
                                                <span> $60 </span> </a> 
                                        </li>
                                    </ul>
                                    <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-6">
                                        <li class="no-margin productPopItem relative">
                                            <a href="product-details.html"> 
                                                <img class="img-responsive" src="images/site/g5.jpg" alt="img"> 
                                            </a> 
                                            <a class="text-center productInfo alpha90" href="product-details.html"> Eodem modo typi <br>
                                                <span> $60 </span> </a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="dropdown megamenu-fullwidth"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> SESSÕES <b class="caret"> </b> </a>
                            <ul class="dropdown-menu">
                                <li class="megamenu-content"> 

                                    <!-- megamenu-content -->

                                    <h3 class="promo-1 no-margin hidden-xs"> SESSÕES </h3>

                                    <?php
                                    foreach ($categorias->result() as $categoria) {
                                        echo "<ul class='col-lg-2  col-sm-2 col-md-2 unstyled'>";
                                        echo "<li class='no-border'>";
                                        echo "<p> <strong>" . $categoria->cat_nome . "</strong> </p>";
                                        echo "</li>";
                                        foreach ($produtos->result() as $produto) {
                                            //se o produto pertencer a categoria
                                            if ($produto->cat_codigo == $categoria->cat_codigo) {
                                                echo "<li> <a href='" . base_url() . $get_url . "/?pro_codigo=" . $produto->pro_codigo . "'>". $produto->pro_nome . "</a> </li>";
                                            }
                                        }
//                                       
                                        echo "</ul>";
                                    }
                                    ?>
                                   
                                  
                                  
                                    <ul class="col-lg-2  col-sm-2 col-md-2 unstyled">
                                        <li class="no-border">
                                            <p> <strong> Checkout </strong> </p>
                                        </li>
                                        <li> <a href="checkout-0.html"> Checkout Before </a> </li>
                                        <li> <a href="checkout-1.html"> checkout step 1 </a> </li>
                                        <li> <a href="checkout-2.html"> checkout step 2 </a> </li>
                                        <li> <a href="checkout-3.html"> checkout step 3 </a> </li>
                                        <li> <a href="checkout-4.html"> checkout step 4 </a> </li>
                                        <li> <a href="checkout-5.html"> checkout step 5 </a> </li>
                                    </ul>
                                    <ul class="col-lg-2  col-sm-2 col-md-2 unstyled">
                                        <li class="no-border">
                                            <p> <strong> User Account </strong> </p>
                                        </li>
                                        <li> <a href="account-1.html"> Account Login </a> </li>
                                        <li> <a href="account.html"> My Account </a> </li>
                                        <li> <a href="my-address.html"> My Address </a> </li>
                                        <li> <a href="user-information.html"> User information </a> </li>
                                        <li> <a href="wishlist.html"> Wisth list </a> </li>
                                        <li> <a href="order-list.html"> Order list </a> </li>
                                        <li> <a href="forgot-password.html"> Forgot Password </a> </li>
                                    </ul>
                                    <ul class="col-lg-2  col-sm-2 col-md-2 unstyled">
                                        <li class="no-border">
                                            <p> <strong> &nbsp; </strong> </p>
                                        </li>
                                        <li> <a href="error-page.html"> Error Page </a> </li>
                                        <li> <a href="blank-page.html"> Blank Page </a> </li>
                                        <li> <a href="form.html"> Basic Form Element </a> </li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                    
                    <!--- this part will be hidden for mobile version -->
                    <div class="nav navbar-nav navbar-right hidden-xs">
                       <?php 
                       $totalCompra = 0;
                       foreach ($this->cart->contents() as $item) {
                           $totalCompra += $item['price'] * $item['qty'];
                       }
                       ?>
                        <div class="dropdown  cartMenu "> 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                <i class="fa fa-shopping-cart"> </i>
                                <span class="cartRespons"> Cart R$ <?php echo $totalCompra; ?> </span> 
                                <b class="caret"> </b> 
                            </a>

                            <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">

                                <div class="w100 miniCartTable scroll-pane">
                                    <table>
                                        <tbody>
                                             <?php
                                             $totalCompra = 0;
                                             foreach ($this->cart->contents() as $item) {
                                             echo "<tr class='miniCartProduct'>";
                                             if ($this->cart->has_options($item['rowid']) == TRUE)
                                             {
                                                foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value)
                                                {
                                                    echo "<td style='20' class='miniCartProductThumb'><div> <a href='product-details.html'> <img src='". $option_value . "' alt='img'> </a> </div></td>";
                                                }
                                            }
                                            echo "<td style='40%'><div class='miniCartDescription'>";
                                            echo "<h4> <a href='product-details.html'>" . $item['name'] . "</a> </h4>";
                                            echo "<span class='size'> 12 x 1.5 L </span>";
                                            echo "<div class='price'> <span> R$ " . $item['price'] . "</span> </div>";
                                            echo "</div></td>";
                                            echo "<td  style='10%' class='miniCartQuantity'><a > X" . $item['qty'] . "</a></td>";
                                            echo "<td  style='15%' class='miniCartSubtotal'><span>" . $item['price'] * $item['qty'] . "</span></td>";
                                            //echo "<td  style='5%' class='delete'><a > x </a></td>";
                                            echo "<td  style='5%' class='delete'><a > <i class = 'glyphicon glyphicon-trash fa-1x'></i> </a></td>";

                                            echo "</tr>";
                                            $totalCompra += $item['price'] * $item['qty'];
                                            }
                                            ?>
<!--                                            <tr class="miniCartProduct">
                                                <td style="width:20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="images/product/3.jpg" alt="img"> </a> </div></td>
                                                <td style="width:40%"><div class="miniCartDescription">
                                                        <h4> <a href="product-details.html"> Denim Tshirt DO9 </a> </h4>
                                                        <span class="size"> 12 x 1.5 L </span>
                                                        <div class="price"> <span> $22 </span> </div>
                                                    </div></td>
                                                <td  style="width:10%" class="miniCartQuantity"><a > X 1 </a></td>
                                                <td  style="width:15%" class="miniCartSubtotal"><span> $33 </span></td>
                                                <td  style="width:5%" class="delete"><a > x </a></td>
                                            </tr>
                                            <tr class="miniCartProduct">
                                                <td style="width:20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="images/product/2.jpg" alt="img"> </a> </div></td>
                                                <td  style="width:40%"><div class="miniCartDescription">
                                                        <h4> <a href="product-details.html"> TShir TSHOP 09 </a> </h4>
                                                        <span class="size"> 12 x 1.5 L </span>
                                                        <div class="price"> <span> $15 </span> </div>
                                                    </div></td>
                                                <td   style="width:10%" class="miniCartQuantity"><a > X 1 </a></td>
                                                <td  style="width:15%" class="miniCartSubtotal"><span> $120 </span></td>
                                                <td  style="width:5%" class="delete"><a > x </a></td>
                                            </tr>
                                            <tr class="miniCartProduct">
                                                <td style="width:20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="images/product/5.jpg" alt="img"> </a> </div></td>
                                                <td  style="width:40%"><div class="miniCartDescription">
                                                        <h4> <a href="product-details.html"> Tshir 2014 </a> </h4>
                                                        <span class="size"> 12 x 1.5 L </span>
                                                        <div class="price"> <span> $30 </span> </div>
                                                    </div></td>
                                                <td   style="width:10%" class="miniCartQuantity"><a > X 1 </a></td>
                                                <td  style="width:15%" class="miniCartSubtotal"><span> $80 </span></td>
                                                <td  style="width:5%" class="delete"><a > x </a></td>
                                            </tr>
                                            <tr class="miniCartProduct">
                                                <td style="width:20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="images/product/3.jpg" alt="img"> </a> </div></td>
                                                <td  style="width:40%"><div class="miniCartDescription">
                                                        <h4> <a href="product-details.html"> Denim T shirt DO20 </a> </h4>
                                                        <span class="size"> 12 x 1.5 L </span>
                                                        <div class="price"> <span> $15 </span> </div>
                                                    </div></td>
                                                <td   style="width:10%" class="miniCartQuantity"><a > X 1 </a></td>
                                                <td  style="width:15%" class="miniCartSubtotal"><span> $55 </span></td>
                                                <td  style="width:5%" class="delete"><a > x </a></td>
                                            </tr>
                                            <tr class="miniCartProduct">
                                                <td style="width:20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="images/product/4.jpg" alt="img"> </a> </div></td>
                                                <td  style="width:40%"><div class="miniCartDescription">
                                                        <h4> <a href="product-details.html"> T shirt Black </a> </h4>
                                                        <span class="size"> 12 x 1.5 L </span>
                                                        <div class="price"> <span> $44 </span> </div>
                                                    </div></td>
                                                <td   style="width:10%" class="miniCartQuantity"><a > X 1 </a></td>
                                                <td  style="width:15%" class="miniCartSubtotal"><span> $40 </span></td>
                                                <td  style="width:5%" class="delete"><a > x </a></td>
                                            </tr>
                                            <tr class="miniCartProduct">
                                                <td style="width:20%" class="miniCartProductThumb"><div> <a href="product-details.html"> <img src="images/site/winter.jpg" alt="img"> </a> </div></td>
                                                <td  style="width:40%"><div class="miniCartDescription">
                                                        <h4> <a href="product-details.html"> G Star T shirt </a> </h4>
                                                        <span class="size"> 12 x 1.5 L </span>
                                                        <div class="price"> <span> $80 </span> </div>
                                                    </div></td>
                                                <td   style="width:10%" class="miniCartQuantity"><a > X 1 </a></td>
                                                <td  style="width:15%" class="miniCartSubtotal"><span> $8.80 </span></td>
                                                <td  style="width:5%" class="delete"><a > x </a></td>
                                            </tr>-->
                                        </tbody>
                                    </table>
                                </div> <!--/.miniCartTable-->


                                <div class="miniCartFooter text-right">
                                    <h3 class="text-right subtotal"> Subtotal: R$ <?php echo $totalCompra ?> </h3>
                                    <a class="btn btn-sm btn-danger" href="<?php echo base_url()?>index.php/site/index/carrinho"> 
                                        <i class="fa fa-shopping-cart"> </i> VER </a> 
                                    <a class="btn btn-sm btn-primary"> FINALIZAR </a> 
                                </div> <!--/.miniCartFooter-->


                            </div><!--/.dropdown-menu-->
                        </div><!--/.cartMenu-->



                        <div class="search-box">
                            <div class="input-group">
                                <button class="btn btn-nobg getFullSearch" type="button"> <i class="fa fa-search"> </i> </button>
                            </div>
                            <!-- /input-group --> 

                        </div><!--/.search-box -->
                    </div><!--/.navbar-nav hidden-xs-->
                </div><!--/.nav-collapse --> 

            </div> <!--/.container -->

            <div class="search-full text-right"> <a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>
                <div class="searchInputBox pull-right">
                    <input type="search"  data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search" class="search-input">
                    <button class="btn-nobg search-btn" type="submit"> <i class="fa fa-search"> </i> </button>
                </div>
            </div>
            <!--/.search-full--> 

        </div>
        <!-- /.Fixed navbar  --> 


        <!-- Le javascript
        ================================================== --> 

        <!-- Placed at the end of the document so the pages load faster --> 
        <script type="text/javascript" src="<?php echo base_url() . $prefixLayout . 'assets/js/jquery/1.8.3/jquery.js' ?>"></script> 
        <script src="<?php echo base_url() . $prefixLayout . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script> 

        <!-- include jqueryCycle plugin --> 
        <script src="<?php echo base_url() . $prefixLayout . 'assets/js/jquery.cycle2.min.js' ?>"></script> 
        <!-- include easing plugin --> 
        <script src="<?php echo base_url() . $prefixLayout . 'assets/js/jquery.easing.1.3.js' ?>"></script> 

        <!-- include  parallax plugin --> 
        <script type="text/javascript"  src="<?php echo base_url() . $prefixLayout . 'assets/js/jquery.parallax-1.1.js' ?>"></script> 

        <!-- optionally include helper plugins --> 
        <script type="text/javascript"  src="<?php echo base_url() . $prefixLayout . 'assets/js/helper-plugins/jquery.mousewheel.min.js' ?>"></script> 

        <!-- include mCustomScrollbar plugin //Custom Scrollbar  --> 

        <script type="text/javascript" src="<?php echo base_url() . $prefixLayout . 'assets/js/jquery.mCustomScrollbar.js' ?>"></script> 

        <!-- include checkRadio plugin //Custom check & Radio  --> 
        <script type="text/javascript" src="<?php echo base_url() . $prefixLayout . 'assets/js/ion-checkRadio/ion.checkRadio.min.js' ?>"></script> 

        <!-- include grid.js // for equal Div height  --> 
        <script src="<?php echo base_url() . $prefixLayout . 'assets/js/grids.js' ?>"></script> 

        <!-- include carousel slider plugin  --> 
        <script src="<?php echo base_url() . $prefixLayout . 'assets/js/owl.carousel.min.js' ?>"></script> 

        <!-- include smoothproducts // product zoom plugin  --> 
        <script type="text/javascript" src="<?php echo base_url() . $prefixLayout . 'assets/js/smoothproducts.min.js' ?>"></script> 

        <!-- jQuery minimalect // custom select   --> 
        <script src="<?php echo base_url() . $prefixLayout . 'assets/js/jquery.minimalect.min.js' ?>"></script> 

        <!-- include touchspin.js // touch friendly input spinner component   --> 
        <script src="<?php echo base_url() . $prefixLayout . 'assets/js/bootstrap.touchspin.js' ?>"></script> 

        <!-- include custom script for site  --> 
        <script src="<?php echo base_url() . $prefixLayout . 'assets/js/script.js' ?>"></script>
        
         <!-- Para as notificações e mensagens de alerta -->
        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/noty/js/noty/packaged/jquery.noty.packaged.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . $prefixLayout . 'assets/js/login.js' ?>"></script>
        
        

    </body>
</html>
