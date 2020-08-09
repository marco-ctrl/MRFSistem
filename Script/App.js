$(document).ready(function() {
    
    $("#mn_miembro").click(function(event) {
        
        $("#trabajo").load('FRM_Miembro.php');

    });

    $("#mn_celula").click(function(event) {
        
        $("#trabajo").load('FRM_Celula.php');

    });

    $("#mn_usuario").click(function(event) {
        
        $("#trabajo").load('FRM_Usuario.php');

    });

    
});