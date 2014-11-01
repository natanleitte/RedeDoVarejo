<!-- /.Fixed navbar  --><!-- /.navbar -->

<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="index.html">Home</a> </li>
        <li> <a href="cart.html">Cart</a> </li>
        <li class="active"> Checkout </li>
      </ul>
    </div>
  </div>
  
  <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Finalizar Compra</span></h1>
</div>

    <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar"> 

      <h4 class="caps"><a href="category.html"><i class="fa fa-chevron-left"></i> Continuar comprando </a></h4>
      </div>
</div>
  
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">
      <div class="row userInfo">
        
        <div class="col-xs-12 col-sm-12">
        
       <div class="w100 clearfix"> 
       
       
               <ul class="orderStep ">
                    <li> <a href="<?php echo base_url() . "index.php/site/index/finalizar_compra1" ?>">
                    <i class="fa fa-map-marker "></i>
                    <span> Endereço</span>
                    </a> </li>
                    <li class="active"><a href="<?php echo base_url() . "index.php/site/index/finalizar_compra2" ?>"><i class="fa fa-check-square "> </i><span>Ordem</span></a>  </li>
                    <li> <a href="<?php echo base_url() . "index.php/site/index/finalizar_compra3" ?>"><i class="fa fa-money  "> </i><span>Pagamento</span> </a>  </li>
                    
                    
                
                </ul><!--orderStep-->
        </div>
        
        
        <div class="w100 clearfix">
        
        
        	<div class="row userInfo">
                
                <div class="col-lg-12">
                    <h2 class="block-title-2"> Carrinho de compras </h2>
                </div>
                
            
            
            	<div class="col-xs-12 col-sm-12">
                      <div class="cartContent w100">
                            <table class="cartTable table-responsive" style="width:100%">
                                <tbody>

                                    <tr class="CartProduct cartTableHeader">
                                        <td style="width:15%"  > Produtos </td>
                                        <td style="width:40%"  >Detalhes</td>
                                        <th style="width:10%" >Preço Unit.</th>
                                        <td style="width:5%" >QNT</td>
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
                                    echo "<td class='delete'><div class='price '>" . $item['price'] ."</div></td>";
                                    echo "<td class='hidden-xs'>" . $item['qty'] ."</td>";
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
                      
                      <div class="w100 costDetails">
                        <div class="table-block" id="order-detail-content">
                          <table class="std table" id="cart-summary">
                            <tr >
                              <td > Total </td>
                              <td id="total-price" class="price">R$ <?php echo $totalCompra; ?> </td>
                            </tr>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--/costDetails-->
                      

          
          <!--/row-->
  
          
        </div>
                
                
                </div>
                
          
            
            
            
            </div><!--/row end-->
            
            
            
            <div class="cartFooter w100">
            <div class="box-footer">
              <div class="pull-left"> <a class="btn btn-default" href="checkout-4.html">
					<i class="fa fa-arrow-left"></i> &nbsp; Voltar</a> 
               </div>
               
               
               <div class="pull-right">
                <a href="<?php echo base_url() . "index.php/site/index/finalizar_compra3" ?>" class="btn btn-primary btn-small " > 
					Confirmar Ordem &nbsp; <i class="fa fa-check"></i>
                 </a>
              </div>
               
               
              
            </div>
          </div>
          <!--/ cartFooter --> 
    
        	
       
     
        
        
        
        
        
        </div>
          
          
          
                
        </div>
      </div>
      <!--/row end--> 
      
  
    <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar"> 
      
  <div class="w100 cartMiniTable">
                            <table id="cart-summary" class="std table">
                                    <tbody>
                                    <tr >
                                      <td>Total da compra</td>
                                      <td class="price" >R$ <?php echo $totalCompra ?></td>
                                    </tr>
                                    <tr  style="">
                                      <?php
                                        //calcula frete do bairro
                                        foreach($endereco->result() as $end )
                                        {
                                            $end_bairro = $end->end_bairro;
                                        }
                                        foreach($bairros->result() as $bairro)
                                        {
                                           if($bairro->bairro_codigo == $end_bairro)
                                                $bairro_frete = $bairro->bairro_valor;
                                        }
                                      ?>
                                      <td>Frete</td>
                                      <td class="price" ><span class="success">R$ <?php echo $bairro_frete; ?>.00</span></td>
                                    </tr>
<!--                                    <tr class="cart-total-price ">
                                      <td>Total (tax excl.)</td>
                                      <td class="price" >$216.51</td>
                                    </tr>
                                    <tr >
                                      <td>Total tax</td>
                                      <td class="price" id="total-tax">$0.00</td>
                                    </tr>-->
                                    <tr >
                                      <td > Total </td>
                                      <td class=" site-color" id="total-price"> R$ <?php echo $totalCompra + $bairro_frete ?></td>
                                    </tr>
                                    
                                                                         
                                    </tbody><tbody>
                                    </tbody>
                                  </table> 
                                  </div>
      
    </div>
    <!--/rightSidebar--> 
    
  </div>
  <!--/row-->
  
  <div style="clear:both"></div>
</div>
<!-- /wrapper --> 
<div class="gap"> </div>