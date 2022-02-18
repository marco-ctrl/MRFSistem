
$(document).ready(function () {

    //Definicion de Variables//
    var codCelula;
    var codBarrio;
    var codCalle;
    var latitud;
    var longitud;
    var edit = false;
    var corre1;
    var addBarrio = false;
    var addCalle = false;
    var nomBarrio;
    var nomCalle;

    //Listar Datos//
    ListarCelula();
    
    
    $('#buscarCelula').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#buscarCelula').val()) {
            let buscar = $('#buscarCelula').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Celula/BuscarCelula.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cel = JSON.parse(response);

                        cel.forEach(cel => {
                            plantilla = MostrarTabla(plantilla, cel);
                        });
                        $('#tb_celula').html(plantilla);
                    }
                    else {
                        $('#tb_celula').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>La Celula ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
                        $('#mensaje').html(mensaje);
                        $('#mensaje').show();
                    }
                },
                error: function (xhr, status) {
                    alert('error al buscar miembro');
                }
            });
        }
        else {
            $('#mensaje').hide();
            ListarCelula();
        }
    });


    
    

    

    
    //Funciones//////
    function ListarCelula() {//listar Celula
        $.ajax({
            url: '/MRFSistem/AccesoDatos/MieCel/ListarCelulaLider.php',
            type: 'GET',
            beforeSend: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200';
            },
            complete: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'hidden';
                contenedor.style.opacity = '0';
            },
            success: function (response) {
                let celula = JSON.parse(response);
                let plantilla = '';
                celula.forEach(usu => {
                    plantilla = MostrarTabla(plantilla, usu);
                });
                $('#tb_infoCelula').html(plantilla);
            }
        });
    }

    function MostrarTabla(plantilla, usu) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${usu.pacodcel}" class="table-light">
                <td>${usu.canomcel}</td>
                <td>${usu.canumcel}</td>
                <td>B/${usu.canombar} C/${usu.canomcal}</td>
                <td>${usu.canommie} ${usu.capatmie} ${usu.camatmie}</td>
                <td>${usu.cacelmie}</td>
                <td>
                    <button class="ver-celula btn btn-primary" title="Modificar Celula">
                    <i class="fas fa-info-circle"></i></button>
                </td>
                
            </tr>`
        return plantilla;
    }

    $('#btn_reporte').click(function (event) {
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_InfoCelula.php');
    });

    $(document).on('click', '.ver-miembro', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodmie = $(elemento).attr('UserDocu');
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_DatosPersonalMiembro.php?pacodmie='+pacodmie);
    });

    function abrirNuevoTab(url) {
        // Abrir nuevo tab
        var win = window.open(url, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();
    }
    

    
});