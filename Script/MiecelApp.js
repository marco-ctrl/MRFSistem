$(document).ready(function () {
    //ListarMieCel();
    var codigoCel;
    var codigoMie;
    var codigoMieCel;
    var corre1;
    var corre2;
    var editMiecel = false;

    DeshabilitarFormulario();

    $(document).on('click', '.modificar-miecel', function () {//modifica usuario
        document.getElementById("txt_ci").focus();
        habilitarFormulario;
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodmie = $(elemento).attr('codMbr');
        console.log(codigoCel);
        console.log(pacodmie);
        $.ajax({
            url: '/MRFSistem/AccesoDatos/MieCel/SingleMiecel.php',
            type: 'POST',
            data: { pacodmie, codigoCel },
            success: function (responce) {
                ////console.log(responce);
                //$("#btn_guardarMiembro").attr("disabled", false);
                const miembro = JSON.parse(responce);
                miembro.forEach(miembro => {
                    codigoMie = miembro.pacodmie,
                        $('#txt_ci').val(miembro.cacidmie),
                        $('#txt_ciExtencion').val(miembro.cacidext),
                        $('#txt_nombre').val(miembro.canommie),
                        $('#txt_paterno').val(miembro.capatmie),
                        $('#txt_materno').val(miembro.camatmie),
                        $('#txt_numcontacto').val(miembro.cacelmie),
                        $('#txt_fecnac').val(miembro.cafecnac),
                        $('#txt_direccion').val(miembro.cadirmie),
                        $('#cbx_funcion').val(miembro.cafunmie),
                        codigoMieCel = miembro.pacodmcl
                });
                editMiecel = true;
                //console.log(codigoMieCel+' '+codigoMie+' '+codigoCel);
                habilitarFormulario();
                $("#btn_AgregarMiecel").html("<i class='far fa-save'></i> Guardar");
                capturarCampos();
                camposVacios();
            }
        });
    });

    $(document).on('click', '.miembros-celula', function () {//modifica usuario
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcel = $(elemento).attr('UserDocu');
        codigoCel = pacodcel;
        $.post('/MRFSistem/AccesoDatos/Celula/SingleCelula.php',
            { pacodcel }, function (responce) {
                const celula = JSON.parse(responce);
                celula.forEach(cel => {
                    document.getElementById('title').innerHTML = 'MIEMBROS DE LA CELULA ' + cel.canomcel;

                });

            });
        ListarMieCel(pacodcel);
    });

    $(document).on('click', '.lider-celula', function () {//abrir pantalla asignar lidar celula
        document.getElementById('lbl_lider').innerHTML = 'LIDER DE LA CELULA';
        $('#listaMiembros').show();
        $('#btn_guardarLider').attr("disabled", true);
        $('#btn_CambiarLider').attr("disabled", true);
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcel = $(elemento).attr('UserDocu');
        codigoCel = pacodcel;
        $.post('/MRFSistem/AccesoDatos/Celula/SingleCelula.php',
            { pacodcel }, function (responce) {
                const celula = JSON.parse(responce);
                celula.forEach(cel => {
                    document.getElementById('titleLider').innerHTML = 'LIDER DE LA CELULA ' + cel.canomcel;

                });

            });
        ListarMieCel(pacodcel);
        ListarMiembro();
    });

    $(document).on('click', '.asignar-lider', function () {//modifica usuario
        $('#btn_guardarLider').attr("disabled", false);
        $('#btn_CambiarLider').attr("disabled", true);
        
        let elemento = $(this)[0].parentElement.parentElement;
        codigoMie = $(elemento).attr('UserDocu');
        codigoMieCel = $(elemento).attr('pacodmcl');
        let nombreLider = $(elemento).attr('nombre');
        let apePaternoLider = $(elemento).attr('apePaterno');
        let apeMaternoLider = $(elemento).attr('apeMaterno');
        $('#lbl_lider').html(nombreLider + " " + apePaternoLider + " " + apeMaternoLider);
        $('.modal-dialog-scrollable .modal-body').animate({
            scrollTop: 0
          }, 'slow');
        //console.log(codigoMieCel);

    });

    $(document).on('click', '.baja-miecel', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja esta Miembro")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodmie = $(elemento).attr('codMcl');
            $.post('/MRFSistem/AccesoDatos/MieCel/DarBaja.php',
                { pacodmie }, function (responce) {
                    if (responce == 'baja') {
                        ListarMieCel(codigoCel);
                        alertify.alert('Mensaje', 'Miembro de Celula dado de baja');
                        //MostrarMensaje("Celula dado de baja", "warning");
                        ListarMieCel(codigoCel);
                    }

                });
        }
    });

    function ListarMieCel(codCel) {//listar de tabla miembros de celulas
        $.ajax({
            url: '/MRFSistem/AccesoDatos/MieCel/ListarMiecel.php',
            type: 'POST',
            data: { codCel },
            success: function (response) {
                //console.log(response);
                let miembros = JSON.parse(response);
                let plantilla = '';
                if (miembros != false) {
                    miembros.forEach(miembros => {
                        let extencion = '';
                        //console.log(miembros);
                        if (miembros.cacidext != "") {
                            extencion = "-" + miembros.cacidext;
                        }
                        if (miembros.cafunmie != 'LIDER') {
                            plantilla +=
                                `<tr codMbr="${miembros.pacodmie}" 
                                 codMcl="${miembros.pacodmcl}" class="table-light">
                            <td>${miembros.canommie}</td> 
                            <td>${miembros.capatmie} ${miembros.camatmie}</td>
                            <td>${miembros.cafunmie}</td>
                            <td ALIGN="CENTER"><button class="baja-miecel btn btn-danger">
                            <i class="fas fa-trash-alt "></i></button></td>
                            <td ALIGN="CENTER"><button class="modificar-miecel btn btn-secondary">
                            <i class="far fa-edit "></i></button></td>
                            </tr>`;
                            console.log("hola");
                            //$("#btn_guardarLider").attr("disabled", false);
                            //$("#btn_cambiarLider").attr("disabled", true);
                        }
                        if (miembros.cafunmie == 'LIDER') {
                            $('#lbl_lider').html(miembros.canommie + " " + miembros.capatmie + " " + miembros.camatmie);
                            $('#listaMiembros').hide();
                            $('#btn_guardarLider').attr("disabled", true);
                            $('#btn_CambiarLider').attr("disabled", false);
                        }
                    });
                }
                else if (miembros == false) {
                    plantilla =
                        `<tr class="table-light">
                            <td colspan="5" align="center">No se encontro ningun miembro registrado en esta Celula!</td> 
                            </tr>`;
                }
                $('#tb_miecel').html(plantilla);
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
                    $('#tb_miembroLider').html(plantilla);
                }

            }
        });
    }


    function MostrarTabla(plantilla, miembros) {
        let extencion = '';
        if (miembros.cacidext != "") {
            extencion = "-" + miembros.cacidext;
        }
        plantilla +=
            `<tr pacodmcl="${miembros.pacodmcl}" UserDocu="${miembros.pacodmie}" nombre="${miembros.canommie}" 
                apePaterno="${miembros.capatmie}" apeMaterno="${miembros.camatmie}" class="table-light">
                <td>${miembros.canommie}</td>
                <td>${miembros.capatmie} ${miembros.camatmie}</td>
                <td>${miembros.canomcel}</td>
                <td>${miembros.cafunmie}</td>
                <td>
                    <button class="asignar-lider btn btn-primary">
                        <i class="fas fa-user-plus "></i>
                    </button>
                </td>
            </tr>`
        return plantilla;
    }

    function NuevoMiecel() {//genera un codigo nuevo de miembro y miecel
        document.getElementById("txt_ci").focus();
        let num = "";
        verificarSecuencia("MBR");
        if (getBan() != "true") {
            setCodigo("MBR");
            setCorrelativo(1);
        }
        else {
            setCodigo("MBR");
            obtenerCorrelativo("MBR");
            setCorrelativo(obtenerSiguinete("MBR"));
        }
        corre1 = getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codigoMie = getCodigo() + '-' + num;
        ////console.log(codigoMie+' correlativo '+corre1);
        let num1 = "";
        verificarSecuencia("MCL");
        if (getBan() != "true") {
            setCodigo("MCL");
            setCorrelativo(1);
        }
        else {
            setCodigo("MCL");
            obtenerCorrelativo("MCL");
            setCorrelativo(obtenerSiguinete("MCL"));
        }
        corre2 = getCorrelativo();
        num1 = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num1);
        codigoMieCel = getCodigo() + '-' + num1;
        ////console.log(codigoMieCel + ' correlativo ' + corre2);
        ////console.log(codigoCel);
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


    function guardarMiecel() {
        const postData = {
            pacodmie: codigoMie,
            cacidmie: $('#txt_ci').val(),
            cacidext: $('#txt_ciExtencion').val().toUpperCase(),
            canommie: $('#txt_nombre').val().toUpperCase(),
            capatmie: $('#txt_paterno').val().toUpperCase(),
            camatmie: $('#txt_materno').val().toUpperCase(),
            cacelmie: $('#txt_numcontacto').val(),
            cafecnac: $('#txt_fecnac').val(),
            cadirmie: $('#txt_direccion').val().toUpperCase(),
            pacodmcl: codigoMieCel,
            cafunmie: $('#cbx_funcion').val(),
            caestmcl: true,
            facodcel: codigoCel,
            facodmie: codigoMie
        };
        ////console.log(postData);
        let URL = editMiecel === false ?
            '/MRFSistem/AccesoDatos/MieCel/AgregarMiembro.php' :
            '/MRFSistem/AccesoDatos/MieCel/ModificarMiecel.php';

        $.ajax({
            url: URL,
            type: 'POST',
            data: postData,
            beforeSend: function () {
                $("#btn_AgregarMiecel").text("Guardando...");
                $("#btn_AgregarMiecel").attr("disabled", true);
            },
            complete: function () {
                $("#btn_AgregarMiecel").html("<i class='fas fa-user-plus'></i> Agregar");
                $("#btn_AgregarMiecel").attr("disabled", false);
            },
            success: function (response) {
                //console.log(response);
                if (!editMiecel && response == 'registra') {
                    actualizarSecuencia("MBR", corre1);
                    GuardarMiembroCelula();
                    alertify.alert('Mensaje', 'Datos de Miembros guardados correctamente', function () { alertify.success('Se guardó correctamente'); });
                }
                if (editMiecel && response == 'modificado') {
                    alertify.alert('Mensaje', 'Datos de Miembros Modificados correctamente', function () { alertify.success('Se guardó correctamente'); });
                    ListarMieCel(codigoCel);
                    LimpiarMiecel();
                    ListarMiembro();
                }
                editMiecel = false;

            }

        });
    }

    function GuardarMiembroCelula() {
        const postData = {
            pacodmcl: codigoMieCel,
            cafunmie: $('#cbx_funcion').val(),
            caestmcl: true,
            facodcel: codigoCel,
            facodmie: codigoMie
        };

        let url = '/MRFSistem/AccesoDatos/MieCel/AgregarMieCel.php';
        $.post(url, postData, function (response) {
            ////console.log(response);
            if (!editMiecel && response == 'registra') {
                actualizarSecuencia("MCL", corre2);
            }
            if (editMiecel && response == 'modificado') {

            }
            editMiecel = false;
            ListarMieCel(codigoCel);
            LimpiarMiecel();
            //DeshabilitarFormulario();
            //ListarMiembro();
        });
        ////console.log('completado..');
    }

    function guardarLiderCelula() {
        const postData = {
            pacodmcl: codigoMieCel,
            facodcel: codigoCel
        };
        let url = '/MRFSistem/AccesoDatos/MieCel/ModificarLiderCelula.php';
        $.post(url, postData, function (response) {
            ////console.log(response);
            if (response == 'modificado') {
                alertify.alert('Mensaje', 'Lider asignado correctamente', function () { alertify.success('Se guardó correctamente'); });
            } else {
                alertify.alert('Mensaje', 'Ocurrio un error al asignar Lider de Celula', function () { alertify.danger('Ocurrio un Error'); });
            }
            ListarMieCel(codigoCel);
            LimpiarMiecel();
            //DeshabilitarFormulario();
            //ListarMiembro();
        });
    }

    function LimpiarMiecel() {
        $('#formMiecel1').trigger('reset');
        $('#formMiecel2').trigger('reset');
        $('#formMiecel3').trigger('reset');
        $("#btn_AgregarMiecel").html("<i class='fas fa-user-plus'></i> Agregar");
        DeshabilitarFormulario();
        editMiecel = false;
        capturarCampos();
        camposVacios();
    }

    $('#btn_guardarLider').click(function (e) {
        guardarLiderCelula();
        e.preventDefault();

    });

    $('#btn_CambiarLider').click(function (e) {
        $("#listaMiembros").show();
        $("#btn_CambiarLider").attr("disabled", true);
        e.preventDefault();

    });


    $('#btn_AgregarMiecel').click(function (e) {
        guardarMiecel();
        e.preventDefault();

    });

    $('#btn_nuevoMiecel').click(function (e) {
        habilitarFormulario();
        NuevoMiecel();
        e.preventDefault();

    });

    $('#btn_cerrarMiecel').click(function (e) {
        //DeshabilitarFormulario();
        LimpiarMiecel();
        capturarCampos();
        camposVacios();
        e.preventDefault();
    });

    function DeshabilitarFormulario() {
        $("#txt_nombre").attr("disabled", true);
        $("#txt_codMiembro").attr("disabled", true);
        $("#txt_ci").attr("disabled", true);
        $("#txt_ciExtencion").attr("disabled", true);
        $("#txt_paterno").attr("disabled", true);
        $("#txt_materno").attr("disabled", true);
        $("#txt_numcontacto").attr("disabled", true);
        $("#txt_fecnac").attr("disabled", true);
        $("#txt_direccion").attr("disabled", true);
        //$("#btn_AgregarMiecel").attr("disabled", true);
        $("#cbx_funcion").attr("disabled", true);
        $("#btn_nuevoMiecel").attr("disabled", false);
        $("#btn_AgregarMiecel").attr("disabled", true);
    }

    function habilitarFormulario() {
        $("#txt_nombre").attr("disabled", false);
        $("#txt_codMiembro").attr("disabled", false);
        $("#txt_ci").attr("disabled", false);
        $("#txt_ciExtencion").attr("disabled", false);
        $("#txt_paterno").attr("disabled", false);
        $("#txt_materno").attr("disabled", false);
        $("#txt_numcontacto").attr("disabled", false);
        $("#txt_fecnac").attr("disabled", false);
        $("#txt_direccion").attr("disabled", false);
        //$("#btn_AgregarMiecel").attr("disabled", true);
        $("#cbx_funcion").attr("disabled", false);
        $("#btn_nuevoMiecel").attr("disabled", true);
        $("#btn_AgregarMiecel").attr("disabled", true);
    }

    //Validacion de Campos Vacios
    var ci, nombre, apPaterno, apMaterno, telefono, estCivil, direccion,
        profesion, nomCiudad, nomCelula, funCel;

    function capturarCampos() {
        ci = $('#txt_ci').val();
        nombre = $('#txt_nombre').val();
        apPaterno = $('#txt_paterno').val();
        telefono = $('#txt_numcontacto').val();
        direccion = $('#txt_direccion').val();
        funCel = $('#cbx_funcion').val();
    }


    //$('#txt_ci').maxlength();
    $('#txt_ci').maxlength({ showFeedback: false, max: 13 });
    $('#txt_ciExtencion').maxlength({ showFeedback: false, max: 2 });
    $('#txt_numcontacto').maxlength({ showFeedback: false, max: 15 });
    $('#txt_nombre').maxlength({ showFeedback: false, max: 30 });

    $("#btn_guardarMiembro").attr("disabled", true);

    //Validacion de Campos Vacios
    $('#txt_ci').keyup(function (e) {
        capturarCampos();
        camposVacios();
    });

    $('#txt_nombre').keyup(function (e) {
        capturarCampos();
        camposVacios();
        //soloLetras(e);
    });
    $('#txt_paterno').keyup(function (e) {
        capturarCampos();
        camposVacios();
    });
    $('#txt_numcontacto').keyup(function (e) {
        capturarCampos();
        camposVacios();
    });
    $('#txt_direccion').keyup(function (e) {
        capturarCampos();
        camposVacios();
    });

    $('#cbx_funcion').change(function (e) {//asigar codigo profesion
        capturarCampos();
        camposVacios();
        e.preventDefault();

    });


    var contador;

    function camposVacios() {
        contador = 0;
        if (ci == "") {
            $("#val_ci").html("Completa este campo");
            $("#div_ci").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_ci").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
            $("#chk_ci").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {
            if (ci.toString().length < 7) {
                $("#div_ci").switchClass("border-bottom-success", "border-bottom-danger", 100);
                $("#val_ci").html("Este campo debe tener al menos 7 digitos");
                $("#chk_ci").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
                $("#chk_ci").html('<i class="fas fa-exclamation-triangle"></i>');
                //console.log('ci debe tener almenos 7 carateres');
                contador++;
            }
            else {
                $("#div_ci").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_ci").html("");
                $("#chk_ci").switchClass("btn-danger", "btn-success", 100, "easeInOutQuad");
                $("#chk_ci").html('<i class="fas fa-check"></i>');
                //console.log('corecto');
            }
        }
        if (nombre == "") {
            $("#val_nombre").html("Completa este campo");
            $("#div_nombre").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
            $("#chk_nombre").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
            $("#chk_nombre").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {
            if (nombre.toString().length < 3) {
                $("#div_nombre").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
                $("#val_nombre").html("Este campo debe tener al menos 3 letras");
                $("#chk_nombre").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
                $("#chk_nombre").html('<i class="fas fa-exclamation-triangle"></i>');
                //console.log('nombre debe tener almenos 7 carateres');
                contador++;
            }
            else {
                $("#div_nombre").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_nombre").html("");
                $("#chk_nombre").switchClass("btn-danger", "btn-success", 100, "easeInOutQuad");
                $("#chk_nombre").html('<i class="fas fa-check"></i>');
                //console.log('corecto');
            }
        }
        if (apPaterno == "") {
            $("#div_paterno").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
            $("#chk_paterno").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
            $("#chk_paterno").html('<i class="fas fa-exclamation-triangle"></i>');
            $("#val_paterno").html("Completa este campo");
            contador++;
        }
        else {
            if (apPaterno.toString().length < 3) {
                $("#div_paterno").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
                $("#val_paterno").html("Este campo debe tener al menos 3 letras");
                $("#chk_paterno").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
                $("#chk_paterno").html('<i class="fas fa-exclamation-triangle"></i>');
                //console.log('paterno debe tener almenos 7 carateres');
                contador++;
            }
            else {
                $("#div_paterno").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_paterno").html("");
                $("#chk_paterno").switchClass("btn-danger", "btn-success", 100, "easeInOutQuad");
                $("#chk_paterno").html('<i class="fas fa-check"></i>');
                //console.log('corecto');
            }
        }

        if (telefono == "") {
            $("#div_numcontacto").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
            $("#chk_numcontacto").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
            $("#chk_numcontacto").html('<i class="fas fa-exclamation-triangle"></i>');
            $("#val_numcontacto").html("Completa este campo");
            contador++;
        }
        else {
            if (telefono.toString().length < 5) {
                $("#div_numcontacto").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
                $("#val_numcontacto").html("Este campo debe tener al menos 5 digitos");
                $("#chk_numcontacto").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
                $("#chk_numcontacto").html('<i class="fas fa-exclamation-triangle"></i>');
                //console.log('numcontacto debe tener almenos 7 carateres');
                contador++;
            }
            else {
                $("#div_numcontacto").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_numcontacto").html("");
                $("#chk_numcontacto").switchClass("btn-danger", "btn-success", 100, "easeInOutQuad");
                $("#chk_numcontacto").html('<i class="fas fa-check"></i>');
                //console.log('corecto');
            }
        }
        if (direccion == "") {
            $("#div_direccion").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
            $("#chk_direccion").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
            $("#chk_direccion").html('<i class="fas fa-exclamation-triangle"></i>');
            $("#val_direccion").html("Completa este campo");
            contador++;
        }
        else {
            if (direccion.toString().length < 10) {
                $("#div_direccion").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
                $("#val_direccion").html("Este campo debe tener al menos 10 caracteres");
                $("#chk_direccion").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
                $("#chk_direccion").html('<i class="fas fa-exclamation-triangle"></i>');
                //console.log('direccion debe tener almenos 7 carateres');
                contador++;
            }
            else {
                $("#div_direccion").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_direccion").html("");
                $("#chk_direccion").switchClass("btn-danger", "btn-success", 100, "easeInOutQuad");
                $("#chk_direccion").html('<i class="fas fa-check"></i>');
                //console.log('corecto');
            }
        }
        if (funCel == "0") {
            $("#div_funcion").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
            $("#chk_funcion").switchClass("btn-success", "btn-danger", 100, "easeInOutQuad");
            $("#chk_funcion").html('<i class="fas fa-exclamation-triangle"></i>');
            $("#val_funcion").html("Completa este campo");
            contador++;
        }
        else {
            $("#div_funcion").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_funcion").html("");
            $("#chk_funcion").switchClass("btn-danger", "btn-success", 100, "easeInOutQuad");
            $("#chk_funcion").html('<i class="fas fa-check"></i>');
        }
        if (contador > 0) {
            $("#btn_AgregarMiecel").attr("disabled", true);
            $("#btn_AgregarMiecel").attr("title", "Llene todos los campos requeridos");
            //alertify.alert('Mensaje', 'Deber llenar todos los campos requeridos por el Sistema!');
        }
        else {
            if (contador == 0) {
                $("#btn_AgregarMiecel").attr("disabled", false);
                $("#btn_AgregarMiecel").attr("title", "Guardar datos de Miembros de Celula");

            }
        }
    }

});



//});