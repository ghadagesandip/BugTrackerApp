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

    if($(".table").length){
        if($(this).find("tbody").find("tr").length==0){
           $(this).find("tbody").html("<tr><td colspan='12' class='text-center'><span class='label label-info'>No records found</span></td></tr>");
        }
    }

});