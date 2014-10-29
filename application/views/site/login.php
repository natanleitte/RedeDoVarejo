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
              <p><a title="Recover your forgotten password" href="<?php echo base_url()?>index.php/site/index/esqueceu_senha">Esqueceu sua senha? </a></p>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Entrar</button>
          </form>
        </div>
        <?php echo form_close(); ?>
          
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