<?php
$urlImg = "assets/img/img-itens/";
$urlCarrinho = "index.php/site/index/addAoCarrinho" 
?>
<div class="banner">
  <div class="full-container">
    <div class="slider-content">
      <ul id="pager2" class="container">
      </ul>
      <!-- prev/next links --> 
      
      <span class="prevControl sliderControl"> <i class="fa fa-angle-left fa-3x "></i></span> <span class="nextControl sliderControl"> <i class="fa fa-angle-right fa-3x "></i></span>
      <div class="slider slider-v1" 
      data-cycle-swipe=true
      data-cycle-prev=".prevControl"
      data-cycle-next=".nextControl" data-cycle-loader="wait">
      
      <div class="slider-item slider-item-img1">    
          <img src="<?php echo base_url();?>assets/site/images/slider/slider0.jpg" class="img-responsive parallaximg sliderImg" alt="img">
      </div>
      
        <div class="slider-item slider-item-img3 ">
          <div class="sliderInfo">
            <div class="container">
              <div class="col-lg-5 col-md-4 col-sm-6 col-xs-8   pull-left sliderText white hidden-xs">
                <div class="inner">
                  <div class=" ">
                    <h1 class="uppercase xlarge">QUALIDADE</h1>
                    <h3 class="hidden-xs"> Produtos selecionados com carinho.</h3>
                  </div>
                  <a class="btn btn-danger btn-lg" href="#">CLIQUE E CONFIRA!<span class="arrowUnicode">►</span></a>
                </div>
              </div>
            </div>
          </div>
          <img src="<?php echo base_url();?>assets/site/images/slider/slider1.jpg" class="img-responsive parallaximg sliderImg" alt="img">
        </div>
        <!--/.slider-item-->
        
        <div class="slider-item slider-item-img3 ">
          <div class="sliderInfo">
            <div class="container">
              <div class="col-lg-5 col-md-4 col-sm-6 col-xs-8   pull-left sliderText white hidden-xs">
                <div class="inner">
                  <div class=" ">
                    <h1 class="uppercase xlarge"> O MELHOR PREÇO!</h1>
                    <h3 class="hidden-xs">  clicou, comprou, CHEGOU!  </h3>
                    
                  </div>
                  <a class="btn btn-danger btn-lg">CLIQUE E CONFIRA!<span class="arrowUnicode">►</span></a> </div>
              </div>
            </div>
          </div>
          <img src="<?php echo base_url();?>assets/site/images/slider/slider3.jpg" class="img-responsive parallaximg sliderImg" alt="img">
        </div>
        <!--/.slider-item-->
        
        <div class="slider-item slider-item-img3 ">
          <div class="sliderInfo">
            <div class="container">
              <div class="col-lg-5 col-md-4 col-sm-6 col-xs-8   pull-right sliderText white hidden-xs">
                <div class="inner">
                    <h1><strong>ENTREGA EM DOMICÍLIO</strong></h1>
                  <h3 class="price "> Entrega <strong>Programada</strong></h3>
                  <p class="hidden-xs" >Com a entrega programada, você escolhe a melhor hora de receber sua compra.</p>
                  <a class="btn btn-primary" href="<?php echo base_url();?>index.php/site/index/entrega">CLIQUE E CONFIRA! <span class="arrowUnicode">►</span></a> </div>
              </div>
            </div>
          </div>
          <img src="<?php echo base_url();?>assets/site/images/slider/slider4.jpg" class="img-responsive parallaximg sliderImg"  alt="img"> </div>
        <!--/.slider-item-->
      </div>
      <!--/.slider slider-v1--> 
    </div>
    <!--/.slider-content--> 
  </div>
  <!--/.full-container--> 
</div>
<!--/.banner style1-->

<div class="container main-container"> 
  
  <!-- Main component call to action -->
  
  <div class="row featuredPostContainer globalPadding style2">
    <h3 class="section-title style2 text-center"><span>Novidades</span></h3>
    <div id="productslider" class="owl-carousel owl-theme">
      
      <?php
                    $count = 0;
                    foreach($itens->result() as $item)
                    {
                        foreach ($produtos->result() as $pro) {
                           if($pro->pro_codigo == $item->pro_codigo)
                           {
                              $cat_codigo = $pro->cat_codigo;
                              $pro_nome = $pro->pro_nome;
                           }
                          }
                          foreach ($categorias->result() as $categoria) {
                            if ($cat_codigo == $categoria->cat_codigo)
                            {
                                $cat_nome = $categoria->cat_nome;
                            }
                           }
                           if($item->item_novo == 1)
                          {
                               //*** TIRA ACENTOS DO NOME DOS PRODUTOS ***//
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
                            //*** FIM - TIRA ACENTOS DO NOME DOS PRODUTOS ***//
                               
                          echo "<div class='item'>";
                          echo "<div class='product'>";
                          echo "<a data-placement='left' data-original-title='Add to Wishlist' data-toggle='tooltip' class='add-fav tooltipHere'>";
                          echo "<i class='glyphicon glyphicon-heart'></i>";
                          echo "</a>";
                          echo "<div class='image'> <a href='product-details.html'><img class='img-responsive' alt='img' src='" . base_url() . $urlImg . $cat_nome . "/" . $pro_nome_url . "/" . $item->item_img . "'</a>";
                          
                            echo "<div class='promotion'> <span class='new-product'> NOVO</span> </div>";
                          
                          echo "</div>";
                          echo "<div class='description'>";
                          echo "<h4><a>" . $item->item_nome . "</a></h4>";
                          echo "<div class='grid-description'>";
                          echo "" . $item->item_descricao;
                          echo "</div>";
                          foreach($tipo_medida->result() as $medida)
                          {
                              if($item->tpmed_codigo == $medida->tpmed_codigo)
                              {
                                $med = $medida->tpmed_nome;
                              }
                          }
                          echo "<span class='size'>" . $item->item_medida . " " . $med . "</span>";
//                          echo "<div class='grid-description'>";
//                          echo "<p>" . $item->item_descricao . "</p>";
//                          echo "</div>";
//                          echo "<div class='list-description'>";
//                          echo "<p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent sit amet placerat elit. </p>";
//                          echo "</div>";
//                          echo "<span class='size'>XL / XXL / S </span>";
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
                                  "&item_img=" . base_url() . $urlImg . $cat_nome . "/" . $pro_nome_url . "/" . $item->item_img . ".jpg" . "'"
                                  . "class='btn btn-primary'> <span class='add2cart'><i class='glyphicon glyphicon-shopping-cart'> </i> Comprar </span> </a> </div>";
                          echo "</div>";
                          echo "</div>";
                          }
                          if($count == 15)
                          {
                              break;
                          }
                          $count++;
                    }
                    ?>
    </div>
    <!--/.productslider--> 
    
  </div>
  <!--/.featuredPostContainer--> 
</div>
<!-- /main container -->

<div class="parallax-section parallax-image-1">
  <div class="container">
    <div class="row ">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="parallax-content clearfix">
            <h1 class="parallaxPrce"> SUA COMPRA EM ATÉ <strong>2 Horas</strong> </h1>
          <h2 class="uppercase">ETENDA NOSSA FORMA DE ENTREGA </ br></h2>
          <div style="clear:both"></div>
          <a class="btn btn-discover "> <i class="glyphicon glyphicon-collapse"></i> CONFIRA</a> </div>
      </div>
    </div>
    <!--/.row--> 
  </div>
  <!--/.container--> 
</div>
<!--/.parallax-image-1-->

<div class="container main-container"> 
  
  <!-- Main component call to action -->
  
  <div class="morePost row featuredPostContainer style2 globalPaddingTop " >
    <h3 class="section-title style2 text-center"><span>PROMOÇÕES</span></h3>
    <div class="container">
      <div class="row xsResponse">
          
           <?php
                    foreach($itens->result() as $item)
                    {
                        foreach ($produtos->result() as $pro) {
                           if($pro->pro_codigo == $item->pro_codigo)
                           {
                              $cat_codigo = $pro->cat_codigo;
                              $pro_nome = $pro->pro_nome;
                           }
                          }
                          foreach ($categorias->result() as $categoria) {
                            if ($cat_codigo == $categoria->cat_codigo)
                            {
                                $cat_nome = $categoria->cat_nome;
                            }
                           }
                           if($item->item_preco_antigo != null && $item->item_preco_antigo != 0)
                          {
                               
                               //*** TIRA ACENTOS DO NOME DOS PRODUTOS ***//
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
                            //*** FIM - TIRA ACENTOS DO NOME DOS PRODUTOS ***//
                               
                          echo "<div class='item col-lg-3 col-md-3 col-sm-4 col-xs-6'>";
                          echo "<div class='product'>";
                          echo "<a data-placement='left' data-original-title='Add to Wishlist' data-toggle='tooltip' class='add-fav tooltipHere'>";
                          echo "<i class='glyphicon glyphicon-heart'></i>";
                          echo "</a>";
                          echo "<div class='image'> <a href='product-details.html'><img class='img-responsive' alt='img' src='" . base_url() . $urlImg . $cat_nome . "/" . $pro_nome_url . "/" . $item->item_img . "'</a>";
                          if($item->item_novo == 1)
                          {
                            echo "<div class='promotion'> <span class='new-product'> NOVO</span> </div>";
                          }
                          echo "</div>";
                          echo "<div class='description'>";
                          echo "<h4><a>" . $item->item_nome . "</a></h4>";
                          echo "<div class='grid-description'>";
                          echo "" . $item->item_descricao;
                          echo "</div>";
                          foreach($tipo_medida->result() as $medida)
                          {
                              if($item->tpmed_codigo == $medida->tpmed_codigo)
                              {
                                $med = $medida->tpmed_nome;
                              }
                          }
                          echo "<span class='size'>" . $item->item_medida . " " . $med . "</span>";
//                          echo "<div class='grid-description'>";
//                          echo "<p>" . $item->item_descricao . "</p>";
//                          echo "</div>";
//                          echo "<div class='list-description'>";
//                          echo "<p> Sed sed rutrum purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus lacus, iaculis in ante vitae, viverra hendrerit ante. Aliquam vel fermentum elit. Morbi rhoncus, neque in vulputate facilisis, leo tortor sollicitudin odio, quis pellentesque lorem nisi quis enim. In dolor mi, hendrerit at blandit vulputate, congue a purus. Sed eget turpis sit amet orci euismod accumsan. Praesent sit amet placerat elit. </p>";
//                          echo "</div>";
//                          echo "<span class='size'>XL / XXL / S </span>";
                          echo "</div>";
                          
                          if($item->item_preco_antigo != null)
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
                                 "&item_img=" . base_url() . $urlImg . $cat_nome . "/" . $pro_nome_url . "/" . $item->item_img .  "'"
                                  . "class='btn btn-primary'> <span class='add2cart'><i class='glyphicon glyphicon-shopping-cart'> </i> Comprar </span> </a> </div>";
                          echo "</div>";
                          echo "</div>";
                          }
                    }
                    ?>
          
<!--        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/30.jpg" alt="img" class="img-responsive"></a>
              <div class="promotion"> <span class="new-product"> NEW</span> <span class="discount">15% OFF</span> </div>
            </div>
            <div class="description">
              <h4><a href="product-details.html">aliquam erat volutpat</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> <span class="old-price">$75</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>-->
        <!--/.item-->
        <!--/.item--> 
          </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="load-more-block text-center"> <a class="btn btn-thin" href="#"> <i class="fa fa-plus-sign">+</i> Mais produtos</a> </div>
      </div>
    </div>
    <!--/.container--> 
  </div>
  <!--/.featuredPostContainer-->
  
  <hr class="no-margin-top">
  
    <!--/.row--> 
  </div>
  <!--/.section-block--> 
  
</div>
<!--main-container-->

<!--<div class="parallax-section parallax-image-2">
  <div class="w100 parallax-section-overley">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="parallax-content clearfix">
            <h1 class="xlarge"> Trusted Seller 500+ </h1>
            <h5 class="parallaxSubtitle"> Lorem ipsum dolor sit amet consectetuer </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>-->
<!--/.parallax-section-->