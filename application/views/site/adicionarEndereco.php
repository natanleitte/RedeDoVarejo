<!-- /.Fixed navbar  --><div class="container main-container headerOffset"> 

<div class="row">
  
   <div class="breadcrumbDiv col-lg-12">
       <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="<?php echo base_url() . "index.php/site/index/"?>">Home</a> </li>
        <li> <a href="<?php echo base_url() . "index.php/site/index/minha_conta"?>">Minha Conta</a> </li>
        <li class="active"> Endereço </li>
      </ul>
    </div>
  </div>
      </div>
      </div>
  


    	
        
      
    <?php
        $attributes = array('id' => 'loginForm');
        echo form_open('index.php/site/cliente/adicionaEndereco', $attributes); ?>
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-7">
        
        	<h1 class="section-title-inner"><span><i class="fa fa-map-marker"></i> Adicionar Endereço </span></h1>
        
        	<div class="row userInfo">
            
      
                
                <div class="col-lg-12 col-xs-12">
<!--                    <h2 class="block-title-2"> To add a new address, please fill out the form below. </h2>-->
                    <p class="required"><sup>*</sup> Campo Obrigatório</p>
                </div>
                
                <form>
            
            	<div class="col-xs-12 col-sm-6">
                    
                  <div class="form-group required">
                    <label for="InputAddress">Endereço <sup>*</sup> </label>
                    <input required type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                  </div>
                    
                  <div class="form-group required">
                    <label for="InputAddress2">Número <sup>*</sup> </label>
                    <input required type="text" class="form-control" id="numero" name="numero" placeholder="Número" style="width: 20%;">
                  </div>
                 
                  <div class="form-group required">
                    <label for="InputCity">Cidade <sup>*</sup> </label>
                    <input required type="text" value="Campo Grande" class="form-control" id="cidade" name="cidade" placeholder="Cidade" disabled="disabled">
                  </div>
                  
                  <div class="form-group">
                      <label for="InputName"> Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
                  </div>
                  <div class="form-group">
                    <label for="observacao">Observação</label>
                    <textarea rows="3" cols="26" name="InputAdditionalInformation" class="form-control" id="observacao" name="observacao"></textarea>
                  </div>
                    
                </div>
                
                
                <div class="col-xs-12 col-sm-6">
                    
                  <div class="form-group required">
                    <label for="InputAddress2">Bairro</label>
                    <!--<input required type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">-->
                    <select class="form-control" required aria-required="true" id="bairro" name="bairro">
                        <?php
                            foreach($bairros->result() as $bairro)
                            {
                                echo "<option value='" . $bairro->bairro_codigo . "'>" . $bairro->bairro_nome . "</option>";
                            }
                        ?>
                    </select>
                  </div>
                    
                   <div class="form-group required">
                    <label for="cep">CEP <sup>*</sup> </label>
                    <input required type="text" class="form-control" id="cep" name="cep" placeholder="CEP" style="width: 30%">
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
                <option value="ms" selected="select">Mato Grosso do Sul</option> 
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
                <div class="form-group">
                    <label for="referencia">Referência</label>
                    <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Referência">
                </div>
                    
                  
                  
                </div>
                
                <div class="col-lg-12 col-xs-12 clearfix">
                    <button type="submit" class="btn   btn-primary"><i class="fa fa-map-marker"></i> Salvar Endereço </button>
                </div>
                
                <?php echo form_close(); ?>
                
                
                <div class="col-lg-12 col-xs-12  clearfix ">
    
                            <ul class="pager">
                          <li class="previous pull-right"><a href="<?php echo base_url() . "index.php/site/index/"?>"> <i class="fa fa-home"></i> Home </a></li>
                          <li class="next pull-left"><a href="<?php echo base_url() . "index.php/site/index/minha_conta"?>">&larr; Minha Conta</a></li>
                          </ul>
               </div>
            
            
            
            </div><!--/row end-->
        	
       
        </div>
         <div class="col-lg-3 col-md-3 col-sm-5">
         </div>
         
         
      </div><!--/row-->
      
      

  <div style="clear:both"></div>
</div>
<!-- /wrapper --> 

<div class="gap"> </div>