
<!-- /.Fixed navbar  -->

<div class="container main-container headerOffset">
    <div class="row innerPage">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <h1 class=" text-left border-title"> Categorias </h1>
                    <?php
                    echo "<ul class='col-lg-3  col-sm-3 col-md-3 unstyled'>";
                    echo "<li>";
                    echo "<p> <strong> Região </strong> </p>";
                    echo "</li>";
                    foreach ($bairro->result() as $row) {
                        echo "<li>"
                        . "<i class='fa fa-check'></i>" . $row->bairro_nome . " " . 'R$' . number_format($row->bairro_valor, 2, ',', '.') . "</a> </li>";
                    }
                    echo "</ul>";
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