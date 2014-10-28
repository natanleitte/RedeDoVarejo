<!-- /.Fixed navbar  -->
    

<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="index.html">Home</a> </li>
        <li class="active"> Authentication </li>
      </ul>
    </div>
  </div><!-- /.row -->
  
  
  <div class="row">
  
    <div class="col-lg-12 col-md-12  col-sm-12">
    
      <h1 class="section-title-inner"><span><i class="fa fa-lock"></i> Login</span></h1>
      
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-4">
          <h2 class="block-title-2"> Criar uma conta </h2>
          <form role="form">
            <div class="form-group">
              <label for="exampleInputName">Nome</label>
              <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="InputEmail1">Email</label>
              <input type="email" class="form-control" id="InputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="InputPassword1">Senha</label>
              <input type="password" class="form-control" id="InputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn   btn-primary"><i class="fa fa-user"></i> Criar conta</button>
          </form>
        </div>
        
        <?php
            $attributes = array('id' => 'loginForm');
            echo form_open('index.php/site/cliente/login', $attributes); ?>
        <div class="col-xs-12 col-sm-4">
          <h2 class="block-title-2"><span>Já está registrado?</span></h2>
          <form role="form">
            <div class="form-group">
              <label for="InputEmail2">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="InputPassword2">Senha</label>
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="checkbox">
                Lembre-me </label>
            </div>
            <div class="form-group">
              <p><a title="Recover your forgotten password" href="forgot-password.html">Esqueceu sua senha? </a></p>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Entrar</button>
          </form>
        </div>
        ?>
        <div class="col-xs-12 col-sm-4">
          <h2 class="block-title-2"><span>Checkout as Guest</span></h2>
          <p>Don't have an account and you don't want to register? Checkout as a guest instead!</p>
          <a href="checkout-1.html" class="btn btn-primary"><i class="fa fa-sign-in"></i> Checkout as Guest</a> </div>
      </div> <!--/row end--> 
      
    </div>
  </div> <!--/row-->
  
  <div style="clear:both"></div>
</div>
<!-- /.main-container -->

<div class="gap"> </div>


<footer>
  <div class="footer">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
          <h3>
            Support 
          </h3>
          <ul>
            <li class="supportLi">
              <p>
                Lorem ipsum dolor sit amet, consectetur 
              </p>
              <h4>
                
                <a class="inline" href="callto:+8801680531352">
                  <strong>
                    <i class="fa fa-phone">
                    </i>
                    88 01680 531352
                  </strong>
                </a>
              </h4>
              <h4>
                <a class="inline" href="mailto:help@tshopweb.com">
                  <i class="fa fa-envelope-o">
                  </i>
                  help@tshopweb.com
                </a>
              </h4>
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
          <h3>
            Information
          </h3>
          <ul>
            <li> <a href="product-details.html"> Product Details </a> </li>
                <li> <a href="product-details-style2.html"> Product Details Version 2 </a> </li>
                <li> <a href="cart.html"> Cart </a> </li>
                <li> <a href="about-us.html"> About us </a> </li>
            <li> <a href="about-us-2.html">
                About us 2 
              </a>
              
            </li>
            <li> <a href="contact-us.html">
                Contact us
              </a>
              
            </li>
            <li> <a href="contact-us-2.html">
                Contact us 2 
              </a>
              
            </li>
            <li> <a href="terms-conditions.html">
                Terms &amp; Conditions
              </a>
              
            </li>
            
          </ul>
        </div>
        
        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
          <h3>
            My Account
          </h3>
          <ul>
            <li> <a href="account-1.html">
                Account Login
              </a>
              
            </li>
            <li> <a href="account.html">
                My Account
              </a>
              
            </li>
            <li> <a href="my-address.html">
                My Address
              </a>
              
            </li>
            <li> <a href="wishlist.html">
                Wisth list
              </a>
              
            </li>
            <li> <a href="order-list.html">
                Order list
              </a>
              
            </li>
            
          </ul>
        </div>
        
        <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
          <h3>
            Stay in touch
          </h3>
          <ul>
            <li>
              <div class="input-append newsLatterBox text-center">
                <input type="text" class="full text-center"  placeholder="Email ">
                <button class="btn  bg-gray" type="button">
                  Subscribe 
                  <i class="fa fa-long-arrow-right">
                    
                  </i>
                </button>
              </div>
            </li>
          </ul>
          <ul class="social">
            <li> <a href="http://facebook.com">
                <i class=" fa fa-facebook">
                  &nbsp;
                </i>
              </a>
            </li>
            <li> <a href="http://twitter.com">
                <i class="fa fa-twitter">
                  &nbsp;
                </i>
              </a>
            </li>
            <li> <a href="https://plus.google.com">
                <i class="fa fa-google-plus">
                  &nbsp;
                </i>
              </a>
            </li>
            <li> <a href="http://youtube.com">
                <i class="fa fa-pinterest">
                  &nbsp;
                </i>
              </a>
            </li>
            <li> <a href="http://youtube.com">
                <i class="fa fa-youtube">
                  &nbsp;
                </i>
              </a>
            </li>
          </ul>
        </div>
        
      </div><!--/.row-->
    </div><!--/.container-->
  </div><!--/.footer-->
  
  <div class="footer-bottom">
  
    <div class="container">
      <p class="pull-left">
        &copy; TSHOP 2014. All right reserved.
      </p>
      <div class="pull-right paymentMethodImg">
        
        <img height="30" class="pull-right" src="images/site/payment/master_card.png" alt="img" >
        <img height="30" class="pull-right" src="images/site/payment/paypal.png" alt="img" >
        <img height="30" class="pull-right" src="images/site/payment/american_express_card.png" alt="img" >
        <img  height="30" class="pull-right" src="images/site/payment/discover_network_card.png" alt="img" >
        <img  height="30" class="pull-right" src="images/site/payment/google_wallet.png" alt="img" >
      </div>
      
      
    </div>
    
  </div><!--/.footer-bottom-->
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

