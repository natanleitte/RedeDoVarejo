<!-- /.Fixed navbar  --><div class="container main-container headerOffset">
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
                          <div class="pull-right"> <a href="checkout-5.html" class="btn btn-primary btn-small " > Finalizar &nbsp; <i class="fa fa-arrow-circle-right"></i> </a> </div>
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
                          <div class="pull-right"> <a href="checkout-5.html" class="btn btn-primary btn-small " > Finalizar &nbsp; <i class="fa fa-arrow-circle-right"></i> </a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> <span class="numberCircuil">Opção 3</span><strong> PagSeguro</strong> </a> </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>All transactions are secure and encrypted, and we neverstor To learn more, please view our privacy policy.</p>
                          <br>
                          <label class="radio-inline" for="radios-3">
                            <input name="radios" id="radios-3" value="4" type="radio">
                            <img src="<?php echo base_url() . "assets/site/images/site/payment/paypal-small.png" ?>" height="18" alt="paypal"> Checkout with Paypal </label>
                          <div class="form-group">
                            <label for="CommentsOrder2">Add Comments About Your Order</label>
                            <textarea id="CommentsOrder2" class="form-control" name="CommentsOrder2" cols="26" rows="3"></textarea>
                          </div>
                          <div class="form-group clearfix">
                            <label class="checkbox-inline" for="checkboxes-0">
                              <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
                              I have read and agree to the <a href="terms-conditions.html">Terms & Conditions</a> </label>
                          </div>
                          
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
<!--                    <div class="panel panel-default">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title"> <a class="masterCard" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> <span class="numberCircuil">Option 3</span> <strong> MasterCard</strong> </a> </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>All transactions are secure and encrypted, and we neverstor To learn more, please view our privacy policy.</p>
                          <br>
                          <div class="panel open">
                            <div class="creditCard">
                              <div class="cartBottomInnerRight paymentCard"> 
                              </div>
                              <span>Supported</span> <span>Credit Cards</span>
                              <div class="paymentInput">
                                <label for="CardNumber">Credit Card Number *</label>
                                <br>
                                <input id="CardNumber" type="text" name="Number">
                              </div>
                              paymentInput
                              <div class="paymentInput">
                                <label for="CardNumber2">Name on Credit Card *</label>
                                <br>
                                <input type="text" name="CardNumber2" id="CardNumber2">
                              </div>
                              paymentInput
                              <div class="paymentInput">
                                <div class="form-group">
                                  <label>Expiration date *</label>
                                  <br>
                                  <div class="col-lg-4 col-md-4 col-sm-4 no-margin-left no-padding">
                                    <select required aria-required="true" name="expire">
                                      <option value="">Month</option>
                                      <option value="1">01 - January</option>
                                      <option value="2">02 - February</option>
                                      <option value="3">03 - March</option>
                                      <option value="4">04 - April</option>
                                      <option value="5">05 - May</option>
                                      <option value="6">06 - June</option>
                                      <option value="7">07 - July</option>
                                      <option value="8">08 - August</option>
                                      <option value="9">09 - September</option>
                                      <option value="10">10 - October</option>
                                      <option value="11">11 - November</option>
                                      <option value="12">12 - December</option>
                                    </select>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-4">
                                    <select required aria-required="true" name="year">
                                      <option value="">Year</option>
                                      <option value="2013">2013</option>
                                      <option value="2014">2014</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      <option value="2019">2019</option>
                                      <option value="2020">2020</option>
                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>
                                      <option value="2023">2023</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              paymentInput
                              
                              <div style="clear:both"></div>
                              <div class="paymentInput clearfix">
                                <label for="VerificationCode">Verification Code *</label>
                                <br>
                                <input type="text" id="VerificationCode" name="VerificationCode" style="width:90px;">
                                <br>
                              </div>
                              paymentInput
                              
                              <div>
                                <input type="checkbox" name="saveInfo" id="saveInfoid">
                                <label for="saveInfoid">&nbsp;Save my Card information</label>
                              </div>
                            </div>
                            creditCard
                            
                            <div class="pull-right"> <a href="checkout-5.html" class="btn btn-primary btn-small " > Order &nbsp; <i class="fa fa-arrow-circle-right"></i> </a> </div>
                          </div>
                        </div>
                      </div>
                    </div>-->
                  </div>
                </div>
                <!--Será editado para mandar os dados corretos ao Pag seguro-->

                <div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
  <br>
  -Falta mais coisa<br>
  -Ainda mais
</div>
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
    
    <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
      <div class="w100 cartMiniTable">
        <table id="cart-summary" class="std table">
          <tbody>
            <tr >
              <td>Total products</td>
              <td class="price" >$216.51</td>
            </tr>
            <tr  style="">
              <td>Shipping</td>
              <td class="price" ><span class="success">Free shipping!</span></td>
            </tr>
            <tr class="cart-total-price ">
              <td>Total (tax excl.)</td>
              <td class="price" >$216.51</td>
            </tr>
            <tr >
              <td>Total tax</td>
              <td class="price" id="total-tax">$0.00</td>
            </tr>
            <tr >
              <td > Total </td>
              <td class=" site-color" id="total-price">$216.51</td>
            </tr>
          </tbody>
          <tbody>
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


<footer>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
          <h3> Support </h3>
          <ul>
            <li class="supportLi">
              <p> Lorem ipsum dolor sit amet, consectetur </p>
              <h4> <a class="inline" href="callto:+8801680531352"> <strong> <i class="fa fa-phone"> </i> 88 01680 531352 </strong> </a> </h4>
              <h4> <a class="inline" href="mailto:help@tshopweb.com"> <i class="fa fa-envelope-o"> </i> help@tshopweb.com </a> </h4>
            </li>
          </ul>
        </div>
        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
          <h3> Shop </h3>
          <ul>
            <li> <a href="index.html"> Home </a> </li>
            <li> <a href="category.html"> Category </a> </li>
            <li> <a href="sub-category.html"> Sub Category </a> </li>
            
          </ul>
        </div>
        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
          <h3> Information </h3>
          <ul>
            <li> <a href="product-details.html"> Product Details </a> </li>
                <li> <a href="product-details-style2.html"> Product Details Version 2 </a> </li>
                <li> <a href="cart.html"> Cart </a> </li>
                <li> <a href="about-us.html"> About us </a> </li>
            <li> <a href="about-us-2.html"> About us 2 </a> </li>
            <li> <a href="contact-us.html"> Contact us </a> </li>
            <li> <a href="contact-us-2.html"> Contact us 2 </a> </li>
            <li> <a href="terms-conditions.html"> Terms &amp; Conditions </a> </li>
          </ul>
        </div>
        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
          <h3> My Account </h3>
          <ul>
            <li> <a href="account-1.html"> Account Login </a> </li>
            <li> <a href="account.html"> My Account </a> </li>
            <li> <a href="my-address.html"> My Address </a> </li>
            <li> <a href="wishlist.html"> Wisth list </a> </li>
            <li> <a href="order-list.html"> Order list </a> </li>
          </ul>
        </div>
        <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
          <h3> Stay in touch </h3>
          <ul>
            <li>
              <div class="input-append newsLatterBox text-center">
                <input type="text" class="full text-center"  placeholder="Email ">
                <button class="btn  bg-gray" type="button"> Subscribe <i class="fa fa-long-arrow-right"> </i> </button>
              </div>
            </li>
          </ul>
          <ul class="social">
            <li> <a href="http://facebook.com"> <i class=" fa fa-facebook"> &nbsp; </i> </a> </li>
            <li> <a href="http://twitter.com"> <i class="fa fa-twitter"> &nbsp; </i> </a> </li>
            <li> <a href="https://plus.google.com"> <i class="fa fa-google-plus"> &nbsp; </i> </a> </li>
            <li> <a href="http://youtube.com"> <i class="fa fa-pinterest"> &nbsp; </i> </a> </li>
            <li> <a href="http://youtube.com"> <i class="fa fa-youtube"> &nbsp; </i> </a> </li>
          </ul>
        </div>
      </div>
      <!--/.row--> 
    </div>
    <!--/.container--> 
  </div>
  <!--/.footer-->
  
  <div class="footer-bottom">
    <div class="container">
      <p class="pull-left"> &copy; TSHOP 2014. All right reserved. </p>
      <div class="pull-right paymentMethodImg"> <img height="30" class="pull-right" src="images/site/payment/master_card.png" alt="img" > <img height="30" class="pull-right" src="images/site/payment/paypal.png" alt="img" > <img height="30" class="pull-right" src="images/site/payment/american_express_card.png" alt="img" > <img  height="30" class="pull-right" src="images/site/payment/discover_network_card.png" alt="img" > <img  height="30" class="pull-right" src="images/site/payment/google_wallet.png" alt="img" > </div>
    </div>
  </div>
  <!--/.footer-bottom--> 
</footer>
<!-- Le javascript
================================================== --> 

<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="assets/js/jquery/1.8.3/jquery.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 

<!-- include  parallax plugin --> 
<script type="text/javascript"  src="assets/js/jquery.parallax-1.1.js"></script> 

<!-- optionally include helper plugins --> 
<script type="text/javascript"  src="assets/js/helper-plugins/jquery.mousewheel.min.js"></script> 

<!-- include mCustomScrollbar plugin //Custom Scrollbar  --> 

<script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.js"></script> 

<!-- include checkRadio plugin //Custom check & Radio  --> 
<script type="text/javascript" src="assets/js/ion-checkRadio/ion.checkRadio.min.js"></script> 

<!-- include grid.js // for equal Div height  --> 
<script src="assets/js/grids.js"></script> 

<!-- include carousel slider plugin  --> 
<script src="assets/js/owl.carousel.min.js"></script> 

<!-- jQuery minimalect // custom select   --> 
<script src="assets/js/jquery.minimalect.min.js"> </script> 

<!-- include touchspin.js // touch friendly input spinner component   --> 
<script src="assets/js/bootstrap.touchspin.js"></script> 

<!-- include custom script for site  --> 
<script src="assets/js/script.js"></script>
</body>
</html>
