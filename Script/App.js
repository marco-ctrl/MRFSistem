$(document).ready(function() {

    imagenes = document.getElementById('imagen');
    imagenes.setAttribute('src', "http://localhost/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-2Oscar.jpg");
    //$('#imagen').setAtribute('src', "http://localhost/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-2Oscar.jpg");
    
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