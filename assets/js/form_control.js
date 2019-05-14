var labelTopDefault = 40;
var labelLeftDefault = 23;
var labelSizeDefault = 1.2;
var LabelTopFocus = 22;
var LabelLeftFocus = 18;
var LabelSizeFocus = 0.9;
var AnteriorInput;

var passoEmail = 0;
var passoSenha = 0;

$(".errorfixed").hide();

$("input").keyup(function(){
    var data = $(this).data("input");
    var val = $(this).val();
    if(data == "email"){
        if(val == ""){
            blank(data, "Informe um e-mail valido");
        } else{
            checarEmail(data);
        }
    } else if(data == "senha"){
        if(val == ""){
            blank(data, "Preencha o campo senha");
        } else{
            verifica(data);
        }
    }
});

$("input").click(function(){
    var data = $(this).data("input");
    var val = $(this).val();
    if(data == "email"){
        if(val == ""){
            blank(data, "Informe um e-mail valido");
        } else{
            checarEmail(data);
        }
    } else if(data == "senha"){
        if(val == ""){
            blank(data, "Preencha o campo senha");
        } else{
            verifica(data);
        }
    }
});

$("#go").click(function(){
    var email = $("#email").val();
    var senha = $("#senha").val();
    var stateObj = { foo: "bar" };
    var error = '';
    if(passoEmail === 1 && passoSenha === 1){
    $.post("/registrando", {email: email, password: senha},
        function(data){
             if(data == "campos"){
                 $(".errorfixed").show();
                error = 'Preencha os campos';
             }
             else if(data == 'senha'){
                $(".errorfixed").show();
                 error = 'Email ou senha invalidos';
             }
             else if(data == 'sucess'){
                $(".errorfixed").hide();
                error = 'Aguarde um momento';
                history.pushState(stateObj, "Netflix", "/Browse");
                location.reload();
             }
             else if(data == 'existe'){
                $(".errorfixed").show();
                error = 'Já existe esse e-mail';
             }
             else{
                $(".errorfixed").show();
                error = 'Ocorreu algum erro';
             }
             $(".errorfixed").html(error);
         }
         , "html");
        } else{
            $(".errorfixed").show();
            error = 'E-mail está invalido ou senha é fraca demais';
            $(".errorfixed").html(error);
        }
         return false;
});

function blank(data, errorb){
    var input = "#" + data;
    var error = "#error" + data;
    $(input).css("border-bottom", "3px solid #e87c03");
    $(error).html(errorb);
    $(error).css("color", "#e87c03");
    $(input).css("border-bottom", "3px solid #e87c03");
}

function notblank(data){
    var input = "#" + data;
    var error = "#error" + data;
    $(input).css("border-bottom", "0px solid transparent");
    $(error).html("");
}

function checarEmail(data){
    var input = "#" + data;
    var error = "#error" + data;
    if( document.forms[0].email.value=="" 
       || document.forms[0].email.value.indexOf('@')==-1 
         || document.forms[0].email.value.indexOf('.')==-1 )
        {
            $(input).css("border-bottom", "3px solid #e87c03");
            $(error).css("color", "#e87c03");
            $(error).html("Insira um e-mail válido :(");
            return false;
        }
        else{
            $(input).css("border-bottom", "3px solid green");
            $(error).css("color", "green");
            $(error).html("Opa, esse e-mail é válido :)");
            passoEmail = 1;
        }
    }

    function verifica(data){
        var senhab = "#" + data;
        var senha = $(senhab).val();
        var forca = 0;
        if((senha.length >= 4) && (senha.length <= 7)){
            forca += 10;
        }else if(senha.length>7){
            forca += 25;
        }
        if(senha.match(/[a-z]+/)){
            forca += 10;
        }
        if(senha.match(/[A-Z]+/)){
            forca += 20;
        }
        if(senha.match(/d+/)){
            forca += 20;
        }
        if(senha.match(/W+/)){
            forca += 25;
        }
        var error = "#error" + data;
        if(forca < 30){
            $(error).html('Senha fraca');
            $(senhab).css("border-bottom", "3px solid #e87c03");
            $(error).css("color", "#e87c03");
        }else if((forca >= 30) && (forca < 60)){
            $(senhab).css("border-bottom", "3px solid #e87c03");
            $(error).css("color", "#e87c03");
            $(error).html('Senha fraca');
        }else if((forca >= 60) && (forca < 85)){
            $(senhab).css("border-bottom", "3px solid green");
            $(error).css("color", "green");
            $(error).html('Eba sua senha está excelente');
            passoSenha = 1;
        }else{
            $(senhab).css("border-bottom", "3px solid green");
            $(error).css("color", "green");
            $(error).html('Eba sua senha está forte');
            passoSenha = 1;
        }
    }
