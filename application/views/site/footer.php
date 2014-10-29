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
                echo "<li> <a href='index.html'>" . $categoria->cat_nome . "</a> </li>";

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
            <li> <a href="<?php echo base_url() . "index.php/site/index/temos_condicoes" ?>"> Termos &amp; Condições </a> </li>
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

<!-- include carousel slider plugin  -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- include smoothproducts // product zoom plugin  -->
<script type="text/javascript" src="assets/js/smoothproducts.min.js"></script>

<!-- jQuery minimalect // custom select   -->
<script src="assets/js/jquery.minimalect.min.js"></script>

<!-- include touchspin.js // touch friendly input spinner component   --> 
<script src="assets/js/bootstrap.touchspin.js"></script> 

<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>

</body>
</html>

