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
                    <h1 class="uppercase xlarge">QUINTA VERDE</h1>
                    <h3 class="hidden-xs"> As melhores frutas e verduras da região.</h3>
                  </div>
                  <a class="btn btn-danger btn-lg">CLIQUE E CONFIRA!<span class="arrowUnicode">►</span></a>
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
                    <h3 class="hidden-xs">  Pediu CHEGOU!  </h3>
                    
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
                  <h3 class="price "> Entregamos em até <strong>2 horas</strong></h3>
                  <p class="hidden-xs">Nossa meta é a satisfação do cliente, por isto nos dedicamos em oferecer um ótimo serviço de entrega. </p>
                  <a href="category.html" class="btn btn-primary">CLIQUE E CONFIRA! <span class="arrowUnicode">►</span></a> </div>
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
                    foreach($itens->result() as $item)
                    {
                        if($item->pro_codigo == $pro_codigo)
                        {
                          echo "<div class='item'>";
                          echo "<div class='product'>";
                          echo "<a data-placement='left' data-original-title='Add to Wishlist' data-toggle='tooltip' class='add-fav tooltipHere'>";
                          echo "<i class='glyphicon glyphicon-heart'></i>";
                          echo "</a>";
                          echo "<div class='image'> <a href='product-details.html'><img class='img-responsive' alt='img' src='" . base_url() . $urlImg . "/" . $item->item_img . ".jpg" . "'</a>";
                          if($item->item_novo == 1)
                          {
                            echo "<div class='promotion'> <span class='new-product'> NOVO</span> </div>";
                          }
                          echo "</div>";
                          echo "<div class='description'>";
                          echo "<h4><a href='product-details.html'>" . $item->item_nome . "</a></h4>";
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
                            echo "<div class='price'> <span> De: R$" . $item->item_preco_antigo . "</span> </div>";
                            echo "<div class='price'> <span> Por: R$" . $item->item_preco_atual . "</span> </div>";
                          }
                          else
                          {
                            echo "<div class='price'> <span> R$" . $item->item_preco_atual . "</span> </div>";
                          }
                              
                          echo "<div class='action-control'> <a href='" . base_url() . $urlCarrinho . "/?item_codigo=". $item->item_codigo . 
                                  "&item_preco=" . $item->item_preco_atual . 
                                  "&item_nome=" . $item->item_nome .
                                  "&item_img=" . base_url() . $urlImg . "/" . $item->item_img . ".jpg" . "' "
                                  . "class='btn btn-primary'> <span class='add2cart'><i class='glyphicon glyphicon-shopping-cart'> </i> Comprar </span> </a> </div>";
                          echo "</div>";
                          echo "</div>";

                        }
                    }
                    ?>
        
      <div class="item">
        <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/30.jpg" alt="img" class="img-responsive"></a>
            <div class="promotion"> <span class="discount">15% OFF</span> </div>
          </div>
          <div class="description">
            <h4><a href="product-details.html">luptatum zzril delenit</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <span class="size">XL / XXL / S </span> </div>
          <div class="price"> <span>$25</span> </div>
          <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
        </div>
      </div>
      <div class="item">
        <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/36.jpg" alt="img" class="img-responsive"></a>
            <div class="promotion"> <span class="new-product"> NEW</span> </div>
          </div>
          <div class="description">
            <h4><a href="product-details.html">eleifend option </a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <span class="size">XL / XXL / S </span> </div>
          <div class="price"> <span>$25</span> </div>
          <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
        </div>
      </div>
      <div class="item">
        <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/9.jpg" alt="img" class="img-responsive"></a> </div>
          <div class="description">
            <h4><a href="product-details.html">mutationem consuetudium </a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <span class="size">XL / XXL / S </span> </div>
          <div class="price"> <span>$25</span> </div>
          <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
        </div>
      </div>
      <div class="item">
        <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/12.jpg" alt="img" class="img-responsive"></a> </div>
          <div class="description">
            <h4><a href="product-details.html">sequitur mutationem </a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <span class="size">XL / XXL / S </span> </div>
          <div class="price"> <span>$25</span> </div>
          <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
        </div>
      </div>
      <div class="item">
        <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/13.jpg" alt="img" class="img-responsive"></a> </div>
          <div class="description">
            <h4><a href="product-details.html">consuetudium lectorum.</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <span class="size">XL / XXL / S </span> </div>
          <div class="price"> <span>$25</span> </div>
          <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
        </div>
      </div>
      <div class="item">
        <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/21.jpg" alt="img" class="img-responsive"></a> </div>
          <div class="description">
            <h4><a href="product-details.html">parum claram</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <span class="size">XL / XXL / S </span> </div>
          <div class="price"> <span>$25</span> </div>
          <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
        </div>
      </div>
      <div class="item">
        <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/24.jpg" alt="img" class="img-responsive"></a> </div>
          <div class="description">
            <h4><a href="product-details.html">duis dolore </a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <span class="size">XL / XXL / S </span> </div>
          <div class="price"> <span>$25</span> </div>
          <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
        </div>
      </div>
      <div class="item">
        <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/15.jpg" alt="img" class="img-responsive"></a></div>
          <div class="description">
            <h4><a href="product-details.html">feugait nulla facilisi</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <span class="size">XL / XXL / S </span> </div>
          <div class="price"> <span>$25</span> </div>
          <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
        </div>
      </div>
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
    <h3 class="section-title style2 text-center"><span>FEATURES PRODUCT</span></h3>
    <div class="container">
      <div class="row xsResponse">
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
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
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/31.jpg" alt="img" class="img-responsive"></a>
              <div class="promotion"> <span class="discount">15% OFF</span> </div>
            </div>
            <div class="description">
              <h4><a href="product-details.html">ullamcorper suscipit lobortis </a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/34.jpg" alt="img" class="img-responsive"></a>
              <div class="promotion"> <span class="new-product"> NEW</span> </div>
            </div>
            <div class="description">
              <h4><a href="product-details.html">demonstraverunt lectores </a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/12.jpg" alt="img" class="img-responsive"></a> </div>
            <div class="description">
              <h4><a href="product-details.html">humanitatis per</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/33.jpg" alt="img" class="img-responsive"></a> </div>
            <div class="description">
              <h4><a href="product-details.html">Eodem modo typi</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/10.jpg" alt="img" class="img-responsive"></a> </div>
            <div class="description">
              <h4><a href="product-details.html">sequitur mutationem </a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/37.jpg" alt="img" class="img-responsive"></a> </div>
            <div class="description">
              <h4><a href="product-details.html">consuetudium lectorum.</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/35.jpg" alt="img" class="img-responsive"></a> </div>
            <div class="description">
              <h4><a href="product-details.html">parum claram</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> <span class="old-price">$75</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/13.jpg" alt="img" class="img-responsive"></a> </div>
            <div class="description">
              <h4><a href="product-details.html">duis dolore </a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/21.jpg" alt="img" class="img-responsive"></a>
              <div class="promotion"> <span class="new-product"> NEW</span> <span class="discount">15% OFF</span> </div>
            </div>
            <div class="description">
              <h4><a href="product-details.html">aliquam erat volutpat</a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/14.jpg" alt="img" class="img-responsive"></a>
              <div class="promotion"> <span class="discount">15% OFF</span> </div>
            </div>
            <div class="description">
              <h4><a href="product-details.html">ullamcorper suscipit lobortis </a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item-->
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product">
          <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"  data-placement="left">
          <i class="glyphicon glyphicon-heart"></i>
          </a>
          
            <div class="image"> <a href="product-details.html"><img src="images/product/17.jpg" alt="img" class="img-responsive"></a>
              <div class="promotion"> <span class="new-product"> NEW</span> </div>
            </div>
            <div class="description">
              <h4><a href="product-details.html">demonstraverunt lectores </a></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <span class="size">XL / XXL / S </span> </div>
            <div class="price"> <span>$25</span> </div>
            <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
          </div>
        </div>
        <!--/.item--> 
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="load-more-block text-center"> <a class="btn btn-thin" href="#"> <i class="fa fa-plus-sign">+</i> load more products</a> </div>
      </div>
    </div>
    <!--/.container--> 
  </div>
  <!--/.featuredPostContainer-->
  
  <hr class="no-margin-top">
  <div class="width100 section-block ">
    <div class="row featureImg">
      <div class="col-md-3 col-sm-3 col-xs-6"> <a href="category.html"><img src="images/site/new-collection-1.jpg" class="img-responsive" alt="img" ></a> </div>
      <div class="col-md-3 col-sm-3 col-xs-6"> <a href="category.html"><img src="images/site/new-collection-2.jpg" class="img-responsive" alt="img" ></a> </div>
      <div class="col-md-3 col-sm-3 col-xs-6"> <a href="category.html"><img src="images/site/new-collection-3.jpg" class="img-responsive" alt="img" ></a> </div>
      <div class="col-md-3 col-sm-3 col-xs-6"> <a href="category.html"><img src="images/site/new-collection-4.jpg" class="img-responsive" alt="img"></a> </div>
    </div>
    <!--/.row--> 
  </div>
  <!--/.section-block-->
  
  <div class="width100 section-block">
    <h3 class="section-title"><span> BRAND</span> <a id="nextBrand" class="link pull-right carousel-nav"> <i class="fa fa-angle-right"></i></a> <a id="prevBrand" class="link pull-right carousel-nav"> <i class="fa fa-angle-left"></i> </a> </h3>
    <div class="row">
      <div class="col-lg-12">
        <ul class="no-margin brand-carousel owl-carousel owl-theme">
          <li> <a ><img src="images/brand/1.gif" alt="img" ></a></li>
          <li><img src="images/brand/2.png" alt="img" ></li>
          <li><img src="images/brand/3.png" alt="img" ></li>
          <li><img src="images/brand/4.png" alt="img" ></li>
          <li><img src="images/brand/5.png" alt="img" ></li>
          <li><img src="images/brand/6.png" alt="img" ></li>
          <li><img src="images/brand/7.png" alt="img" ></li>
          <li><img src="images/brand/8.png" alt="img" ></li>
          <li><img src="images/brand/1.gif" alt="img" ></li>
          <li><img src="images/brand/2.png" alt="img" ></li>
          <li><img src="images/brand/3.png" alt="img" ></li>
          <li><img src="images/brand/4.png" alt="img" ></li>
          <li><img src="images/brand/5.png" alt="img" ></li>
          <li><img src="images/brand/6.png" alt="img" ></li>
          <li><img src="images/brand/7.png" alt="img" ></li>
          <li><img src="images/brand/8.png" alt="img" ></li>
        </ul>
      </div>
    </div>
    <!--/.row--> 
  </div>
  <!--/.section-block--> 
  
</div>
<!--main-container-->

<div class="parallax-section parallax-image-2">
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
</div>
<!--/.parallax-section-->