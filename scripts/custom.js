$(document).ready(function(){
    $(".btn-animate-1").click(function(){
        $(".fa-plus-circle").toggleClass("animate-1");
        $(".fa-minus-circle").removeClass("animate-2");
        $(".fa-pencil-square").removeClass("animate-3");
    });
    $(".btn-animate-2").click(function(){
        $(".fa-minus-circle").toggleClass("animate-2");
        $(".fa-plus-circle").removeClass("animate-1");
        $(".fa-pencil-square").removeClass("animate-3");
    });
    $(".btn-animate-3").click(function(){
        $(".fa-pencil-square").toggleClass("animate-3");
        $(".fa-plus-circle").removeClass("animate-1");
        $(".fa-minus-circle").removeClass("animate-2");
    });
});