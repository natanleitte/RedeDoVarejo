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
  <!--/.row-->
  
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Finalizar Compra</span></h1>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
      <h4 class="caps"><a href="category.html"><i class="fa fa-chevron-left"></i> Continuar Comprando </a></h4>
    </div>
  </div> <!--/.row-->
  
   <?php
                        $attributes = array('id' => 'loginForm');
                        echo form_open('index.php/site/cliente/finalizaCompra1', $attributes); ?>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
          <div class="w100 clearfix">
            <ul class="orderStep ">
              <li class="active"> <a href="<?php echo base_url() . "index.php/site/index/finalizar_compra1" ?>"> <i class="fa fa-map-marker "></i> <span> Endereço</span> </a> </li>
              <li><a href="<?php echo base_url() . "index.php/site/index/finalizar_compra2" ?>" ><i class="fa fa-check-square "> </i><span>Ordem</span></a></li>
              <li> <a href="<?php echo base_url() . "index.php/site/index/finalizar_compra3" ?>"><i class="fa fa-money  "> </i><span>Pagamento</span> </a> </li>
            </ul>
            <!--/.orderStep end--> 
          </div>
          
          
          <div class="w100 clearfix">
            <div class="row userInfo">
              <div class="col-lg-12">
                <h2 class="block-title-2"> Você deseja adicionar um novo endereço? </h2>
              </div>
              
              <!--<form>-->
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group required">
                      <label for="InputName"> Nome <sup>*</sup> </label>
                    <input required type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                  </div>
                  <div class="form-group required">
                    <label for="InputLastName">Sobrenome <sup>*</sup> </label>
                    <input required type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                  </div>
                  <div class="form-group">
                    <label for="InputEmail">Email </label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                  <div class="form-group required">
                    <label for="InputAddress">Endereço <sup>*</sup> </label>
                    <input required type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                  </div>
                  <div class="form-group">
                    <label for="InputAddress2">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" style="width: 20%;">
                  </div>
                  <div class="form-group">
                    <label for="InputAddress2">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                  </div>
                  <div class="form-group required">
                    <label for="InputCity">Cidade <sup>*</sup> </label>
                    <input required type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                  </div>
                  <div class="form-group required">
                    <label for="InputState">Estado <sup>*</sup> </label>
              
                      <select class="form-control" required aria-required="true" id="estado" name="estado">
                      <option value="estado">Selecione o Estado</option> 
		<option value="ac">Acre</option> 
		<option value="al">Alagoas</option> 
		<option value="am">Amazonas</option> 
		<option value="ap">Amapá</option> 
		<option value="ba">Bahia</option> 
		<option value="ce">Ceará</option> 
		<option value="df">Distrito Federal</option> 
		<option value="es">Espírito Santo</option> 
		<option value="go">Goiás</option> 
		<option value="ma">Maranhão</option> 
		<option value="mt">Mato Grosso</option> 
		<option value="ms">Mato Grosso do Sul</option> 
		<option value="mg">Minas Gerais</option> 
		<option value="pa">Pará</option> 
		<option value="pb">Paraíba</option> 
		<option value="pr">Paraná</option> 
		<option value="pe">Pernambuco</option> 
		<option value="pi">Piauí</option> 
		<option value="rj">Rio de Janeiro</option> 
		<option value="rn">Rio Grande do Norte</option> 
		<option value="ro">Rondônia</option> 
		<option value="rs">Rio Grande do Sul</option> 
		<option value="rr">Roraima</option> 
		<option value="sc">Santa Catarina</option> 
		<option value="se">Sergipe</option> 
		<option value="sp">São Paulo</option> 
		<option value="to">Tocantins</option> 
                    </select>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="form-group required">
                    <label for="InputZip">CEP <sup>*</sup> </label>
                    <input required type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
                  </div>
                  <div class="form-group">
                    <label for="InputAdditionalInformation">Observação</label>
                    <textarea rows="3" cols="26" name="InputAdditionalInformation" class="form-control" id="observacao" name="observacao"></textarea>
                  </div>
                  <div class="form-group required">
                    <label for="InputMobile">Telefone <sup>*</sup></label>
                    <input  required type="tel"  name="telefone" class="form-control" id="InputMobile">
                  </div>
                  <div class="form-group required">
                    <label for="addressAlias">Please assign an address title for future reference. <sup>*</sup></label>
                    <input required type="text" value="My address" name="addressAlias" class="form-control" id="addressAlias">
                  </div>
                </div>
              <!--</form>-->
            </div>
            <!--/row end--> 
            
          </div>
          <div class="cartFooter w100">
            <div class="box-footer">
              <div class="pull-left"> <a class="btn btn-default" href="index.html"> <i class="fa fa-arrow-left"></i> &nbsp; Continuar Comprando </a> </div>
              <div class="pull-right"> <button class="btn btn-primary btn-small " type="submit" > Próximo &nbsp; <i class="fa fa-arrow-circle-right"></i> </button> </div>
            </div>
          </div>
          <!--/ cartFooter --> 
          <?php echo form_close(); ?>
        </div>
      </div>
      <!--/row end--> 
      
    </div>
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
      <!--  /cartMiniTable--> 
      
    </div>
    <!--/rightSidebar--> 
    
  </div> <!--/row-->
  
  <div style="clear:both"></div>
</div>
<!-- /.main-container-->
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
