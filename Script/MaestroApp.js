$(document).ready(function () {

    ListarMiembro();
    ListarMaestro();

    var edit = false;

    var codMaestro;
    var codMiembro;

    var corre;

    DeshabilitarFormulario();

    $('#mensaje').hide();
    $('#mensaje1').hide();
    $('#formulario').hide();

    /////eventos///////////////
    ///Buscar Miembro////////
    $('#txt_buscarMiembro').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscarMiembro').val()) {
            let buscar = $('#txt_buscarMiembro').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Miembro/BuscarMiembro.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let miembros = JSON.parse(response);

                        miembros.forEach(miembros => {
                            plantilla +=
                                `<tr codMbr="${miembros.pacodmie}" class="table-light">
                            <td>${miembros.canommie}</td> 
                            <td>${miembros.capatmie} ${miembros.camatmie}</td>
                            <td style="width:15%"><button class="agregar-miembro btn btn-primary">
                            <i class="fas fa-user-plus"></i></button></tr>`;
                        });
                        $('#tb_miembro').html(plantilla);
                    }
                    else {
                        $('#tb_miembro').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Miembro ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
                        $('#mensaje1').html(mensaje);
                        $('#mensaje1').show();
                    }
                },
                error: function (xhr, status) {
                    alert('error al buscar miembro');
                }
            });
        }
        else {
            $('#mensaje1').hide();
            ListarMiembro();
        }
    });

    /////Buscar Maestro///////////
    $('#txt_buscar').keyup(function (e) {//permite hacer busqueda de maestro
        if ($('#txt_buscar').val()) {
            let buscar = $('#txt_buscar').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Maestro/BuscarMaestro.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let usu = JSON.parse(response);

                        usu.forEach(usu => {
                            plantilla = MostrarTabla(plantilla, usu);
                        });
                        $('#tb_maestro').html(plantilla);
                    }
                    else {
                        $('#tb_maestro').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Maestro ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
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
            ListarMaestro();
        }
    });


    //////////Guardar Usuario
    $('#btn_guardar').click(function (e) {//permiete guardar Usuario
        GuardarUsuario();

        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        DeshabilitarFormulario();
        ListarMaestro();
    });

    
    /////////Dar de Baja Maestro//////////
    $(document).on('click', '.baja-maestro', function () {//elimina Maestro
        if (confirm("Seguro que desea dar de baja este Maestro")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodmae = $(elemento).attr('UserDocu');
            console.log('dando de baja...');
            $.post('/MRFSistem/AccesoDatos/Maestro/DarBaja.php',
                { pacodmae }, function (responce) {
                    if (responce == 'baja') {
                        ListarMaestro();
                        MostrarMensaje("Maestro dado de baja", "warning");
                    }

                });
        }
    });

    $(document).on('click', '.agregar-miembro', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodmie = $(elemento).attr('codMbr');
        $.post('/MRFSistem/AccesoDatos/Miembro/SingleMiembro.php',
            { pacodmie }, function (responce) {
                const miembro = JSON.parse(responce);
                miembro.forEach(miembro => {
                    codMiembro = miembro.pacodmie,
                        $('#txt_codigo').val(miembro.pacodmie),
                        $('#txt_miembro').val(miembro.canommie + ' ' + miembro.capatmie + ' ' + miembro.camatmie)
                        $('#txt_ci').val(miembro.cacidmie),
                        $('#txt_direccion').val(miembro.cadirmie),
                        $('#txt_numContacto').val(miembro.cacelmie)
                });
                
            });

    });

    /////////Cancelar Registro de Usuario//////////////
    $('#btn_cancelar').click(function (event) {
        console.log('cancelando..');
        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        DeshabilitarFormulario();
        $('#formulario').hide();
        $('#lista').show();
    });

    //////////////Registrar Nuevo Usuario///////////
    $("#btn_nuevo").click(function (event) {
        $('#lista').hide();
        $('#formulario').show();

        habilitarFormulario();
        let num = "";
        verificarSecuencia("MTR");
        if (getBan() != "true") {
            setCodigo("MTR");
            setCorrelativo(1);
        }
        else {
            setCodigo("MTR");
            obtenerCorrelativo("MTR");
            setCorrelativo(obtenerSiguinete("MTR"));
        }
        corre=getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codMaestro = getCodigo() + '-' + num;
        console.log(codMaestro);

    });

    ///////////////funciones//////////
    function MostrarMensaje(cadena, clase) {//mostrar mensaje de alerta
        let mensaje = `<div class="alert alert-dismissible alert-${clase}">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>${cadena}</strong>
              </div>`;
        $('#mensaje').html(mensaje);
        $('#mensaje').show();
    }

    function ObtenerNumeroCorrelativo(numero, num) {//sirve para obtener numero correlativo
        switch (numero.length) {
            case 1:
                num = "00000" + numero;
                break;
            case 2:
                num = "0000" + numero;
                break;
            case 3:
                num = "000" + numero;
                break;
            case 4:
                num = "00" + numero;
                break;
            case 5:
                num = "0" + numero;
                break;
            case 6:
                num = "" + numero;
                break;
            default:
                break;
        }
        return num;
    }

    ////////Listar Usuario////////
    function ListarMiembro() {//lista usuarios
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Maestro/ListarMiembro.php',
            type: 'GET',
            success: function (response) {
                let miembros = JSON.parse(response);
                let plantilla = '';
                miembros.forEach(miembros => {
                    plantilla +=
                        `<tr codMbr="${miembros.pacodmie}" class="table-light">
                        <td>${miembros.canommie}</td> 
                        <td>${miembros.capatmie} ${miembros.camatmie}</td>
                        <td style="width:15%"><button class="agregar-miembro btn btn-primary" data-dismiss="modal">
                        <i class="fas fa-user-plus "></i></button></td>
                        </tr>`;
                });
                $('#tb_miembro').html(plantilla);
            }
        });
    }

    //////Mostrar Tabla de Usuario///////////
    function MostrarTabla(plantilla, usu) {
        plantilla +=
            `<tr UserDocu="${usu.pacodmae}" class="table-light">
                <td>${usu.cacidmie}</td>
                <td>${usu.canommie}</td>
                <td>${usu.capatmie} ${usu.camatmie}</td>
                <td>${usu.cadirmie}</td>
                <td>${usu.cacelmie}</td>
                <td>
                    <button class="baja-maestro btn btn-danger">
                    <i class="fas fa-user-minus "></i></button>
                </td>
            </tr>`
        return plantilla;
    }

    ////////////Listar Maestro////////////
    function ListarMaestro() {//listar Maestro
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Maestro/ListarMaestro.php',
            type: 'GET',
            success: function (response) {
                if (response != 'false') {
                    let usuario = JSON.parse(response);
                    let plantilla = '';
                    usuario.forEach(usu => {
                        //console.log(usu.canommie);
                        plantilla = MostrarTabla(plantilla, usu);
                    });
                    $('#tb_maestro').html(plantilla);
                }

            }
        });
    }

    ////////guardar Usuario///////////////
    function GuardarUsuario() {
        const postData = {
            facodmie: codMiembro,
            pacodmae: codMaestro,
            caestmae: true
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFSistem/AccesoDatos/Maestro/AgregarMaestro.php' :
            '/MRFSistem/AccesoDatos/Maestro/ModificarMaestro.php';

        $.post(url, postData, function (response) {
            console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("MTR", corre);
                MostrarMensaje("Datos de Maestro guardados correctamente", "success");
            }
            if (edit && response == 'modificado') {
                MostrarMensaje("Datos de Maestro modificados correctamente", "success");
            }
            edit = false;
            ListarMaestro();
            ListarMiembro();
            $('#formulario').hide();
            $('#lista').show();
        });
    }



    //HabilitarFormulario
    function habilitarFormulario() {
        $("#txt_usuario").attr("disabled", false);
        $("#txt_contrasena").attr("disabled", false);
        $("#cbx_tipo").attr("disabled", false);
        $("#txt_buscarMiembro").attr("disabled", false);
        $("#btn_guardar").attr("disabled", false);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById("btn_miembro").focus();
    }

    ////////////DesHabilitar Formulario/////////////
    function DeshabilitarFormulario() {
        $("#txt_usuario").attr("disabled", true);
        $("#txt_contrasena").attr("disabled", true);
        $("#cbx_tipo").attr("disabled", true);
        $("#txt_buscarMiembro").attr("disabled", true);
        $("#btn_guardar").attr("disabled", true);
        $("#btn_nuevo").attr("disabled", false);
    }


});





