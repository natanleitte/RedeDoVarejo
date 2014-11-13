
<!-- /.Fixed navbar  -->

<div class="container main-container headerOffset">
  <div class="row innerPage">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
          <h1 class=" text-left border-title"> Categorias </h1>
            <?php
                                    foreach ($categorias->result() as $categoria) {
                                        if($categoria->cat_status == 1)
                                        {
                                        echo "<ul class='col-lg-3  col-sm-3 col-md-3 unstyled'>";
                                        
                                        echo "<li>";
                                        echo "<p> <strong>" . $categoria->cat_nome . "</strong> </p>";
                                        echo "</li>";
                                        $count = 0;
                                        foreach ($produtos->result() as $produto) {
                                            if($produto->pro_status == 1)
                                            {
                                            //se o produto pertencer a categoria
                                            if ($produto->cat_codigo == $categoria->cat_codigo) {
                                                echo "<li><i class='fa fa-check'></i> <a href='" . base_url() . 'index.php/site/index/produto' . "/?pro_codigo=" . $produto->pro_codigo . "'>". $produto->pro_nome . "</a> </li>";
                                                //limita o número de produtos apresentados
                                            }
                                            }
                                        }
//                                       
                                        echo "</ul>";
                                        }
                                    }
                                    ?>
       
          </div>
        </div>
      </div>
      <!--/row end--> 
      
    </div>
  </div>
  <!--/row-->
  
  <div style="clear:both"> </div>
</div>

<!-- /wrapper -->

<div class="gap"> </div>