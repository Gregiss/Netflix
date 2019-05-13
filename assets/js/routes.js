var actualhref = window.location.href;

$("a").click(function(){
    actualhref = window.location.href;
    var domain = 'http://localhost/';
    var href = domain + $(this).data("href");
    var nextPage = $(this).data("href");
    var stateObj = { foo: "bar" };
    if(nextPage == ""){
        return false;
    } else{
    history.pushState(stateObj, "Netflix", href);
    navigate(nextPage, actualhref);
    }
});

function navigate(navegar, atual){
    
}