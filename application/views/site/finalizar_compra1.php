<script type="text/javascript">
    $(document).ready(function(){
	$("#cep").mask("99999-999");
});
</script>

<?php
       $totalCompra = 0;
       foreach ($this->cart->contents() as $item) {
           $totalCompra += ($item['price'] * $item['qty']);
       }
?>


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
    
  
    
    <!--/.row-->
      <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Finalizar Compra</span></h1>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
      <h4 class="caps"><a href="category.html"><i class="fa fa-chevron-left"></i> Continuar Comprando </a></h4>
    </div>
  </div> <!--/.row-->
  
  <div class="row">
    <div class="w100 clearfix">
        
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><strong>Endereço Atual</strong></h3>
              </div>
              <div class="panel-body">
                <ul >
                <?php
                foreach ($endereco->result() as $end) {
                    echo "<li> <span class='address-name'> <strong>Endereço: </strong>" . $end->end_logradouro
                            . ", " . $end->end_numero . ", " . $end->end_bairro . "</span></li>";
                    echo "<li> <span class='address-name'> <strong>CEP: </strong>" . $end->end_cep . "</span></li>";
                    echo "<li> <span class='address-name'> <strong>Cidade: </strong>" . $end->end_cidade . "</span></li>";
                    echo "<li> <span class='address-name'> <strong>Estado: </strong>" . $end->end_uf . "</span></li>";

////                    <li> <span class="address-company"> TanimDesign & Development </span></li>
//                    echo "<li> <span class='address-line1'>" Gulshan 2 , Road 50, House FO12EO </span></li>";
//                  <li> <span class="address-line2"> Dhaka, Bangladesh </span></li>
//                  <li> <span> <strong>Mobile</strong> : 01670531352 </span></li>
//                  <li> <span> <strong>Phone</strong> : 020904 - 85882 </span></li>
        
                }
                ?>
                  
                  
                </ul>
              </div>
              <div class="panel-footer panel-footer-address"> <a href="add-address.html" class="btn btn-sm btn-success"> <i class="fa fa-edit"> </i> Edit </a> <a class="btn btn-sm btn-danger"> <i class="fa fa-minus-circle"></i> Delete </a> </div>
            </div>
          </div>
    </div>
</div>
  
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
                    
                  <div class="form-group">
                    <label for="observacao">Observação</label>
                    <textarea rows="3" cols="26" name="InputAdditionalInformation" class="form-control" id="observacao" name="observacao"></textarea>
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
<!--            <tr >
              <td>Total</td>
              <td class = "price" > R$ <?php echo $totalCompra ?></td>
            </tr>-->
            <tr  style="">
              <td>Frete</td>
              <td class="price" ><span class="success">À calcular!</span></td>
            </tr>
<!--            <tr class="cart-total-price ">
              <td>Total (tax excl.)</td>
              <td class="price" >$216.51</td>
            </tr>
            <tr >
              <td>Total tax</td>
              <td class="price" id="total-tax">$0.00</td>
            </tr>-->
            <tr >
              <td > Total </td>
              <td class=" site-color" id="total-price">R$ <?php echo $totalCompra ?></td>
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