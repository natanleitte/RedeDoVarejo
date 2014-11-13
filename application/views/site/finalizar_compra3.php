<script type="text/javascript" src="<?php echo base_url() . 'assets/site/assets/js/jquery/1.8.3/jquery.js' ?>"></script> 

<script>
$( document ).ready(function() {
//    alert('asdkfjs');
  // Handler for .ready() called.
  var totalCompra = $("#totalCompra").val();
  var bairroFrete = $("#bairoFrete").val();
//  alert(totalCompra);
//  alert(bairroFrete);
//  alert(parseInt(totalCompra) + parseInt(bairroFrete));

  
    
  if((parseInt(totalCompra) + parseInt(bairroFrete)) < 50)
  {
  $("#msgAlerta").append("<div class='alert alert-warning alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\n\
<strong>Atenção!</strong> A compra precisa ter um valor total de, pelo menos, R$ 50, 00.");
  }
});

function verificaValor()
{
    var totalCompra = $("#totalCompra").val();
    var bairroFrete = $("#bairoFrete").val();
//    alert(bairroFrete);
  if((parseInt(totalCompra) + parseInt(bairroFrete)) < 50)
  {
  $("#msgAlerta").append("<div class='alert alert-danger alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\n\
<strong>Atenção!</strong> A compra precisa ter um valor total de, pelo menos, R$ 50, 00.");
  $('html, body').scrollTop(0);
  }
  else
  {
//      alert(bairroFrete);
      var urlSubmit = $("#urlSubmit").val();
      window.location.href = urlSubmit + 'index.php/site/index/salvarCompra/?bairro_frete=' + bairroFrete;
  }
   return false; 
}

</script>

<input type="hidden" id="urlSubmit" value="<?php echo base_url();?>"
<!-- /.Fixed navbar  --><div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="<?php echo base_url() . "index.php/site/index/"?>">Home</a> </li>
        <li> <a href="<?php echo base_url() . "index.php/site/index/carrinho"?>">Carrinho</a> </li>
        <li class="active"> Finalizar Compra </li>
      </ul>
    </div>
  </div>
    
  <div id="msgAlerta"></div>
  
  
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Finalizar Compra</span></h1>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
      <h4 class="caps"><a href="category.html"><i class="fa fa-chevron-left"></i> Continuar Comprando </a></h4>
    </div>
  </div>
  
  
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
          <div class="w100 clearfix">
            <ul class="orderStep ">
              <li> <a href="<?php echo base_url() . "index.php/site/index/finalizar_compra1" ?>"> <i class="fa fa-map-marker "></i> <span> Endereço</span> </a> </li>
              <li> <a href="<?php echo base_url() . "index.php/site/index/finalizar_compra2" ?>"><i class="fa fa-check-square "> </i><span>Ordem</span></a> </li>
              <li class="active"> <a href="<?php echo base_url() . "index.php/site/index/finalizar_compra3" ?>"><i class="fa fa-money  "> </i><span>Pagamento</span> </a> </li>
            </ul>
            <!--orderStep--> 
          </div>
          <div class="w100 clearfix">
            <div class="row userInfo">
              <div class="col-lg-12">
                <h2 class="block-title-2"> Forma de Pagamento </h2>
                <p>Selecione uma das formas de pagamento abaixo.</p>
                <hr>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="paymentBox">
                  <div class="panel-group paymentMethod" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title"> <a class="cashOnDelivery" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <span class="numberCircuil">Opção 1</span> <strong> Pagamento na entrega</strong> </a> </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <p>Desejo pagar na entrega.</p>
                          <br>
                          <div class="pull-right"> <a onclick="javascript: verificaValor();" class="btn btn-primary btn-small " > Finalizar &nbsp; <i class="fa fa-arrow-circle-right"></i> </a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title"> <a class="cashOnDelivery" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> <span class="numberCircuil">Opção 2</span> <strong> Transferência Bancária/Depósito</strong> </a> </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Faça a transferência bancária ou depósito para a conta abaixo.</p>
                          <br>
                          <div class="form-group">
                              <strong>Nome / Razão Social:</strong> Rede Do Varejo<br/>
                            <strong>Banco:</strong> Banco do Brasil <br/>
                            <strong>Agência:</strong> 29070-1 <br/>  
                            <strong>Conta Corrente:</strong> 31.267-3 <br/>     
                          </div>
                          <div class="pull-right"> <a onclick="javascript: verificaValor();" class="btn btn-primary btn-small " > Finalizar &nbsp; <i class="fa fa-arrow-circle-right"></i> </a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> <span class="numberCircuil">Opção 3</span><strong> PagSeguro</strong> </a> </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Toda transação é criptografada e segura, para saber mais verifique nossa Política de Privacidade.</p>
                          <br>
                          <label class="radio-inline" for="radios-3">
                            <!--<input name="radios" id="radios-3" value="4" type="radio">-->
                            <img src="<?php echo base_url() . "assets/site/images/site/payment/pagseguro-small.png" ?>" height="18" alt="paypal"> Pagar com PagSeguro</label>
<!--                          <div class="form-group">
                            <label for="CommentsOrder2">Add Comments About Your Order</label>
                            <textarea id="CommentsOrder2" class="form-control" name="CommentsOrder2" cols="26" rows="3"></textarea>
                          </div>-->
<!--                          <div class="form-group clearfix">
                            <label class="checkbox-inline" for="checkboxes-0">
                              <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
                              I have read and agree to the <a href="terms-conditions.html">Terms & Conditions</a> </label>
                          </div>-->
                          
                          <form id="pagseguro" target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
                            <input type="hidden" name="email_cobranca" value="natanleitte@gmail.com">
                            <input type="hidden" name="tipo" value="CP">
                            <input type="hidden" name="moeda" value="BRL">

                            <?php
                                $num = 1;
                                foreach ($this->cart->contents() as $item) {
                                echo "<input type='hidden' name='item_id_". $num ."' value='12345'>";
                                echo "<input type='hidden' name='item_descr_". $num ."' value='" . $item['name'] . "'>";
                                echo "<input type='hidden' name='item_quant_". $num ."' value='" . $item['qty'] . "'>";
                                echo "<input type='hidden' name='item_valor_". $num ."' value='" . $item['price'] . "'>";
                                echo "<input type='hidden' name='item_frete_". $num ."' value='0'>";
                                echo "<input type='hidden' name='item_peso_". $num ."' value='0'>";
                                $num++;
                                }
                            ?>
                            
                            <div class="pull-right"> <a onclick="$(this).closest('form').submit()" class="btn btn-primary btn-small " > Finalizar &nbsp; <i class="fa fa-arrow-circle-right"></i> </a> </div>
                            </form>
                          
                        </div>
                      </div>
                    </div>
                      <div id="teste"></div>

                  </div>
                </div>
                <!--Será editado para mandar os dados corretos ao Pag seguro-->

                <!--/row--> 
                
              </div>
            </div>
          </div>
          <!--/row end-->
          
          <div class="cartFooter w100">
            <div class="box-footer">
              <div class="pull-left"> <a class="btn btn-default" href="checkout-3.html"> <i class="fa fa-arrow-left"></i> &nbsp; Billing address </a> </div>
            </div>
          </div>
        </div>
        
        <!--/ cartFooter --> 
        
      </div>
    </div>
    <!--/row end-->
    <?php
        $totalCompra = 0;
        foreach ($this->cart->contents() as $item) {
            $totalCompra += ($item['price'] * $item['qty']);
        }
    ?>
    <input type="hidden" id="totalCompra" value="<?php echo $totalCompra?>">
    
    <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
      <div class="w100 cartMiniTable">
        <table id="cart-summary" class="std table">
                                    <tbody>
                                    <tr >
                                      <td>Total da compra</td>
                                      <td class="price" >R$ <?php echo number_format($totalCompra, 2, ',', '.') ?></td>
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
                                      <input type="hidden" id="bairoFrete" value="<?php echo $bairro_frete; ?>">
                                      <td class="price" ><span class="success">R$ <?php echo number_format($bairro_frete, 2, ',', '.'); ?></span></td>
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
                                      <td class=" site-color" id="total-price"> R$ <?php echo number_format($totalCompra + $bairro_frete, 2, ',', '.') ?></td>
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
<!-- /.main-container -->
<div class="gap"> </div>