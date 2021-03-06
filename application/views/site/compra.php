<?php
$urlImg = "assets/img/img-itens/";
?>
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="<?php echo base_url() . "index.php/site/index/"?>">Home</a> </li>
        <li> <a href="<?php echo base_url() . "index.php/site/index/minhas_compras"?>">Minhas Compras</a> </li>
        <li class="active"> Minha Compra </li>
      </ul>
    </div>
  </div>
  
  <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-7">
            <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Minha Compra</span></h1>
</div>

    <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar"> 

      <h4 class="caps"><a href="<?php echo base_url() . "index.php/site/index/minhas_compras" ?>"><i class="fa fa-chevron-left"></i> Minhas Compras </a></h4>
      </div>
</div>
  
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">
      <div class="row userInfo">
        
        <div class="col-xs-12 col-sm-12">
        
       <div class="w100 clearfix"> 
       
       
               <ul class="orderStep ">
                   <li> <a href="#">
                    <i class="fa fa-money "></i>
                    <?php
                    foreach($compra->result() as $com)
                    {
                        $com_valor_total = $com->com_valor_total;
                        if($com->pag_codigo == 1)
                        {
                            echo "<span> Aguardando Pagamento </span>";
                        }
                        else if($com->pag_codigo == 2)
                        {
                            echo "<span> Paga </span>";

                        }
                        else
                        {
                            echo "<span> Cancelada </span>";
                        }
                    
                    
                        echo "</a> </li>";
                        if($com->ent_codigo == 1)
                        {
                            echo "<li class='active'> <a href='#'>   <i class='fa fa fa-envelope  '></i>";

                        }
                        else
                        {
                            echo "<li> <a href='#'>   <i class='fa fa fa-envelope  '></i>";

                        }
                        echo "<span> A Entregar </span></a></li>";
                        
                        if($com->ent_codigo == 2)
                        {
                            echo "<li class='active'> <a href='#'><i class='fa fa-plane '> </i><span>Saiu para Entrega</span> </a> </li>";
 
                        }
                        else
                        {
                            echo "<li> <a href='#'><i class='fa fa-plane '> </i><span>Saiu para Entrega</span> </a> </li>";

                        }
                        
                        if($com->ent_codigo == 3)
                        {
                            echo "<li class='active'> <a href='#'><i class='fa fa-thumbs-o-up'> </i><span>Entregue</span> </a>  </li>";
                        }
                        else
                        {
                            echo "<li> <a href='#'><i class='fa fa-thumbs-o-up'> </i><span>Entregue</span> </a>  </li>";
                        }
                    }
                    ?>
                
                </ul><!--orderStep-->
        </div>
        
        
        <div class="w100 clearfix">
        
        
        	<div class="row userInfo">
                
                <div class="col-lg-12">
                    <h2 class="block-title-2"> Produtos </h2>
                </div>
                
            
            
            	<div class="col-xs-12 col-sm-12">
                      <div class="cartContent w100 checkoutReview ">
                        <table class="cartTable table-responsive"   style="width:100%">
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
                                foreach($compra_itens->result() as $compra_item)
                                {
                                    foreach($itens->result() as $item)
                                    {
                                        if($compra_item->item_codigo == $item->item_codigo)
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
                                            
                                            echo "<tr class = 'CartProduct'>";
                                            echo "<td class = 'CartProductThumb'><div> <a><img src='" . base_url() . $urlImg . $cat_nome . "/" . $pro_nome_url . "/" . $item->item_img . "' alt = 'img'></a> </div></td>";
                                            echo "<td ><div class = 'CartDescription'>";
                                            echo "<h4> <a >" . $item->item_nome . "</a> </h4>";
//                                            echo "<span class = 'size'>12 x 1.5 L</span>";
                                            echo "<div class = 'price'> <span>R$ ". number_format($item->item_preco_atual, 2, ',', '.') ."</span></div>";
                                            echo "</div></td>";
                                            echo "<td class='delete'><div class='price '>R$ " . number_format($item->item_preco_atual, 2, ',', '.') ."</div></td>";
                                            echo "<td class='hidden-xs'>" . $compra_item->item_qtd ."</td>";
                                            echo "<td >0</td>";
                                            echo "<td class = 'price'>R$ " . number_format($item->item_preco_atual * $compra_item->item_qtd, 2, ',', '.') . "</td>";
                                            echo "</tr>";
                                            $totalCompra += ($item->item_preco_atual * $compra_item->item_qtd );
                                        }

                                    }
                                }
                            ?>
                          </tbody>
                        </table>
                      </div>
                      <!--cartContent-->
                      
                      <div class="w100 costDetails">
                        <div class="table-block" id="order-detail-content">
                          <table class="std table" id="cart-summary">
                            <tr >
                              <td>Total Compra</td>
                              <td  class="price">R$ <?php echo number_format($totalCompra, 2, ',', '.'); ?></td>
                            </tr>
                            <tr style="" >
                              <td>Frete</td>
                              <td  class="price"><span class="success">R$ <?php echo number_format($com_valor_total - $totalCompra, 2, ',', '.'); ?></span></td>
                            </tr>
                              <td > Total </td>
                              <td id="total-price" class="price">R$ <?php echo number_format($com_valor_total, 2, ',', '.'); ?></td>
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
            
            
            
<!--            <div class="cartFooter w100">
            <div class="box-footer">
              <div class="pull-left"> <a class="btn btn-default" href="checkout-4.html">
					<i class="fa fa-arrow-left"></i> &nbsp; Payment method </a> 
               </div>
               
               
               <div class="pull-right">
                <a href="#" class="btn btn-primary btn-small " > 
					Confirm Order &nbsp; <i class="fa fa-check"></i>
                 </a>
              </div>
               
               
              
            </div>
          </div>-->
          <!--/ cartFooter --> 
    
        	
       
     
        
        
        
        
        
        </div>
          
          
          
                
        </div>
      </div>
      <!--/row end--> 
      
  
    <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar"> 
      
  <div class="w100 cartMiniTable">
                            <table id="cart-summary" class="std table">
                                    <tbody><tr >
                                      <td>Total da Compra</td>
                                      <td class="price" >R$ <?php echo number_format($totalCompra, 2, ',', '.'); ?> </td>
                                    </tr>
                                    <tr  style="">
                                      <td>Frete</td>
                                      <td class="price" ><span class="success">R$ <?php echo number_format($com_valor_total - $totalCompra, 2, ',', '.'); ?></span></td>
                                    </tr>
                                    <tr >
                                      <td > Total </td>
                                      <td class=" site-color" id="total-price">R$ <?php echo number_format($com_valor_total, 2, ',', '.'); ?></td>
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
