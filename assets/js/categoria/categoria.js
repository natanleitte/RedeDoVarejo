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

function excluir(cat_codigo)
{
    alert("js Excluir");
    $.ajax({
        type:'POST',
        url: 'http://localhost/CodeIgniterTest2/index.php/categoria/excluir/',
        data:"cat_codigo=" + cat_codigo,
        success:function(data){
     alert('successful');
   }
 });
 alert("opa");
}