$(document).ready(function(){
    $("#show-menu, #menu-panel").hover(function(){
        $("#menu-panel").slideDown(100);
    },function(){
        $("#menu-panel").slideUp(100);
    });

});