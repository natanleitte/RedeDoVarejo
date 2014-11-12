<script>
         function validaRegistroPagina()
            {
                var urlTeste = $("#urlTeste").val();
                var senha = $("#InputPassword1").val();
                var confirmaSenha = $("#InputConfirmPassword1").val();
                var emailRegistro = $("#InputEmail1Registro").val();
//               alert(emailRegistro);
                $.ajax({
                type: 'POST',
                url: urlTeste + 'index.php/site/cliente/inserir',
                data: {email: emailRegistro, senha: senha, confirmaSenha: confirmaSenha},
                
                success: function(data){
                    if(data === 'senha')
                    {
                        $("#msgRegistroPagina").append("<div class='alert alert-danger alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\n\
<strong>Atenção!</strong> As senhas são diferentes.");
                        return;
                    }
                    if(data === 'email')
                    {
                        $("#msgRegistroPagina").append("<div class='alert alert-danger alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\n\
<strong>Atenção!</strong> Email inválido.");
                        return;
                    }
//                    alert(data);
                    window.location = urlTeste + 'index.php/site/index/dados_pessoais';
                   
                },
                dataType: 'text'
            });
            }
            
            function validaLoginPagina()
            {
                alert("asldkfjsadlfk");
                var email = $("#emailRegistrado").val();
                var senha = $("#senhaRegistrado").val();
                var urlTeste = $("#urlTeste").val();

                $.ajax({
                type: 'POST',
                url: urlTeste + 'index.php/site/cliente/login',
                data: {email: email, senha: senha},
                
                success: function(data){
                    if(data === 'erro')
                    {
                        $("#msgLoginPagina").append("<div class='alert alert-danger alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\n\
<strong>Atenção!</strong> Email ou senha inválidos.");
                        return;
                    }
                    
//                    alert(data);
                    window.location = urlTeste + 'index.php/site/index/';
                   
                },
                dataType: 'text'
            });
            }
        </script>

<!-- /.Fixed navbar  -->
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="<?php echo base_url() . "index.php/site/index/" ?>">Home</a> </li>
        <li class="active"> Autenticação </li>
      </ul>
    </div>
  </div><!-- /.row -->
  
  
  <div class="row">
  
    <div class="col-lg-12 col-md-12  col-sm-12">
    
      <h1 class="section-title-inner"><span><i class="fa fa-lock"></i> Login</span></h1>
      
      <div id="msgLoginPagina"></div>
      
      <div id="msgRegistroPagina"></div>
      
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-4">
          <h2 class="block-title-2"> Criar uma conta </h2>
          <!--<form role="form">-->
            <div class="form-group">
              <label for="InputEmail1">Email</label>
              <input type="email" class="form-control" id="InputEmail1Registro" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="InputPassword1">Senha</label>
              <input type="password" class="form-control" id="InputPassword1" placeholder="Senha">
            </div>
            <div class="form-group">
              <label for="InputPassword1">Confirmar Senha</label>
              <input type="password" class="form-control" id="InputConfirmPassword1" placeholder="Confirmar Senha">
            </div>
            <button onclick="javascript: validaRegistroPagina();" class="btn   btn-primary"><i class="fa fa-user"></i> Criar conta</button>
          <!--</form>-->
        </div>
        
        
        <div class="col-xs-12 col-sm-4">
          <h2 class="block-title-2"><span>Já está registrado?</span></h2>
<!--          <form role="form">-->
            <div class="form-group">
              <label for="InputEmail2">Email</label>
              <input type="email" class="form-control" id="emailRegistrado" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="InputPassword2">Senha</label>
              <input type="password" class="form-control" id="senhaRegistrado" name="senha" placeholder="Senha">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="checkbox">
                Lembre-me </label>
            </div>
            <div class="form-group">
              <p><a title="Recover your forgotten password" href="<?php echo base_url()?>index.php/site/index/esqueceu_senha">Esqueceu sua senha? </a></p>
            </div>
            <button type="submit" onclick="javascript: validaLoginPagina();" class="btn btn-primary"><i class="fa fa-sign-in"></i> Entrar</button>
          <!--</form>-->
        </div>
          
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