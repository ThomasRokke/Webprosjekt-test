
// Responsiv dropdown menu funksjon

$(document).ready(function(){
    
    $(".dropdown_menu").on("click", function(){
        $("div ul").toggleClass("open");
    });
    
});