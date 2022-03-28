

$(document).ready(function () {

    ListarMiembro();
    ListarUsuario();

    let edit = false;

    let codUsuario;
    let codMiembro;

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
            let condicion = 'canommie';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Miembro/BuscarMiembro.php',
                type: 'POST',
                data: { buscar, condicion },
                success: function (response) {
                    let plantilla = '';
                    if (response != "no encontrado") {
                        let miembros = JSON.parse(response);
                        
                        miembros.forEach(miembros => {
                            plantilla = MostrarTablaMiembro(miembros, plantilla);
                                
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

    /////Buscar Usuarios///////////
    $('#buscarUsuario').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#buscarUsuario').val()) {
            let buscar = $('#buscarUsuario').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Usuario/BuscarUsuario.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let usu = JSON.parse(response);

                        usu.forEach(usu => {
                            plantilla = MostrarTabla(plantilla, usu);
                        });
                        $('#tb_usuario').html(plantilla);
                    }
                    else {
                        $('#tb_usuario').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Usuario ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
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
            ListarUsuario();
        }
    });


    //////////Guardar Usuario
    $('#btn_guardar').click(function (e) {//permiete guardar Usuario
        GuardarUsuario();

        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        DeshabilitarFormulario();
        ListarUsuario();
    });

    //////Modificar Usuario///////////
    $(document).on('click', '.modificar-usuario', function () {//modifica usuario

        habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodusu = $(elemento).attr('UserDocu');
        $.post('/MRFSistem/AccesoDatos/Usuario/SingleUsuario.php',
            { pacodusu }, function (responce) {
                $('#lista').hide();
                $('#formulario').show();
                $("#cbx_tipo").attr("disabled", false);

                const miembro = JSON.parse(responce);
                miembro.forEach(miembro => {
                    codMiembro = miembro.facodmie,
                        codUsuario = miembro.pacodusu,
                        $('#txt_codigo').val(miembro.facodmie),
                        $('#cbx_tipo').val(miembro.catipusu),
                        $('#txt_usuario').val(miembro.canomusu),
                        $('#txt_contrasena').val(generarContrasena(8, '')),
                        $('#txt_miembro').val(miembro.canommie + ' ' + miembro.capatmie + ' ' + miembro.camatmie)
                });
                //contex.hide();
                camposVaciosUsuario();
                edit = true;
            });
    });

    /////////Dar de Baja Usuario//////////
    $(document).on('click', '.baja-usuario', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja este Usuario")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodusu = $(elemento).attr('UserDocu');
            console.log('dando de baja...');
            $.post('/MRFSistem/AccesoDatos/Usuario/DarBaja.php',
                { pacodusu }, function (responce) {
                    if (responce == 'baja') {
                        ListarUsuario();
                        MostrarMensaje("Usuario dado de baja", "warning");
                    }

                });
        }
    });

    $(document).on('click', '.agregar-miembro', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodmie = $(elemento).attr('codMbr');
        $.post('/MRFSistem/AccesoDatos/Miembro/SingleMiembro.php',
            { pacodmie }, function (responce) {
                //console.log(responce);
                const miembro = JSON.parse(responce);
                miembro.forEach(miembro => {
                    codMiembro = miembro.pacodmie,
                        $('#txt_codigo').val(miembro.pacodmie),
                        $('#txt_miembro').val(miembro.canommie + ' ' + miembro.capatmie + ' ' + miembro.camatmie)
                });
                $("#cbx_tipo").attr("disabled", false);
                camposVaciosUsuario();
                generarUsuario();
                document.getElementById("cbx_tipo").focus();
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
        $('html, body').animate({ scrollTop: 0 }, 'slow'); //seleccionamos etiquetas,clase o identificador destino, creamos animación hacia top de la página.
        return false;
    });

    //////////////Registrar Nuevo Usuario///////////
    $("#btn_nuevo").click(function (event) {
        $('#lista').hide();
        $('#formulario').show();
        camposVaciosUsuario();
        habilitarFormulario();
        let num = "";
        verificarSecuencia("USU");
        if (getBan() != "true") {
            setCodigo("USU");
            setCorrelativo(1);
        }
        else {
            setCodigo("USU");
            obtenerCorrelativo("USU");
            setCorrelativo(obtenerSiguinete("USU"));
        }
        corre = getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codUsuario = getCodigo() + '-' + num;
        console.log(codUsuario);

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
            url: '/MRFSistem/AccesoDatos/Miembro/ListarMiembro.php',
            type: 'GET',
            success: function (response) {
                let miembros = JSON.parse(response);
                let plantilla = '';
                miembros.forEach(miembros => {
                    plantilla = MostrarTablaMiembro(miembros, plantilla);
                });
                $('#tb_miembro').html(plantilla);
            }
        });
    }

    function MostrarTablaMiembro(miembros, plantilla) {
        if (miembros.cafunmie == "LIDER"){
            plantilla +=
            `<tr codMbr="${miembros.pacodmie}" class="table-light">
                        <td>${miembros.canommie}</td> 
                        <td>${miembros.capatmie} ${miembros.camatmie}</td>
                        <td>${miembros.cafunmie}</td>
                        <td style="width:15%"><button class="agregar-miembro btn btn-primary" data-dismiss="modal">
                        <i class="fas fa-user-plus "></i></button></td>
                        </tr>`;
        }
        
        return plantilla;
    }

    //////Mostrar Tabla de Usuario///////////
    function MostrarTabla(plantilla, usu) {
        plantilla +=
            `<tr UserDocu="${usu.pacodusu}" class="table-light">
                <td>${usu.canommie} ${usu.capatmie} ${usu.camatmie}</td>
                <td>${usu.catipusu}</td>
                <td>${usu.canomusu}</td>
                <td>
                    <button class="baja-usuario btn btn-danger">
                    <i class="fas fa-user-minus"></i></button>
                </td>
                <td style="width:15%">
                    <button class="modificar-usuario btn btn-secondary">
                    <i class="fas fa-user-edit"></i></button>
                </td>
            </tr>`
        return plantilla;
    }

    ////////////Listar Usuario////////////
    function ListarUsuario() {//listar Usuario
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Usuario/ListarUsuario.php',
            type: 'GET',
            beforeSend: function () {
                /*var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200'*/
            },
            success: function (response) {
                if (response != 'false') {
                    let usuario = JSON.parse(response);
                    let plantilla = '';
                    usuario.forEach(usu => {
                        //console.log(usu.canommie);
                        plantilla = MostrarTabla(plantilla, usu);
                    });
                    $('#tb_usuario').html(plantilla);
                }

            }
        });
    }

    ////////guardar Usuario///////////////
    function GuardarUsuario() {
        let nombreMiembro = $('#txt_miembro').val();
        let rolUsuario = $('#cbx_tipo').val();
        let nombreUsuario = $('#txt_usuario').val();
        let password = $('#txt_contrasena').val();
        const postData = {
            facodmie: codMiembro,
            pacodusu: codUsuario,
            catipusu: $('#cbx_tipo').val(),
            canomusu: $('#txt_usuario').val(),
            caconusu: $('#txt_contrasena').val(),
            caestusu: true
        };
        //console.log(postData);
        let URL = edit === false ?
            '/MRFSistem/AccesoDatos/Usuario/AgregarUsuario.php' :
            '/MRFSistem/AccesoDatos/Usuario/ModificarUsuario.php';

        $.ajax({
            url: URL,
            type: 'POST',
            data: postData,
            beforeSend: function () {
                $("#btn_guardar").text("Guardando...");
                $("#btn_guardar").attr("disabled", true);
            },
            complete: function () {
                $("#btn_guardar").text("Guardar");
                $("#btn_guardar").attr("disabled", false);
            },
            success: function (response) {
                console.log(response);
                if (!edit && response == 'registra') {
                    actualizarSecuencia("USU", corre);
                    alertify.alert('Mensaje', 'Datos de Usuario guardados correctamente', function () { alertify.success('Se guardó correctamente'); });

                }
                if (edit && response == 'modificado') {
                    alertify.alert('Mensaje', 'Datos de Usuarios modificados correctamente', function () { alertify.success('Se guardó correctamente'); });

                }
                abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_Usuario.php?nombre=' + nombreMiembro + '&rol=' + rolUsuario + '&codigo=' + codUsuario + '&usuario=' + nombreUsuario + '&pass=' + password);

                edit = false;
                ListarUsuario();
                $('#formulario').hide();
                $('#lista').show();
            }

        });
    }



    //HabilitarFormulario
    function habilitarFormulario() {
        $("#txt_usuario").attr("disabled", false);
        $("#txt_contrasena").attr("disabled", false);
        //
        $("#txt_buscarMiembro").attr("disabled", false);
        //$("#btn_guardar").attr("disabled", false);
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

    function camposVaciosUsuario() {//validacion de campos vacios formulario usuario
        let codigoMiembro = $("#txt_codigo").val();
        let tipoUsuario = $("#cbx_tipo").val();
        let contador = 0;
        console.log(codigoMiembro);
        if (codigoMiembro == '') {
            $("#div_miembro").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#val_miembro").html("Selecciona un miembro");

            $("#div_codigo").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_codigo").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_codigo").html('<i class="fas fa-exclamation-triangle"></i>');

            $("#div_nomMiembro").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_nomMiembro").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_nomMiembro").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {
            $("#div_miembro").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_miembro").html("");

            $("#div_codigo").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#chk_codigo").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_codigo").html('<i class="fas fa-check"></i>');

            $("#div_nomMiembro").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#chk_nomMiembro").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_nomMiembro").html('<i class="fas fa-check"></i>');
            //console.log('corecto');
        }
        if (tipoUsuario == '0') {
            $("#div_tipo").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#val_tipo").html("Selecciona un rol de Usuario");
            $("#chk_tipo").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_tipo").html('<i class="fas fa-exclamation-triangle"></i>');

            $("#div_usuario").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_usuario").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_usuario").html('<i class="fas fa-exclamation-triangle"></i>');

            $("#div_contrasena").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_contrasena").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_contrasena").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {
            $("#div_tipo").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_tipo").html("");
            $("#chk_tipo").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_tipo").html('<i class="fas fa-check"></i>');

            $("#div_usuario").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#chk_usuario").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_usuario").html('<i class="fas fa-check"></i>');

            $("#div_contrasena").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#chk_contrasena").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_contrasena").html('<i class="fas fa-check"></i>');
            //console.log('corecto');
        }
        if (contador == 0) {
            $("#btn_guardar").attr("disabled", false);
            $("#btn_guardar").attr("title", "Guardar datos de Usuario");
        }
        else {
            $("#btn_guardar").attr("disabled", true);
        }
    }

    $("#cbx_tipo").change(function (e) {
        generarUsuario();
        camposVaciosUsuario();
        e.preventDefault();

    });

    function generarUsuario() {
        if ($("#cbx_tipo").val() != "0") {
            let tipoUsuario = $("#cbx_tipo").val().toLowerCase();
            let nombreMiembro = $("#txt_miembro").val().toLowerCase();
            let numero = codUsuario;
            let nomUsuario = nombreMiembro.substr(0, 4) + '_' + numero.substr(7, 3) + '@' + tipoUsuario.substr(0, 5);
            $("#txt_usuario").val(nomUsuario);
            $("#txt_contrasena").val(generarContrasena(8, ""));
        }
        else {
            $("#txt_usuario").val("");
        }

    }

    function generarContrasena(length, type) {
        switch (type) {
            case 'num':
                characters = "0123456789";
                break;
            case 'alf':
                characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                break;
            case 'rand':
                //FOR ↓
                break;
            default:
                characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                break;
        }
        var pass = "";
        for (i = 0; i < length; i++) {
            if (type == 'rand') {
                pass += String.fromCharCode((Math.floor((Math.random() * 100)) % 94) + 33);
            } else {
                pass += characters.charAt(Math.floor(Math.random() * characters.length));
            }
        }
        return pass;
    }

    function abrirNuevoTab(url) {
        // Abrir nuevo tab
        var win = window.open(url, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();
    }

});





