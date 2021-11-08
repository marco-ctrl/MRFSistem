$(document).ready(function () {

    //Declaracion de Variables///
    var codAlumno;

    ListarAlumno();

    $('#txt_buscarAlumno').keyup(function (e) {//permite hacer busqueda de Alumno
        console.log($('#txt_buscarAlumno').val())
        if ($('#txt_buscarAlumno').val()) {
            let buscar = $('#txt_buscarAlumno').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Alumno/BuscarAlumno.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let usuario = JSON.parse(response);

                        usuario.forEach(usuario => {
                            plantilla = MostrarTabla(plantilla, usuario);
                        });
                        $('#tb_alumnos').html(plantilla);
                    }
                    else {
                        $('#tb_alumnos').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Alumno ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
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
            ListarAlumno();
        }

    });

    function ListarAlumno() {//lista Alumnos
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Alumno/ListarAlumno.php',
            type: 'GET',
            success: function (response) {
                if (response != 'false') {
                    let miembros = JSON.parse(response);
                    let plantilla = '';
                    miembros.forEach(miembros => {
                        plantilla = MostrarTabla(plantilla, miembros);
                    });
                    $('#tb_alumnos').html(plantilla);
                }

            }
        });
    }


    function MostrarTabla(plantilla, miembros) {
        plantilla +=
            `<tr UserDocu="${miembros.pacodalu}" class="table-light">
                <td>${miembros.cacidmie}</td>
                <td>${miembros.canommie}</td>
                <td>${miembros.capatmie} ${miembros.camatmie}</td>
                <td>${miembros.cadirmie}</td>
                <td>${miembros.cacelmie}</td>
                <td>${miembros.canomcel}</td>
                <td>${miembros.cafunmie}</td>
                <td>
                    <button class="ver-alumno btn btn-primary">
                        <i class="fas fa-info-circle"></i>
                    </button>
                </td>
            </tr>`
        return plantilla;
    }

    $(document).on('click', '.ver-alumno', function () {//elimina miembros

        let elemento = $(this)[0].parentElement.parentElement;
        let pacodalu = $(elemento).attr('UserDocu');
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_InformacionAlumnos.php?pacodalu=' + pacodalu);

    });

    function abrirNuevoTab(url) {
        // Abrir nuevo tab
        var win = window.open(url, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();
    }

    function MostrarMensaje(cadena, clase) {
        let mensaje = `<div class="alert alert-dismissible alert-${clase}">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>${cadena}</strong>
              </div>`;
        $('#mensaje').html(mensaje);
        $('#mensaje').show();
    }




});