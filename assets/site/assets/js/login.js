function entrar()
{
    
    var email = jQuery("#email").val();
    var mensagem = null;

    if(email == "")
    {
        mensagem = "Email inválido<br/>";
    }
    
    if(mensagem == null)
    {
        alert("enviar");
        enviar();
    }

    var n = noty({text: mensagem}); n.setType('error');

}

function enviar()
{
    $( "#loginForm" ).submit();
}