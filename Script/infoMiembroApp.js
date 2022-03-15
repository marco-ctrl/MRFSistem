
$(document).ready(function () {

    var contenedor = document.getElementById('contenedor_carga');
    var condicion='';
    var codigo='';
    //Declaracion de Variables///

    ListarMiembro();

    $("#buscarMiembro").attr("disabled", true);

    function BuscarMiembro(buscar, condicion) {
        let plantilla = '';
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Miembro/BuscarMiembro.php',
            type: 'POST',
            data: { buscar, condicion },
            success: function (response) {
                if (response != "no encontrado") {
                    let usuario = JSON.parse(response);

                    usuario.forEach(usuario => {
                        plantilla = MostrarTabla(plantilla, usuario);
                    });
                    $('#tb_infoMiembro').html(plantilla);
                    $('#btn_reporte').attr('disabled', false);
                }
                else {
                    let plantilla = '<tr><td colspan="8" align="center">Tabla vacia</td></tr>';
                    $('#tb_infoMiembro').html(plantilla);
                    $('#btn_reporte').attr('disabled', true);
                }
            },
            error: function (xhr, status) {
                alert('error al buscar miembro');
            }

        });
    }


    function ListarMiembro() {//lista usuarios
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Miembro/ListarMiembro.php',
            type: 'GET',
            success: function (response) {
                //console.log(response);
                if (response != 'false') {
                    let miembros = JSON.parse(response);
                    let plantilla = '';
                    miembros.forEach(miembros => {
                        plantilla = MostrarTabla(plantilla, miembros);
                    });
                    $('#tb_infoMiembro').html(plantilla);
                }

            }
        });
    }


    function MostrarTabla(plantilla, miembros) {
        let extencion = '';
        if (miembros.cacidext != "") {
            extencion = "-" + miembros.cacidext;
        }
        //console.log(miembros.cacidext);
        plantilla +=
            `<tr UserDocu="${miembros.pacodmie}" class="table-light">
                <td>${miembros.cacidmie}${extencion}</td>
                <td>${miembros.canommie}</td>
                <td>${miembros.capatmie} ${miembros.camatmie}</td>
                <td>${miembros.cacelmie}</td>
                <td>${miembros.canompro}</td>
                <td>${miembros.canomcel}</td>
                <td>${miembros.cafunmie}</td>
                <td>
                    <button class="info-miembro btn btn-primary ver-miembro">
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


    function ListarProfesion() {//listar profesion
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Profesion/ListarProfesion.php',
            type: 'GET',
            success: function (response) {
                let profesion = JSON.parse(response);
                let plantilla = '';
                profesion.forEach(profesion => {
                    plantilla += `<option data-codigo="${profesion.pacodpro}" data-nombre="${profesion.canompro}" value="${profesion.canompro}"></option>`;
                });
                $('#dat_buscar').html(plantilla);
            }
        });
    }

    function ListarCelula() {//listar Celula
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Celula/ListarCelula.php',
            type: 'GET',
            success: function (response) {
                let celula = JSON.parse(response);
                let plantilla = '';
                celula.forEach(celula => {
                    plantilla += `<option data-codigo="${celula.pacodcel}" data-nombre="${celula.canomcel}" value="${celula.canomcel}"></option>`;
                });
                $('#dat_buscar').html(plantilla);
            }
        });
    }

    function funcionMiembro() {
        let plantilla = `<option data-codigo="DISCIPULO/A" value='DISCIPULO/A'>DISCIPULO/A</option>
        <option data-codigo="ASISTENTE" value="ASISTENTE">ASISTENTE</option>
        <option data-codigo="ANFITRION" value="ANFITRION">ANFITRION</option>
        <option data-codigo="LIDER" value="LIDER">LIDER</option>
        <option data-codigo="PASTOR/A" value="PASTOR/A">PASTOR/A</option>`;
        $('#dat_buscar').html(plantilla);
    }


    $('#buscarMiembro').on('input', function () {//asigar codigo profesion
        var val = $('#buscarMiembro').val().toUpperCase();
        codigo = $('#dat_buscar').find('option[value="' + val + '"]').data('codigo');
        var nombre = $('#dat_buscar').find('option[value="' + val + '"]').data('nombre');
        let tipo= $('#tipoBusqueda').val();

        let plantilla = '<tr><td colspan="8" align="center">Tabla vacia</td></tr>';

        if (codigo === undefined) {
            $('#tb_infoMiembro').html(plantilla);
            $('#btn_reporte').attr('disabled', true);
            console.log("EmpName no está definido");
            //nomPro = val;
        } else {

            BuscarMiembro(codigo, condicion);
            console.log("EmpName está definido");

        }

        if (tipo=="NOMBRE" || tipo=="APELLIDO PATERNO" || tipo=="APELLIDO MATERNO"){
            codigo=val;
            BuscarMiembro(codigo, condicion);
        }
        
    });

    $('#tipoBusqueda').change(function (e) {//asigar codigo profesion
        $('#dat_buscar').html('');
        let tipoBusqeda = $('#tipoBusqueda').val();
        $('#btn_reporte').attr("disabled", false);
        if (tipoBusqeda == "TODO") {
            $('#dat_buscar').html('');
            $("#buscarMiembro").attr("disabled", true);
            $("#buscarMiembro").val('');
            codigo="";
            condicion="";
            ListarMiembro();
        }
        else {
            $("#buscarMiembro").attr("disabled", false);
        }
        if (tipoBusqeda == "NOMBRE") {
            condicion = "canommie";
        }
        if (tipoBusqeda == "APELLIDO PATERNO") {
            condicion = "capatmie";
        }
        if (tipoBusqeda == "APELLIDO MATERNO") {
            condicion = "camatmie";
        }
        
        if (tipoBusqeda == "PROFESION") {
            condicion = "pacodpro";
            ListarProfesion();
        }
        if (tipoBusqeda == "CELULA") {
            condicion = "pacodcel";
            ListarCelula();
        }
        if (tipoBusqeda == "FUNCION") {
            condicion = "cafunmie";
            funcionMiembro();
        }
        e.preventDefault();

    });

    $('#btn_reporte').click(function (event) {
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_InfoMiembro.php?buscar='+codigo+'&condicion='+condicion);
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
