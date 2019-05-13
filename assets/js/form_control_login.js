var labelTopDefault = 40;
var labelLeftDefault = 23;
var labelSizeDefault = 1.2;
var LabelTopFocus = 22;
var LabelLeftFocus = 18;
var LabelSizeFocus = 0.9;
var AnteriorInput;

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
            notblank(data);
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
            notblank(data);
        }
    }
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
    $(input).css("border-bottom", "3px solid green");
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
            $(error).html("");
        }
    }