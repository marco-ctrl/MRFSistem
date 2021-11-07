$(document).ready(function () {

    ListarCurso();

    //Declaracion de Variables///
    $('#txt_buscar').keyup(function (e) {//permite hacer busqueda de cursos
        if ($('#txt_buscar').val()) {
            let buscar = $('#txt_buscar').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Curso/BuscarCurso.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cel = JSON.parse(response);

                        cel.forEach(cel => {
                            plantilla = MostrarTabla(plantilla, cel);
                        });
                        $('#tb_curso').html(plantilla);
                    }
                    else {
                        $('#tb_curso').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>El curso ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
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
            ListarCurso();
        }
    });


    function ListarCurso() {//listar Celula
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Curso/ListarCurso.php',
            type: 'GET',
            success: function (response) {
                let plantilla = '';
                if (response != "no encontrado") {
                    let celula = JSON.parse(response);
                    
                    celula.forEach(usu => {
                        plantilla = MostrarTabla(plantilla, usu);
                    });
                    $('#tb_curso').html(plantilla);
                }
                else {
                    $('#tb_curso').html(plantilla);
                }
            }
        });
    }

    function MostrarTabla(plantilla, cur) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${cur.pacodcur}" class="table-light">
                <td>${cur.canommat}</td>
                <td>${cur.caparcur}</td>
                <td>${cur.cagescur}</td>
                <td>${cur.canommie} ${cur.capatmie} ${cur.camatmie}</td>
                <td>${cur.cafecini}</td>
                <td>${cur.cadescur}</td>
                <td>
                    <button class="generarAsistencia btn btn-primary">
                    <i class="fas fa-clipboard-list"></i></button>
                </>
            </tr>`
        return plantilla;
    }
    $(document).on('click', '.generarAsistencia', function () {//elimina miembros

        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcur = $(elemento).attr('UserDocu');
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_ControlAsistencia.php?pacodcur=' + pacodcur);

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