<script>
$( document ).ready(function() {
//  alert("teste");
});

function mudaPagina(id)
{
    //pega o id da página atual e esconde
    var paginaAtual = $("#paginaAtual").val();
    var escondeId = "pagina" + paginaAtual;
    $("#" + escondeId).hide();
    $("#idPagina" + paginaAtual).removeClass('active');
    
    //atribui ao novo id atual e mostra na tela a pagina
    var mostraId = "pagina" + id;
    $("#" + mostraId).show();
    $("#paginaAtual").val(id);
    $("#idPagina" + id).addClass('active');

    window.scrollTo(0,0);
}


function mudaPaginaProximo()
{
    var ultimaPagina = $("#ultimaPagina").val();
    var paginaAtual = $("#paginaAtual").val();

    if(paginaAtual != ultimaPagina)
    {
        mudaPagina(paginaAtual )   
    }    
        
    
}
</script>
<?php
//pega o nome da categoria pra formar a url 
foreach ($prod->result() as $pro) {
    $cat_codigo = $pro->cat_codigo;
    $pro_codigo = $pro->pro_codigo;
    $pro_nome = $pro->pro_nome;
}
foreach ($categorias->result() as $categoria) {
    if ($cat_codigo == $categoria->cat_codigo)
    {
        $cat_nome = $categoria->cat_nome;

    }
}

$pro_nome_url = strtr(
 
    $pro_nome,
 
    array (
 
      'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
      'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
      'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ð' => 'D', 'Ñ' => 'N',
      'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
      'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Ŕ' => 'R',
      'Þ' => 's', 'ß' => 'B', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
      'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
      'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
      'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
      'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y',
      'þ' => 'b', 'ÿ' => 'y', 'ŕ' => 'r'
    )
);

//$pro_nome_url =  preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $pro_nome ) );
$urlImg = "assets/img/img-itens/" . $cat_nome . "/" . $pro_nome_url;
$urlCarrinho = "index.php/site/index/addAoCarrinho"
?> <!-- prefixo da URL do Layout -->
<!DOCTYPE html>
<html lang="en">
<!-- /.Fixed navbar  --><div class="container main-container headerOffset"> 

    <!-- Main component call to action -->

<!--    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li> <a href="index.html">Home</a> </li>
                <li> <a href="category.html">WOMEN COLLECTION</a> </li>
                <li class="active">TSHIRT  </li>
            </ul>
        </div>
    </div>   /.row   -->

    <div class="row">

        <!--left column-->

        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="panel-group" id="accordionNo">
                <!--Category--> 
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse"  href="#collapseCategory" class="collapseWill"> 
                                <span class="pull-left"> <i class="fa fa-caret-right"></i></span> Categorias
                            </a> 
                        </h4>
                    </div>

                    <div id="collapseCategory" class="panel-collapse collapse in">
                        <div class="panel-body">
<?php
echo "<ul class='nav nav-pills nav-stacked tree'>";
foreach ($categorias->result() as $categoria) {
    if($categoria->cat_status == 1)
    {
    if($cat_codigo == $categoria->cat_codigo)
    {
        echo "<li class='active dropdown-tree open-tree' > <a  class='dropdown-tree-a' > " . $categoria->cat_nome . "</a>";
    }
    else{
        echo "<li class='active dropdown-tree' > <a  class='dropdown-tree-a' > " . $categoria->cat_nome . "</a>";
    }
    echo "<ul class='category-level-2 dropdown-menu-tree'>";
    foreach ($produtos->result() as $produto) {
        if ($produto->cat_codigo == $categoria->cat_codigo && $produto->pro_status == 1) {
            echo "<li> <a  href='" . base_url() . "index.php/site/index/produto/?pro_codigo=" . $produto->pro_codigo . "'>" . $produto->pro_nome . "</a> </li>";
        }
    }
    echo "</ul>";
    echo "</li>";
    }
}
echo "</ul>";
?>
                            
                        </div>
                    </div>
                </div> <!--/Category menu end--> 
            </div>
        </div>


        <!--right column-->
        <div class="col-lg-9 col-md-9 col-sm-12">

            <div class="w100 clearfix category-top">
                <h2>
<?php
foreach ($prod->result() as $pro) {
    echo $pro->pro_nome;
}
?>
                </h2>
                <!--<div class="categoryImage"> <img src="images/site/subcategory.jpg" class="img-responsive" alt="img"> </div>-->
            </div><!--/.category-top-->

            <div class="w100 productFilter clearfix">
<!--                <p class="pull-left"> Showing <strong>12</strong> products </p>
                <div class="pull-right ">
                    <div class="change-order pull-right">
                        <select class="form-control" name="orderby">
                            <option selected="selected" >Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>
                    <div class="change-view pull-right"> 
                        <a href="#" title="Grid" class="grid-view"> <i class="fa fa-th-large"></i> </a> 
                        <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a> </div>
                </div>-->
            </div> <!--/.productFilter-->

            <div class="row  categoryProduct xsResponse clearfix">
                <input type="hidden" id="paginaAtual" value="1">
                <?php
                    $countProdutos = 0;
                    foreach($itens->result() as $item)
                    {
                        
                        
                        if($item->pro_codigo == $pro_codigo && $item->item_status == 1)
                        {
                            //faz paginação
                            if(($countProdutos % 9) == 0 || $countProdutos == 0)
                            {
//                                echo $countProdutos;
                                if($countProdutos == 0)
                                {
                                    echo "<div id='pagina" . 1 . "'>"; //Div da paginação
                                }
                                else
                                {
                                    echo "<div style='display: none;' id='pagina" . $countProdutos/9 . "'>"; //Div da paginação
                                }
                            }
                          echo "<div class='item col-sm-4 col-lg-4 col-md-4 col-xs-6'>";
                          echo "<div class='product'>";
//                          echo "<a data-placement='left' data-original-title='Add to Wishlist' data-toggle='tooltip' class='add-fav tooltipHere'>";
//                          echo "<i class='glyphicon glyphicon-heart'></i>";
//                          echo "</a>";
                          echo "<div class='image'> <a><img class='img-responsive' alt='img' src='" . base_url() . $urlImg . "/" . $item->item_img . "'</a>";
                          if($item->item_novo == 1)
                          {
                            echo "<div class='promotion'> <span class='new-product'> NOVO</span> </div>";
                          }
                          echo "</div>";
                          echo "<div class='description'>";
                          echo "<h4>" . $item->item_nome . "</h4>";
                          echo "<div class='grid-description'>";
                          echo "" . $item->item_descricao;
                          echo "</div>";
//                          echo "<div class='list-description'>";
//                          echo "<p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent sit amet placerat elit. </p>";
//                          echo "</div>";
                          foreach($tipo_medida->result() as $medida)
                          {
                              if($item->tpmed_codigo == $medida->tpmed_codigo)
                              {
                                $med = $medida->tpmed_nome;
                              }
                          }
                          echo "<span class='size'>" . $item->item_medida . " " . $med . "</span>";
                          echo "</div>";
                          if($item->item_preco_antigo != null && $item->item_preco_antigo != 0)
                          {
                            echo "<div class='price'> <span> De: R$" . number_format($item->item_preco_antigo, 2, ',', '.') . "</span> </div>";
                            echo "<div class='price'> <span> Por: R$" . number_format($item->item_preco_atual, 2, ',', '.') . "</span> </div>";
                          }
                          else
                          {
                            echo "<div class='price'> <span> &nbsp</span> </div>";   
                            echo "<div class='price'> <span> R$" . number_format($item->item_preco_atual, 2, ',', '.') . "</span> </div>";
                          }
                              
                          echo "<div class='action-control'> <a href='" . base_url() . $urlCarrinho . "/?item_codigo=". $item->item_codigo . 
                                  "&item_preco=" . $item->item_preco_atual . 
                                  "&item_nome=" . $item->item_nome .
                                  "&item_img=" . base_url() . $urlImg . "/" . $item->item_img . "' "
                                  . "class='btn btn-primary'> <span class='add2cart'><i class='glyphicon glyphicon-shopping-cart'> </i> Comprar </span> </a> </div>";
                          echo "</div>";
                          echo "</div>";
                          if(($countProdutos + 1) % 9 == 0)
                          {
                                echo "</div>"; //fecha div da página de produtos
//                                echo $countProdutos;
                          }
                          $countProdutos++;
                        }
                        
                        
                    }
                    //se a ultima pagina ficou sem 9 elementos certinho ele finaliza
                    if($countProdutos % 9 != 0)
                    {
                        echo "</div>";
                    }
                    ?>
                
                <!--/.item--> 
            </div> <!--/.categoryProduct || product content end-->

            <div class="w100 categoryFooter">
                <div class="pagination pull-left no-margin-top">
                    <ul class="pagination no-margin-top">
                        
                        <?php
                            
                            echo "<li id='paginaAnterior'> <a href='#'>« Anterior</a></li>";
                            
                            for($i = 1 ; $i < $countProdutos - 1; $i++){
                                if($i % 9 == 0)
                                {
                                    if($i / 9 == 1)
                                    {
                                        echo "<li class='active' id='idPagina". $i/9 ."'><a  onclick='javascript:mudaPagina(" . $i / 9 . ")'>" . $i / 9 . "</a></li>";
                                    }
                                    else
                                    {
                                        echo "<li id='idPagina". $i/9 ."'><a  onclick='javascript:mudaPagina(" . $i / 9 . ")'>" . $i / 9 . "</a></li>";
                                    }
                                }
                            }
                            
                            echo "<li id='paginaProximo'> <a onclick='javascript:mudaPaginaProximo();'>Próximo »</a></li>";
                            echo "<input type='hidden' id='ultimaPagina' value='" . $countProdutos/9 . "'>";
                        ?>
                        
                    </ul>
                </div>
                <div class="pull-right pull-right  col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <!--<p>Mostrando 9 de <?php echo $countProdutos; ?></p>-->
                </div>
            </div>
        </div> <!--/.categoryFooter-->
    </div><!--/right column end-->
</div><!-- /.row  --> 
</div>
<!-- /main container -->

<div class="gap"> </div>


<!-- JAVASCRIPT ANTIGO
 Le javascript
================================================== 

 Placed at the end of the document so the pages load faster 
<script type="text/javascript" src="assets/js/jquery/1.8.3/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

 include  parallax plugin 
<script type="text/javascript"  src="assets/js/jquery.parallax-1.1.js"></script>

 optionally include helper plugins 
<script type="text/javascript"  src="assets/js/helper-plugins/jquery.mousewheel.min.js"></script>

 include mCustomScrollbar plugin //Custom Scrollbar   
<script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.js"></script> 

 include carousel slider plugin  
<script src="assets/js/owl.carousel.min.js"></script>

 include smoothproducts // product zoom plugin  
<script type="text/javascript" src="assets/js/smoothproducts.min.js"></script>

 jQuery minimalect // custom select   
<script src="assets/js/jquery.minimalect.min.js"></script>

 include touchspin.js // touch friendly input spinner component    
<script src="assets/js/bootstrap.touchspin.js"></script> 

 include custom script for site  
<script src="assets/js/script.js"></script>-->


<!-- Le javascript
================================================== --> 

<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/js/jquery/1.8.3/jquery.js"></script> 
<script src="<?php echo base_url();?>assets/site/assets/bootstrap/js/bootstrap.min.js"></script> 

<!-- include jqueryCycle plugin --> 
<script src="<?php echo base_url();?>assets/site/assets/js/jquery.cycle2.min.js"></script> 

<!-- include easing plugin --> 
<script src="<?php echo base_url();?>assets/site/assets/js/jquery.easing.1.3.js"></script> 

<!-- include  parallax plugin --> 
<script type="text/javascript"  src="<?php echo base_url();?>assets/site/assets/js/jquery.parallax-1.1.js"></script> 

<!-- optionally include helper plugins --> 
<script type="text/javascript"  src="<?php echo base_url();?>assets/site/assets/js/helper-plugins/jquery.mousewheel.min.js"></script> 

<!-- include mCustomScrollbar plugin //Custom Scrollbar  --> 

<script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/js/jquery.mCustomScrollbar.js"></script> 

<!-- include checkRadio plugin //Custom check & Radio  --> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site/assets/js/ion-checkRadio/ion.checkRadio.min.js"></script> 

<!-- include grid.js // for equal Div height  --> 
<script src="<?php echo base_url();?>assets/site/assets/js/grids.js"></script> 

<!-- include carousel slider plugin  --> 
<script src="<?php echo base_url();?>assets/site/assets/js/owl.carousel.min.js"></script> 

<!-- jQuery minimalect // custom select   --> 
<script src="<?php echo base_url();?>assets/site/assets/js/jquery.minimalect.min.js"></script> 

<!-- include touchspin.js // touch friendly input spinner component   --> 
<script src="<?php echo base_url();?>assets/site/assets/js/bootstrap.touchspin.js"></script> 

<!-- include custom script for only homepage  --> 
<script src="<?php echo base_url();?>assets/site/assets/js/home.js"></script> 
<!-- include custom script for site  --> 
<script src="<?php echo base_url();?>assets/site/assets/js/script.js"></script> 

<!-- styles needed by footable  NECESSÁRIO EM minhas-compras -->
<link href="<?php echo base_url();?>assets/site/assets/css/footable-0.1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/site/assets/css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />

<script>

</script>

</body>
</html>

