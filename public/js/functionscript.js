$(document).ready(function(){
    $("#show-menu, #menu-panel").hover(function(){
        $("#menu-panel").slideDown(100);
    },function(){
        $("#menu-panel").slideUp(100);
    });

    $('#datepicker').datepicker({
        inline: true,
        beforeShow:false,
        showAnim: "fold",
        dateFormat: "dd-mm-yy"
    });

});