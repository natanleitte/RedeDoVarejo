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

function editarProduto(input) {

    $.ajax({
        url: "../../../index.php/admin/produto/jsonProduto", //the script to call to get data
        type: "post",
        data: {var : input,
            var2: '2'
        }, //you can insert url argumnets here to pass to api.php
        dataType: "json", //data format
        success: function(data)                                     //on recieve of reply
        {
            var pro_codigo = data[0];
            var cat_codigo = data[1];
            var pro_nome = data[2];
            var pro_status = data[3];
            jQuery("#novoElemento2").append(
                    "<div class='col-lg-offset-5 col-lg-6'>" +
                    "<h4 class='section-heading'>Edição de Produto</h4>" +
                    "</div>" +
                    "<div class='row'>" +
                    "<div class='col-lg-offset3'></div>" +
                    "<div class='col-lg-offset-3 col-lg-8'>" +
                    "<div class='form-inline'>" +
                    "<input type='text' name='cat_codigo' class='form-control' value='" + cat_codigo + "' id='" + cat_codigo + "' >" +
                    "<input type='hidden' name='pro_codigo' class='form-control' value='" + pro_codigo + "' id='" + pro_codigo + "' >" +
                    "<input type='text' name='pro_nome' class='form-control' value='" + pro_nome + "' id='" + pro_nome + "' >" +
                    "<select class='form-control' name='pro_status'>"+
                        "<option value='1'>Ativo</option>"+
                        "<option value='0'>Inativo</option>"+
                    "</select>"+
                    "</div>" +
                    "<div class='form-inline'>" +
                    "<button type='submit' class='fa fa-check fa-check-2x'>&nbspSalvar</button>" +
                    "&nbsp&nbsp<input type='button' class='fa fa-times fa-times-2x' value='Cancelar' onClick='history.go(0)'> " +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
                    );//End append
        }, //End Success
        error: function() {
            alert('!Erro ao editar produto.');
        }
    });//End Ajax
}

function excluir(input)
{
    $.ajax({
        url: "../../../index.php/admin/produto/jsonProduto", //the script to call to get data
        type: "post", //tipo do envio
        data: {var : input}, //you can insert url argumnets here to pass to api.php
        dataType: "json", //data format
        success: function(data) {
            var pro_codigo = data[0];
            var cat_codigo = data[1];
            var pro_nome = data[2];
            jQuery("#novoElemento3").append(
                    "<div class='form-inline'>" +
                    "<div class='col-lg-offset-0 col-lg-6'>" +
                    "<h4 class='section-heading'>Deseja realmente excluir o produto: " + pro_nome + "</h4>" +
                    "<input type='hidden' name='cat_codigo' class='form-control' value='" + cat_codigo + "' id='" + cat_codigo + "' >" +
                    "<input type='hidden' name='pro_codigo' class='form-control' value='" + pro_codigo + "' id='" + pro_codigo + "' >" +
                    "<input type='hidden' name='pro_nome' class='form-control' value='" + pro_nome + "' id='" + pro_nome + "' >" +
                    "<button type='submit' class='fa fa-trash-o fa-check-2x'>&nbspExcluir</button>" +
                    "&nbsp&nbsp<input type='button' class='fa fa-times fa-times-2x' value='Cancelar' onClick='history.go(0)'> " +
                    "</div>" +
                    "</div>");
        }, //End Success
        error: function() {
            alert('!Erro ao excluir produto.');
        }
    });
}

function editarCategoria(input) {

    $.ajax({
        type: "post",
        url: "../../../index.php/admin/categoria/jsonCategoria", //the script to call to get data
        data: {var : input}, //you can insert url argumnets here to pass to api.php
        dataType: "json", //data format
        success: function(data)                                     //on recieve of reply
        {
            var cat_codigo = data[0];
            var cat_nome = data[1];
            var cat_status = data[2];
            jQuery("#novoElemento2").append(
                    "<div class='col-lg-offset-5 col-lg-6'>" +
                    "<h4 class='section-heading'>Edição de Categoria</h4>" +
                    "</div>" +
                    "<div class='row'>" +
                    "<div class='col-lg-offset3'></div>" +
                    "<div class='col-lg-offset-3 col-lg-9'>" +
                    "<div class='form-inline'>" +
                    "<input type='hidden' name='cat_codigo' class='form-control' value='" + cat_codigo + "' id='" + cat_codigo + "' >" +
                    "<input type='text' name='cat_nome' class='form-control' value='" + cat_nome + "' id='" + cat_nome + "' >" +
                    "<select class='form-control' name='cat_status'>"+
                        "<option value='1'>Ativo</option>"+
                        "<option value='0'>Inativo</option>"+
                    "</select>"+
                    "</div>" +
                    "<div class='form-inline'>" +
                    "<button type='submit' class='fa fa-check fa-check-2x'>&nbspSalvar</button>" +
                    "&nbsp&nbsp<input type='button' class='fa fa-times fa-times-2x' value='Cancelar' onClick='history.go(0)'> " +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
                    ); //End append
        }, //End Success
        error: function() {
            alert('!Erro ao editar categoria.');
        }

    });//End Ajax
}

function excluirCategoria(input)
{
    $.ajax({
        type: "post",
        url: "../../../index.php/admin/categoria/jsonCategoria",
        data: {var : input},
        dataType: "json",
        success: function(data) {
            var cat_codigo = data[0];
            var cat_nome = data[1];
            var cat_status = data[2];
            jQuery("#novoElemento3").append(
                    "<div class='form-inline'>" +
                    "<div class='col-lg-offset-0 col-lg-6'>" +
                    "<h4 class='section-heading'>Deseja realmente excluir a categoria: " + cat_nome + "</h4>" +
                    "<input type='hidden' name='cat_codigo' class='form-control' value='" + cat_codigo + "' id='" + cat_codigo + "' >" +
                    "<input type='hidden' name='cat_nome' class='form-control' value='" + cat_nome + "' id='" + cat_nome + "' >" +
                    "<input type='hidden' name='cat_status' class='form-control' value='" + cat_status + "' id='" + cat_status + "' >" +
                    "<button type='submit' class='fa fa-trash-o fa-check-2x'>&nbspExcluir</button>" +
                    "&nbsp&nbsp<input type='button' class='fa fa-times fa-times-2x' value='Cancelar' onClick='history.go(0)'> " +
                    "</div>" +
                    "</div>");
        }, //End Success
        error: function() {
            alert('!Erro ao excluir categoria');
        }
    });
}


function editarItem(input) {

    $.ajax({
        type: "post",
        url: "../../../index.php/admin/item/jsonItem", //the script to call to get data
        data: {var : input}, //you can insert url argumnets here to pass to api.php
        dataType: "json", //data format
        success: function(data)                                     //on recieve of reply
        {
            var item_codigo = data[0];
            var item_nome = data[1];
//            var item_status = data[2];
            var pro_codigo = data[3];
            var item_descricao = data[4];
            var tpmed_codigo = data[5];
            var item_preco_antigo = data[6];
            var item_preco_atual = data[7];
            var item_dt_promocao = data[8];
            var item_observacao = data[9];
//            var item_imagem_nome = data[10];
            var item_medida = data[11];
//            var item_novo = data[12];
//            var item_mercado = data[13];
            jQuery("#novoElemento2").append(
                    "<div class='col-lg-offset-5 col-lg-6'>" +
                        "<h4 class='section-heading'>Edição do Item</h4>" +
                    "</div>" +
                    "<div class='row'>" +
                        "<div class='col-lg-offset-1 col-lg-4'>" +
                            "<div class='form-group'>" +
                                "<input type='hidden' name='item_codigo' class='form-control' value='" + item_codigo + "' id='" + item_codigo + "' >" +
                                "<label>Nome do Item: </label>" +
                                "<input type='text' name='item_nome' class='form-control' value='" + item_nome + "' id='" + item_nome + "' >" +
                                "<label>Status do Item: </label>" +
                                "<select class='form-control' name='item_status'>"+
                                    "<option value='1'>Ativo</option>"+
                                    "<option value='0'>Inativo</option>"+
                                "</select>"+
                                "<label>Mercado:</label>" +
                                "<select class='form-control' name='item_mercado'>"+
                                        "<option value='Atacadão'>Atacadão</option>"+
                                        "<option value='Assai'>Assai</option>"+
                                        "<option value='Forte Atacadista'>Forte Atacadista</option>"+
                                "</select>" +
                                "<label>Preço Antigo do Item: </label>" +
                                "<input type='text' name='item_preco_antigo' class='form-control' value='" + item_preco_antigo + "' id='" + item_preco_antigo + "' >" +
                                "<label>Medida do produto: </label>" +
                                "<input type='text' name='item_medida' class='form-control' value='" + item_medida + "' id='" + item_medida + "' >" +
                                "<label>Descrição do Item:</label>" +
                                "<textarea name='item_descricao' cols='35' rows='4' class='form-control'  id='" + item_descricao + "' >"+ item_descricao + "</textarea>"+
                        "</div>" +
                    "</div>" +
                    "<div class='row'>" +
                        "<div class='col-lg-offset-1 col-lg-4'>" +
                                "<label>Preço Atual do Item: </label>" +
                                "<input type='text' name='item_preco_atual' class='form-control' value='" + item_preco_atual + "' id='" + item_preco_atual + "' >" +
                                "<label>Codigo do Produto:</label>" +
                                "<input type='text' name='pro_codigo' class='form-control' value='" + pro_codigo + "' id='" + pro_codigo + "' >" +
                                "<label>Código Tipo de Medida:</label>" +
                                "<input type='text' name='tpmed_codigo' class='form-control' value='" + tpmed_codigo + "' id='" + tpmed_codigo + "' >" +
                                "<label>Data da Promoção do Item:</label>" +
                                "<input type='date' name='item_dt_promocao' class='form-control' value='" + item_dt_promocao + "' id='" + item_dt_promocao + "' >" +
                                "<label>Inserir em novidade?:</label>" +
                                "<select class='form-control' name='item_novo'>"+
                                    "<option value='1'>Sim</option>"+
                                    "<option value='0'>Não</option>"+
                                "</select>" +
                                "<label>Observação do Item:</label>" +
                                "<textarea name='item_observacao' cols='35' rows='4' class='form-control'  id='" + item_observacao + "' >"+ item_observacao + "</textarea>"+
                                "<br>" +
                        "</div>" +
                    "</div>" +
                     "<div class='row'>" +
                        "<div class='col-lg-offset-3 col-lg-8'>" +
                            "<div class='form-inline'>"+
                                "<label>Alterar imagem do item (L:285 x A:380)</label>" +
                                "<input type='file' name='userfile' id='userfile' class='form-control'>"+
                                "<br>" +
                            "</div>"+
                        "</div>"+
                     "</div>"+

                                "<div class='form-inline'>" +
                                    "<button type='submit' class='fa fa-check fa-check-2x'>&nbspSalvar</button>" +
                                    "&nbsp&nbsp<input type='button' class='fa fa-times fa-times-2x' value='Cancelar' onClick='history.go(0)'> " +
                                     "<br>" +
                                     "<br>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                    "</div>"
                    ); //End append
        }, //End Success
        error: function() {
            alert('!Erro ao editar categoria.');
        }

    });//End Ajax
}



function excluirItem(input){
    $.ajax({
        type: "post",
        url: "../../../index.php/admin/item/jsonItem",
        data: {var : input},
        dataType: "json",
        success: function(data) {
            var item_codigo = data[0];
            var item_nome = data[1];
            var item_status = data[2];
            jQuery("#novoElemento3").append(
                    "<div class='form-inline'>" +
                    "<div class='col-lg-offset-0 col-lg-9'>" +
                    "<h4 class='section-heading'>Deseja realmente excluir o item: " + item_nome + "</h4>" +
                    "<input type='hidden' name='item_codigo' class='form-control' value='" + item_codigo + "' id='" + item_codigo + "' >" +
                    "<input type='hidden' name='item_nome' class='form-control' value='" + item_nome + "' id='" + item_nome + "' >" +
                    "<input type='hidden' name='item_status' class='form-control' value='" + item_status + "' id='" + item_status + "' >" +
                    "<button type='submit' class='fa fa-trash-o fa-check-2x'>&nbspExcluir</button>" +
                    "&nbsp&nbsp<input type='button' class='fa fa-times fa-times-2x' value='Cancelar' onClick='history.go(0)'> " +
                    "</div>" +
                    "</div>");
        }, //End Success
        error: function() {
            alert('!Erro ao excluir item');
        }
    });
}


function editarUsuario(input) {

    $.ajax({
        type: "post",
        url: "../../../index.php/admin/usuario/jsonUsuario", //the script to call to get data
        data: {var : input}, //you can insert url argumnets here to pass to api.php
        dataType: "json", //data format
        success: function(data)                                     //on recieve of reply
        {
            var usu_codigo = data[0];
            var usu_nome = data[1];
            var usu_sobrenome = data[2];
            var usu_login = data[3];
            var usu_cpf = data[4];
            var usu_senha = data[5];
            jQuery("#novoElemento2").append(
                    "<div class='col-lg-offset-5 col-lg-12'>" +
                    "<h4 class='section-heading'>Edição de Usuário</h4>" +
                    "</div>" +
                    "<div class='row'>" +
                    "<div class='col-lg-offset3'></div>" +
                    "<div class='col-lg-offset-0 col-lg-12'>" +
                    "<div class='form-inline'>" +
                    "<input type='hidden' name='usu_codigo' class='form-control' value='" + usu_codigo + "' id='" + usu_codigo + "' >" +
                    "<label>Nome:&nbsp</label>"+
                    "<input type='text' name='usu_nome' class='form-control' value='" + usu_nome + "' id='" + usu_nome + "' >" +
                    "<label>&nbspSobrenome:&nbsp</label>"+
                    "<input type='text' name='usu_sobrenome' class='form-control' value='" + usu_sobrenome + "' id='" + usu_sobrenome + "' >" +
                    "&nbsp&nbsp<label>Atualiaze sua senha:&nbsp</label>"+
                    "<input type='password' name='usu_senha' class='form-control' placeholder='Digite a nova senha' id='usu_senha' >" +
                    "<input type='password' name='usu_senha2' class='form-control' placeholder='Confirme a nova senha' id='usu_senha2' >" +
                    "<div class='form-inline'>" +
                    "<button type='submit' class='fa fa-check fa-check-2x'>&nbspSalvar</button>" +
                    "&nbsp&nbsp<input type='button' class='fa fa-times fa-times-2x' value='Cancelar' onClick='history.go(0)'> " +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
                    ); //End append
        }, //End Success
        error: function() {
            alert('!Erro ao editar categoria.');
        }

    });//End Ajax
}

function excluirUsuario(input){
    $.ajax({
        type: "post",
        url: "../../../index.php/admin/usuario/jsonUsuario",
        data: {var : input},
        dataType: "json",
        success: function(data) {
            var usu_codigo = data[0];
            var usu_login = data[3];
            jQuery("#novoElemento3").append(
                    "<div class='form-inline'>" +
                    "<div class='col-lg-offset-0 col-lg-9'>" +
                    "<h4 class='section-heading'>Deseja realmente excluir o usuário: " + usu_login + "</h4>" +
                    "<input type='hidden' name='usu_codigo' class='form-control' value='" + usu_codigo + "' id='" + usu_codigo + "' >" +
                    "<input type='hidden' name='usu_login' class='form-control' value='" + usu_login + "' id='" + usu_login + "' >" +
                    "<button type='submit' class='fa fa-trash-o fa-check-2x'>&nbspExcluir</button>" +
                    "&nbsp&nbsp<input type='button' class='fa fa-times fa-times-2x' value='Cancelar' onClick='history.go(0)'> " +
                    "</div>" +
                    "</div>");
        }, //End Success
        error: function() {
            alert('!Erro ao excluir usuário');
        }
    });
}