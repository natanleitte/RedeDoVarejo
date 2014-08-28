//Adiciona novo elemento    
function adicionar()
{
    var id = jQuery("#qtdElementos").val();
    id++;
    jQuery("#qtdElementos").val(id);

    jQuery("#novoElemento").append("<div class='row'> <div class='col-lg-offset-3 col-lg-6'> <div class='form-group'>" +
            "<label for='cat_nome" + id + "'>Nome da categoria</label>" +
            "<div class='form-inline'>" +
            "<input type='text' name='cat_nome" + id + "' class='form-control' placeholder='Nome da Categoria' id='cat_nome" + id + "' >" +
            "&nbsp <input type='checkbox' checked='checked' name='cat_status" + id + "' id='cat_status" + id + "' /> Ativo" +
            "</div>" +
            "</div> </div> </div>");
}

function adicionarProduto()
{
    var id = jQuery("#qtdElementos").val();
    id++;
    jQuery("#qtdElementos").val(id);

    jQuery("#novoElemento").append(
            "<div class='row'>" +
            "<div class='col-lg-offset-2'></div>" +
            "<div class='col-lg-offset-3 col-lg-6'>" +
            "<div class='form-group'>" +
            "<div class='form-inline'>" +
            "<label for='pro_nome" + id + "'>Nome do Produto</label>" +
            "<input type='text' name='pro_nome" + id + "' class='form-control' placeholder='Produto' id='pro_nome" + id + "' >" +
            "<input type='checkbox' checked='checked' name='pro_status" + id + "' id='pro_status" + id + "' /> Ativo" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>");
}

function Teste() 
  {
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({                                      
      url: 'api.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
      dataType: 'json',                //data format
      success: function(data)          //on recieve of reply
      {
        var id = data[0];              //get id
        var vname = data[1];           //get name
        //--------------------------------------------------------------------
        // 3) Update html content
        //--------------------------------------------------------------------
        
        jQuery("#novoElemento2").append("");
        
        //$('#output').html("<b>id: </b>"+id+"<b> name: </b>"+vname); //Set output element html
        //recommend reading up on jquery selectors they are awesome 
        // http://api.jquery.com/category/selectors/
      } 
    });
  }
  
function editarProduto(pro_codigo) {
    
//    $.ajax({
//        url: "application/models/editaProduto.php",         //the script to call to get data          
////        data: "",                                              //you can insert url argumnets here to pass to api.php
//        dataType: "json",                                   //data format
//        success:
        $.getJSON('/../projects/RedeDoVarejo/application/models/editaProduto.php', function(data)                             //on recieve of reply
        {
            alert("Deu certo! ");
            alert(data[0]);
        });
//            var nome = data[0];
//            jQuery("#novoElemento2").append(
//            "<div class='col-lg-offset-5 col-lg-6'>"+
//                "<h4 class='section-heading'>Edição de Produto</h4>"+
//            "</div>"+
//            "<div class='row'>"+
//                "<div class='col-lg-offset3'></div>"+
//                    "<div class='col-lg-offset-3 col-lg-12'>"+
//                        "<div class='form-inline'>"+
//                            "<select class='form-control' name='cat_codigo'>"+
//                            "<?php"+
//                                "foreach ($query1->result() as $row) {"+
//                                    "echo '<option value=' . $row->cat_codigo . '>' . $row->cat_nome . '</option>';"+
//                                "}"+
//                                "?>"+
//                            "</select>"+
//                            "<input type='text' name='"+nome+"' class='form-control' value='"+nome+"' id='"+nome+"' >" +
//                            "<input type='text' name='"+nome+"' class='form-control' value='"+nome+"' id='"+nome+"' >" +
//                        "</div>"+
//                        "<div class='form-inline'>"+
//                            "<i class='fa fa-check fa-check-2x'>&nbspSalvar</i>" +
//                            "&nbsp&nbsp<i class='fa fa-times fa-times-2x'>&nbspCancelar</i>" +
//                        "</div>"+
//                    "</div>"+
//                "</div>"+
//            "</div>"
//            );//End append
//        }//End Success
//    });//End Ajax
    
    jQuery("#novoElemento2").append(pro_codigo);
}

function excluir(pro_codigo)
{
    //alert("js Excluir");
    $.ajax({
        type: 'POST',
        url: 'http://localhost/CodeIgniterTest2/index.php/produto/produto/',
        data: "pro_codigo=" + pro_codigo,
        success: function(data) {
            alert('successful');
        }
    });
    //alert("opa");
}