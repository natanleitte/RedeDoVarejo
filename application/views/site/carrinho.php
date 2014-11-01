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
                                    echo "<div class = 'price'> <span>R$ ". number_format($item['price'], 2, ',', '.') ."</span></div>";
                                    echo "</div></td>";
                                    $attributes = array('id' => 'removeDoCarrinhoForm');
                                    echo form_open('index.php/site/index/removeDoCarrinho', $attributes); //abre form pra remover do Carrinho 
                                    echo "<input type='hidden' name='rowid' value='" . $item['rowid'] . "'/>";
                                    echo "<td class = 'delete'><a onclick='removeDoCarrinho()' title = 'Delete'> <i class = 'glyphicon glyphicon-trash fa-2x'></i></a></td>";
                                    echo form_close(); //fecha form pra remover do Carrinho 
                                    echo "<td ><input class = 'quanitySniper' type = 'text' value = '" . $item['qty'] . "' name = 'quanitySniper'></td>";
                                    echo "<td >0</td>";
                                    echo "<td class = 'price'> R$ " . number_format($item['price'] * $item['qty'], 2, ',', '.') . "</td>";
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
                                    <div class = "pull-left"> <a onclick="history.go(-1)" class = "btn btn-default"> <i class = "fa fa-arrow-left"></i> &nbsp;
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
                                    <td class = "price" > R$ <?php echo number_format($totalCompra, 2, ',', '.') ?></td>
                                    </tr>
<!--                                    <tr style = "">
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
                                    </tr>-->
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

