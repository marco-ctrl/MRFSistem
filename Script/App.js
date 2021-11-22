window.onload = function(){
    var contenedor = document.getElementById('contenedor_carga');
    contenedor.style.visibility = 'hidden';
    contenedor.style.opacity = '0'
}

function configureLoadingScreen(screen){
    $(document)
        .ajaxStart(function () {
            screen.fadeIn();
        })
        .ajaxStop(function () {
            screen.fadeOut();
        });
}

$(document).ready(function () {

    var screen = $('#contenedor_carga');
    configureLoadingScreen(screen);

    
    $("#mn_ingresos").click(function(event) {
        $("#finanzas").load('FRM_Ingresos.php');
    });

    $("#mn_egresos").click(function(event) {
        $("#finanzas").load('FRM_Egresos.php');
    });

    
});