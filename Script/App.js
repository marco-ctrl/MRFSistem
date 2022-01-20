//"use strict";

window.onload = function () {
    var contenedor = document.getElementById('contenedor_carga');
    contenedor.style.visibility = 'hidden';
    contenedor.style.opacity = '0'
}

function configureLoadingScreen(screen) {
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


    $("#mn_ingresos").click(function (event) {
        $("#finanzas").load('FRM_Ingresos.php');
    });

    $("#mn_respaldo").click(function (event) {
        var pre = document.createElement('pre');
        //custom style.
        pre.style.maxHeight = "400px";
        pre.style.margin = "0";
        pre.style.padding = "24px";
        pre.style.whiteSpace = "pre-wrap";
        pre.style.textAlign = "Center";
        pre.style.fontFamily = "Arial";
        pre.appendChild(document.createTextNode($('#la').text()));

        alertify.defaults.transition = "slide";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";
        alertify.confirm('Copia de Seguridad', '<br><p>¿Desea generar una copia de seguriad de la Base de Datos?</p><br>', function () {
            abrirNuevoTab('/MRFSistem/Backups/Respaldo.php');
            alertify.success('Se generó una copia de seguridad de la Base de Datos');
        }, function () {
            alertify.error('Copia de seguridad cancelada');
        }).set({ labels: { ok: 'Aceptar', cancel: 'Cancelar' }, padding: false });

    });

    function abrirNuevoTab(url) {
        // Abrir nuevo tab
        var win = window.open(url, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();
    }

    $("#formRestaurar").on("submit", function (e) {
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formRestaurar"));
        formData.append("dato", "valor");
        $.ajax({
            url: "/MRFSistem/Backups/Descomprimir.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200';
                $("#cargando").html("Restaurando base de datos por favor espere un momento...");
            },
            complete: function() {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'hidden';
                contenedor.style.opacity = '0';
            }
        })
            .done(function (res) {
                //$("#mensaje").html("Respuesta: " + res);
                alertify.defaults.transition = "slide";
                alertify.defaults.theme.ok = "btn btn-primary";
                alertify.defaults.theme.cancel = "btn btn-danger";
                alertify.defaults.theme.input = "form-control";
                alertify.alert('Mensaje', res).set({ labels: { ok: 'Aceptar' }, padding: false });;
                $("#formRestaurar").trigger('reset');
            });
    });

    $('input').focus(function(){
        $(this).css('outline-color', 'red');
    });
});