
$(document).ready(function () {

    var contenedor = document.getElementById('contenedor_carga');
    var condicion='';
    var codigo='';
    //Declaracion de Variables///

    ListarUsuario();

    //$("#buscarUsuario").attr("disabled", true);

    function FiltrarUsuario(buscar, filtrarNombre) {
        let plantilla = '';
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Usuario/FiltrarUsuario.php',
            type: 'POST',
            data: { buscar, filtrarNombre },
            success: function (response) {
                if (response != "no encontrado") {
                    let usuario = JSON.parse(response);

                    usuario.forEach(usuario => {
                        plantilla = MostrarTabla(plantilla, usuario);
                    });
                    $('#tb_infoUsuario').html(plantilla);
                    $('#btn_reporte').attr('disabled', false);
                }
                else {
                    let plantilla = '<tr><td colspan="8" align="center">Tabla vacia</td></tr>';
                    $('#tb_infoUsuario').html(plantilla);
                    $('#btn_reporte').attr('disabled', true);
                }
            },
            error: function (xhr, status) {
                alert('error al buscar Usuario');
            }

        });
    }


    function ListarUsuario() {//lista usuarios
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Usuario/ListarUsuario.php',
            type: 'GET',
            success: function (response) {
                //console.log(response);
                if (response != 'false') {
                    let Usuarios = JSON.parse(response);
                    let plantilla = '';
                    Usuarios.forEach(Usuarios => {
                        plantilla = MostrarTabla(plantilla, Usuarios);
                    });
                    $('#tb_infoUsuario').html(plantilla);
                }

            }
        });
    }


    function MostrarTabla(plantilla, Usuarios) {
        plantilla +=
            `<tr UserDocu="${Usuarios.pacodusu}" class="table-light">
                <td>${Usuarios.canommie} ${Usuarios.capatmie} ${Usuarios.camatmie}</td>
                <td>${Usuarios.catipusu}</td>
                <td>${Usuarios.canomusu}</td>
                <td>
                    <button class="info-Usuario btn btn-primary ver-Usuario">
                    <i class="fas fa-info-circle"></i>
                    </button>
                </td>
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

    $('#buscarUsuario').on('input', function () {//asigar codigo profesion
        var val = $('#buscarUsuario').val().toUpperCase();
        
        codigo=val;
        FiltrarUsuario(condicion, codigo);
        
    });
    
    $('#rolUsuario').change(function (e) {//asigar codigo profesion
        let tipoBusqeda = $('#rolUsuario').val();
        let filtrarNombre = $('#buscarUsuario').val();
        $('#btn_reporte').attr("disabled", false);
        if (tipoBusqeda == "TODO") {
            codigo="";
            condicion="";
            ListarUsuario();
        }
        
        if (tipoBusqeda == "ADMINISTRADOR") {
            condicion = "ADMINISTRADOR";
            FiltrarUsuario(condicion, filtrarNombre);
        }
        if (tipoBusqeda == "TESORERO") {
            condicion = "TESORERO";
            FiltrarUsuario(condicion, filtrarNombre);
        }
        if (tipoBusqeda == "SECRETARIO") {
            condicion = "SECRETARIO";
            FiltrarUsuario(condicion, filtrarNombre);
        }
        
        if (tipoBusqeda == "LIDER") {
            condicion = "LIDER";
            FiltrarUsuario(condicion, filtrarNombre);
        }
        if (tipoBusqeda == "DIRECTOR") {
            condicion = "DIRECTOR";
            FiltrarUsuario(condicion, filtrarNombre);
        }
        e.preventDefault();

    });

    $('#btn_reporte').click(function (event) {
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_InfoUsuarios.php?buscar='+condicion);
    });

    $(document).on('click', '.ver-Usuario', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodusu = $(elemento).attr('UserDocu');
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_DatosUsuario.php?pacodusu=' + pacodusu);
        
});

    function abrirNuevoTab(url) {
        // Abrir nuevo tab
        var win = window.open(url, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();
    }

});
