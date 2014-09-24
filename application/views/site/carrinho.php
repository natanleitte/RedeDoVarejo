<?php $prefixLayout = "assets/site/"; ?>
<script src="<?php echo base_url() . $prefixLayout . 'assets/js/carrinho.js' ?>"></script>


<?php
//Exemplo de como exibir o carrinho de compras
//echo $this->cart->total();
foreach ($this->cart->contents() as $item) {
//    echo "comeca";
//    echo "<br/>";
//    echo $item['id'];
//    echo "<br/>";
//    echo $item['price'];
//    echo "<br/>";
//    echo $item['name'];
//    echo "<br/>";

if ($this->cart->has_options($item['rowid']) == TRUE)
{
foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value)
{
//            echo $option_value;
}
}
}


//$urlImg = "assets/site/images/imgProdutos/" . $cat_nome;

?>

<!DOCTYPE html>
<html lang="en">

    <!-- /.Fixed navbar  -->


    <div class="container main-container headerOffset">
        <div class="row">
            <div class="breadcrumbDiv col-lg-12">
                <ul class="breadcrumb">
                    <li> <a href="index.html">Home</a> </li>
                    <li> <a href="category.html">Category</a> </li>
                    <li class="active">Cart </li>
                </ul>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-7">
                <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho de Compras </span></h1>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
                <h4 class="caps"><a  onclick="history.go(-1)"><i class="fa fa-chevron-left"></i> CONTINUAR COMPRANDO </a></h4>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-7">
                <div class="row userInfo">
                    <div class="col-xs-12 col-sm-12">
                        <div class="cartContent w100">
                            <table class="cartTable table-responsive" style="width:100%">
                                <tbody>

                                    <tr class="CartProduct cartTableHeader">
                                        <td style="width:15%"  > Produtos </td>
                                        <td style="width:40%"  >Detalhes</td>
                                        <td style="width:10%"  class="delete">&nbsp;</td>
                                        <td style="width:10%" >QNT</td>
                                        <td style="width:10%" >Desconto?</td>
                                        <td style="width:15%" >Total</td>
                                    </tr>

                                    <?php
                                    $totalCompra = 0;
                                    foreach ($this->cart->contents() as $item) {
                                    echo "<tr class = 'CartProduct'>";
                                    if ($this->cart->has_options($item['rowid']) == TRUE)
                                    {
                                        foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value)
                                        {
                                            echo "<td class = 'CartProductThumb'><div> <a href = 'product-details.html'><img src ='" . $option_value . "' alt = 'img'></a> </div></td>";
                                        }
                                    }                                 
                                    echo "<td ><div class = 'CartDescription'>";
                                    echo "<h4> <a href = 'product-details.html'>" . $item['name'] . "</a> </h4>";
                                    echo "<span class = 'size'>12 x 1.5 L</span>";
                                    echo "<div class = 'price'> <span>". $item['price'] ."</span></div>";
                                    echo "</div></td>";
                                    $attributes = array('id' => 'removeDoCarrinhoForm');
                                    echo form_open('index.php/site/index/removeDoCarrinho', $attributes); //abre form pra remover do Carrinho 
                                    echo "<input type='hidden' name='rowid' value='" . $item['rowid'] . "'/>";
                                    echo "<td class = 'delete'><a onclick='removeDoCarrinho()' title = 'Delete'> <i class = 'glyphicon glyphicon-trash fa-2x'></i></a></td>";
                                    echo form_close(); //fecha form pra remover do Carrinho 
                                    echo "<td ><input class = 'quanitySniper' type = 'text' value = '" . $item['qty'] . "' name = 'quanitySniper'></td>";
                                    echo "<td >0</td>";
                                    echo "<td class = 'price'>" . $item['price'] * $item['qty'] . "</td>";
                                    echo "</tr>";
                                    $totalCompra += ($item['price'] * $item['qty']);
                                    }
                                    ?>
<!--                                    <tr class = "CartProduct">
                                    <td class = "CartProductThumb"><div> <a href = "product-details.html"><img src = "images/product/a2.jpg" alt = "img"></a> </div></td>
                                    <td ><div class = "CartDescription">
                                    <h4> <a href = "product-details.html">Denim T shirt Red </a> </h4>
                                    <span class = "size">12 x 1.5 L</span>
                                    <div class = "price"> <span>$30</span> </div>
                                    </div></td>
                                    <td class = "delete"><a title = "Delete"> <i class = "glyphicon glyphicon-trash fa-2x"></i></a></td>
                                    <td ><input class = "quanitySniper" type = "text" value = "2" name = "quanitySniper"></td>
                                    <td >0</td>
                                    <td class = "price" >$60</td>
                                    </tr>-->

<!--                                    <tr class = "CartProduct">
                                    <td class = "CartProductThumb">
                                    <div>
                                    <a href = "product-details.html"><img src = "images/product/a5.jpg" alt = "img"></a>
                                    </div>
                                    </td>

                                    <td ><div class = "CartDescription">
                                    <h4> <a href = "product-details.html">Denim T shirt Blue </a> </h4>
                                    <span class = "size">12 x 1.5 L</span>
                                    <div class = "price"> <span>$8.80</span></div>
                                    </div></td>
                                    <td class = "delete"><a title = "Delete"> <i class = "glyphicon glyphicon-trash fa-2x"></i></a></td>
                                    <td ><input class = "quanitySniper" type = "text" value = "2" name = "quanitySniper"></td>
                                    <td >0</td>
                                    <td class = "price">$60</td>
                                    </tr>-->
                                    </tbody>
                                    </table>
                                    </div>
                                    <!--cartContent-->

                                    <div class = "cartFooter w100">
                                    <div class = "box-footer">
                                    <div class = "pull-left"> <a href = "index.html" class = "btn btn-default"> <i class = "fa fa-arrow-left"></i> &nbsp;
                                    Continuar comprando </a> </div>
                                    <div class = "pull-right">
                                    <button type = "submit" class = "btn btn-default"> <i class = "fa fa-undo"></i> &nbsp;
                                    Atualizar carrinho </button>
                                    </div>
                                    </div>
                                    </div> <!--/ cartFooter -->

                                    </div>
                                    </div>
                                    <!--/row end-->

                                    </div>
                                    <div class = "col-lg-3 col-md-3 col-sm-5 rightSidebar">
                                    <div class = "contentBox" >
                                    <div class = "w100 costDetails">
                                    <div class = "table-block" id = "order-detail-content"> <a class = "btn btn-primary btn-lg btn-block " title = "checkout" href = "<?php echo base_url() . "index.php/site/index/finalizar_compra1" ?>" style = "margin-bottom:20px"> Finalizar compra &nbsp;
                                    <i class = "fa fa-arrow-right"></i> </a>
                                    <div class = "w100 cartMiniTable">
                                    <table id = "cart-summary" class = "std table">
                                    <tbody>
                                    <tr >
                                    <td>Total</td>
                                    <td class = "price" > <?php echo $totalCompra ?></td>
                                    </tr>
                                    <tr style = "">
                                    <td>Shipping</td>
                                    <td class = "price" ><span class = "success">Free shipping!</span></td>
                                    </tr>
                                    <tr class = "cart-total-price ">
                                    <td>Total (tax excl.)</td>
                                    <td class = "price" >$216.51</td>
                                    </tr>
                                    <tr >
                                    <td>Total tax</td>
                                    <td class = "price" id = "total-tax">$0.00</td>
                                    </tr>
                                    <tr >
                                    <td > Total </td>
                                    <td class = " site-color" id = "total-price">$216.51</td>
                                    </tr>
                                    <tr >
                                    <td colspan = "2" ><div class = "input-append couponForm">
                                    <input class = "col-lg-8" id = "appendedInputButton" type = "text" placeholder = "Coupon code" >
                                    <button class = "col-lg-4 btn btn-success" type = "button">Apply!</button>
                                    </div></td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <!--End popular -->

                                    </div>
                                    <!--/rightSidebar-->

                                    </div><!--/row-->

                                    <div style = "clear:both"></div>
                                    </div><!--/.main-container -->

                                    <div class = "gap"> </div>

                                    <footer>
                                    <div class = "footer">
                                    <div class = "container">
                                    <div class = "row">

                                    <div class = "col-lg-3  col-md-3 col-sm-4 col-xs-6">
                                    <h3>
                                    Support
                                    </h3>
                                    <ul>
                                    <li class = "supportLi">
                                    <p>
                                    Lorem ipsum dolor sit amet, consectetur
                                    </p>
                                    <h4>

                                    <a class = "inline" href = "callto:+8801680531352">
                                    <strong>
                                    <i class = "fa fa-phone">
                                    </i>
                                    88 01680 531352
                                    </strong>
                                    </a>
                                    </h4>
                                    <h4>
                                    <a class = "inline" href = "mailto:help@tshopweb.com">
                                    <i class = "fa fa-envelope-o">
                                    </i>
                                    help@tshopweb.com
                                    </a>
                                    </h4>
                                    </li>
                                    </ul>
                                    </div>

                                    <div class = "col-lg-2  col-md-2 col-sm-4 col-xs-6">
                                    <h3> Shop </h3>
                                    <ul>
                                    <li> <a href = "index.html"> Home </a> </li>
                                    <li> <a href = "category.html"> Category </a> </li>
                                    <li> <a href = "sub-category.html"> Sub Category </a> </li>

                                    </ul>
                                    </div>

                                    <div class = "col-lg-2  col-md-2 col-sm-4 col-xs-6">
                                    <h3>
                                    Information
                                    </h3>
                                    <ul>
                                    <li> <a href = "product-details.html"> Product Details </a> </li>
                                    <li> <a href = "product-details-style2.html"> Product Details Version 2 </a> </li>
                                    <li> <a href = "cart.html"> Cart </a> </li>
                                    <li> <a href = "about-us.html"> About us </a> </li>
                                    <li> <a href = "about-us-2.html">
                                    About us 2
                                    </a>

                                    </li>
                                    <li> <a href = "contact-us.html">
                                    Contact us
                                    </a>

                                    </li>
                                    <li> <a href = "contact-us-2.html">
                                    Contact us 2
                                    </a>

                                    </li>
                                    <li> <a href = "terms-conditions.html">
                                    Terms &amp;
                                    Conditions
                                    </a>

                                    </li>

                                    </ul>
                                    </div>

                                    <div class = "col-lg-2  col-md-2 col-sm-4 col-xs-6">
                                    <h3>
                                    My Account
                                    </h3>
                                    <ul>
                                    <li> <a href = "account-1.html">
                                    Account Login
                                    </a>

                                    </li>
                                    <li> <a href = "account.html">
                                    My Account
                                    </a>

                                    </li>
                                    <li> <a href = "my-address.html">
                                    My Address
                                    </a>

                                    </li>
                                    <li> <a href = "wishlist.html">
                                    Wisth list
                                    </a>

                                    </li>
                                    <li> <a href = "order-list.html">
                                    Order list
                                    </a>

                                    </li>

                                    </ul>
                                    </div>

                                    <div class = "col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                                    <h3>
                                    Stay in touch
                                    </h3>
                                    <ul>
                                    <li>
                                    <div class = "input-append newsLatterBox text-center">
                                    <input type = "text" class = "full text-center" placeholder = "Email ">
                                    <button class = "btn  bg-gray" type = "button">
                                    Subscribe
                                    <i class = "fa fa-long-arrow-right">

                                    </i>
                                    </button>
                                    </div>
                                    </li>
                                    </ul>
                                    <ul class = "social">
                                    <li> <a href = "http://facebook.com">
                                    <i class = " fa fa-facebook">
                                    &nbsp;
                                    </i>
                                    </a>
                                    </li>
                                    <li> <a href = "http://twitter.com">
                                    <i class = "fa fa-twitter">
                                    &nbsp;
                                    </i>
                                    </a>
                                    </li>
                                    <li> <a href = "https://plus.google.com">
                                    <i class = "fa fa-google-plus">
                                    &nbsp;
                                    </i>
                                    </a>
                                    </li>
                                    <li> <a href = "http://youtube.com">
                                    <i class = "fa fa-pinterest">
                                    &nbsp;
                                    </i>
                                    </a>
                                    </li>
                                    <li> <a href = "http://youtube.com">
                                    <i class = "fa fa-youtube">
                                    &nbsp;
                                    </i>
                                    </a>
                                    </li>
                                    </ul>
                                    </div>

                                    </div><!--/.row-->
                                    </div><!--/.container-->
                                    </div><!--/.footer-->

                                    <div class = "footer-bottom">

                                    <div class = "container">
                                    <p class = "pull-left">
                                    &copy;
                                    TSHOP 2014. All right reserved.
                                    </p>
                                    <div class = "pull-right paymentMethodImg">

                                    <img height = "30" class = "pull-right" src = "images/site/payment/master_card.png" alt = "img" >
                                    <img height = "30" class = "pull-right" src = "images/site/payment/paypal.png" alt = "img" >
                                    <img height = "30" class = "pull-right" src = "images/site/payment/american_express_card.png" alt = "img" >
                                    <img height = "30" class = "pull-right" src = "images/site/payment/discover_network_card.png" alt = "img" >
                                    <img height = "30" class = "pull-right" src = "images/site/payment/google_wallet.png" alt = "img" >
                                    </div>


                                    </div>

                                    </div><!--/.footer-bottom-->
                                    </footer>

                                    <!--Le javascript
                                    ================================================== -->

                                    <!--Placed at the end of the document so the pages load faster -->
                                    <script type = "text/javascript" src = "assets/js/jquery/1.8.3/jquery.js"></script>
                                <script src="assets/bootstrap/js/bootstrap.min.js"></script>

                                <!-- include  parallax plugin -->
                                <script type="text/javascript"  src="assets/js/jquery.parallax-1.1.js"></script>

                                <!-- optionally include helper plugins -->
                                <script type="text/javascript"  src="assets/js/helper-plugins/jquery.mousewheel.min.js"></script>

                                <!-- include mCustomScrollbar plugin //Custom Scrollbar  --> 
                                <script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.js"></script> 

                                <!-- include carousel slider plugin  -->
                                <script src="assets/js/owl.carousel.min.js"></script>

                                <!-- jQuery minimalect // custom select   -->
                                <script src="assets/js/jquery.minimalect.min.js"></script>

                                <!-- include touchspin.js // touch friendly input spinner component   --> 
                                <script src="assets/js/bootstrap.touchspin.js"></script> 

                                <!-- include custom script for site  -->
                                <script src="assets/js/script.js"></script>

                                </body>
                                </html>



