$(document).ready(function () {

    
    ListarContenido();

    
    $('#txt_buscarMat').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscarMat').val()) {
            let buscar = $('#txt_buscarMat').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Contenido/BuscarContenido.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cel = JSON.parse(response);

                        cel.forEach(cel => {
                            plantilla = MostrarTabla(plantilla, cel);
                        });
                        $('#tb_contenido').html(plantilla);
                    }
                    else {
                        $('#tb_contenido').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>La Materia ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
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
            ListarContenido();
        }
    });

    function ListarContenido() {//listar Contenido
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Contenido/ListarContenido.php',
            type: 'GET',
            success: function (response) {
                let contenido = JSON.parse(response);
                let plantilla = '';
                console.log(contenido);
                contenido.forEach(con => {
                    plantilla = MostrarTabla(plantilla, con);
                });
                $('#tb_contenido').html(plantilla);
            }
        });
    }

    function MostrarTabla(plantilla, usu) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${usu.pacodcon}" class="table-light">
                <td>${usu.pacodcon}</td>
                <td>${usu.canommat}</td>
                <td>${usu.cadescon}</td>
            </tr>`
        return plantilla;
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

