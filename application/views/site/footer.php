<footer>
  <div class="footer">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
          <h3>
            Atendimento
          </h3>
          <ul>
            <li class="supportLi">
              <p>
                Em casos de dúvidas, sugestões ou reclamações contacte-nos! 
              </p>
              <h4>
                
                <a class="inline" href="callto:+8801680531352">
                  <strong>
                    <i class="fa fa-phone">
                    </i>
                    (67) 3026-3200
                  </strong>
                </a>
              </h4>
              <h4>
                <a class="inline" href="mailto:help@tshopweb.com">
                  <i class="fa fa-envelope-o">
                  </i>
                  contato@rededovarejo.com.br
                </a>
              </h4>
            </li>
          </ul>
        </div>
        
        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
          <h3> Sessões </h3>
          <ul>
            <?php
            foreach($categorias->result() as $categoria)
            {
                echo "<li> <a href='" .base_url() . "index.php/site/index/categoria'>" . $categoria->cat_nome . "</a> </li>";

            }
            ?>
          </ul>
        </div>
        
        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
          <h3>
            Informações
          </h3>
          <ul>
            <li> <a href="<?php echo base_url() . "index.php/site/index/quem_somos" ?>"> Quem Somos </a> </li>
            <li> <a href="<?php echo base_url() . "index.php/site/index/termos_condicoes" ?>"> Termos &amp; Condições </a> </li>
            <li> <a href="#"> Áreas Atendidas </a> </li>
          </ul>
        </div>
        
        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
          <h3>
            Minha Conta
          </h3>
          <ul>
            <li> <a href="<?php echo base_url() . "index.php/site/index/login" ?>">
                Login
              </a>
              
            </li>
            <li> <a href="<?php echo base_url() . "index.php/site/index/login" ?>">
                Registrar
              </a>
              
            </li>
            <li> <a href="<?php echo base_url() . "index.php/site/index/dados_pessoais" ?>">
                Minha Conta
              </a>
              
            </li>
            <li> <a href="<?php echo base_url() . "index.php/site/index/esqueceu_senha" ?>">
                Esqueci minha senha
              </a>
              
            </li>
            <li> <a href="<?php echo base_url() . "index.php/admin/login" ?>">
                Admin
              </a>
              
            </li>
            
          </ul>
        </div>
        
        <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
          <h3>
            Receber Notícias
          </h3>
          <ul>
            <li>
              <div class="input-append newsLatterBox text-center">
                <input type="text" class="full text-center"  placeholder="Email ">
                <button class="btn  bg-gray" type="button">
                  Inscrever-se 
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
        &copy; REDE DO VAREJO 2014. Todos os direitos reservados.
      </p>
<!--      <div class="pull-right paymentMethodImg">
        
        <img height="30" class="pull-right" src="images/site/payment/master_card.png" alt="img" >
        <img height="30" class="pull-right" src="images/site/payment/paypal.png" alt="img" >
        <img height="30" class="pull-right" src="images/site/payment/american_express_card.png" alt="img" >
        <img  height="30" class="pull-right" src="images/site/payment/discover_network_card.png" alt="img" >
        <img  height="30" class="pull-right" src="images/site/payment/google_wallet.png" alt="img" >
      </div>-->
      
      
    </div>
    
  </div><!--/.footer-bottom-->
</footer>

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

