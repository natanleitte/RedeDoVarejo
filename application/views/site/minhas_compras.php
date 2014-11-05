<!-- /.Fixed navbar  --> 
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="index.html">Home</a> </li>
        <li> <a href="account.html">My Account</a> </li>
        <li class="active"> Order List </li>
      </ul>
    </div>
  </div>
  
  
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> Minhas Compras </span></h1>
      <div class="row userInfo">
        <div class="col-lg-12">
          <!--<h2 class="block-title-2"> Your Order List  </h2>-->
        </div>
        
        <div class="col-xs-12 col-sm-12">
          <table class="footable">
            <thead>
              <tr>
                <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">ID</span> </th>
                <th data-hide="default"> Total </th>
                <th data-hide="default" data-type="numeric"> Data </th>
                <th data-hide="phone" data-type="numeric"> Status Pagamento </th>
                <th data-hide="phone" data-type="numeric"> Status Entrega </th>

              </tr>
            </thead>
            <tbody>
                <?php 
                foreach($compras->result() as $compra)
                {
                                       
                    echo "<tr>";
                    echo "<td><a href=" . base_url() . "index.php/site/index/compra/?com_codigo=" . $compra->com_codigo . ">#" . $compra->com_codigo . "</a></td>";
                    echo "<td>".  number_format($compra->com_valor_total, 2, ',', '.') . "</td>";
                    $date = new DateTime($compra->com_data);
                    echo "<td data-value='78025368997'>" . $date->format('d-m-Y H:i:s') . "</td>";
                    //Pagamento
                    if($compra->pag_codigo == 1)
                    {
                        echo "<td data-value='3'><span class='label label-primary'>Aguardando pagamento</span></td>";

                    }
                    else if($compra->pag_codigo == 2)
                    {
                       echo "<td data-value='3'><span class='label label-success'>Paga</span></td>"; 
                    }
                    else
                    {
                       echo "<td data-value='3'><span class='label label-danger'>Cancelada</span></td>";
                    }
                    //Entrega
                    if($compra->ent_codigo == 1)
                    {
                        echo "<td data-value='3'><span class='label label-primary'>À entregar</span></td>";
                    }
                    else if($compra->ent_codigo == 2)
                    {
                       echo "<td data-value='3'><span class='label label-default'>Em trânsito</span></td>"; 
                    }
                    else
                    {
                       echo "<td data-value='3'><span class='label label-success'>Entregue</span></td>"; 
                    }
                                        
                    echo "</tr>";
                    
                }
                ?>

            </tbody>
          </table>
        </div>
        
        <div class="col-lg-12 clearfix">
          <ul class="pager">
            <li class="previous pull-right"><a href="<?php echo base_url() . "index.php/site/index/" ?>"> <i class="fa fa-home"></i> Home </a></li>
            <li class="next pull-left"><a href="<?php echo base_url() . "index.php/site/index/minha_conta" ?>"> &larr; Voltar para Minha Conta</a></li>
          </ul>
        </div>
      </div>
      <!--/row end--> 
      
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div>
  <!--/row-->
  
  <div style="clear:both"></div>
</div>
<!-- /main-container -->

<div class="gap"> </div>