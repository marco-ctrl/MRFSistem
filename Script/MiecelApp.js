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
        $.ajax({
            url: '/MRFSistem/AccesoDatos/MieCel/SingleMieCel.php',
            type: 'POST',
            data: { pacodmie, codigoCel },
            success: function (responce) {
                //console.log(responce);
                //$("#btn_guardarMiembro").attr("disabled", false);
                const miembro = JSON.parse(responce);
                miembro.forEach(miembro => {
                    codigoMie = miembro.pacodmie,
                        $('#txt_ci').val(miembro.cacidmie),
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
                console.log(codigoMieCel+' '+codigoMie+' '+codigoCel);
                habilitarFormulario();
                $("#btn_AgregarMiecel").html("<i class='far fa-save'></i> Guardar");
                
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
                    document.getElementById('title').innerHTML = 'Miembros de la Celula ' + cel.canomcel;

                });

            });
        ListarMieCel(pacodcel);
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
                        plantilla +=
                            `<tr codMbr="${miembros.pacodmie}" class="table-light">
                            <td>${miembros.canommie}</td> 
                            <td>${miembros.capatmie} ${miembros.camatmie}</td>
                            <td>${miembros.cafunmie}</td>
                            <td ALIGN="CENTER"><button class="baja-miecel btn btn-danger">
                            <i class="fas fa-trash-alt "></i></button></td>
                            <td ALIGN="CENTER"><button class="modificar-miecel btn btn-secondary">
                            <i class="far fa-edit "></i></button></td>
                            </tr>`;

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
        //console.log(codigoMie+' correlativo '+corre1);
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
        //console.log(codigoMieCel + ' correlativo ' + corre2);
        //console.log(codigoCel);
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
            canommie: $('#txt_nombre').val().toUpperCase(),
            capatmie: $('#txt_paterno').val().toUpperCase(),
            camatmie: $('#txt_materno').val().toUpperCase(),
            cacelmie: $('#txt_numcontacto').val(),
            cafecnac: $('#txt_fecnac').val(),
            cadirmie: $('#txt_direccion').val().toUpperCase(),
        };
        //console.log(postData);
        let URL = editMiecel === false ?
            '/MRFSistem/AccesoDatos/MieCel/AgregarMiembro.php' :
            '/MRFSistem/AccesoDatos/MieCel/ModificarMiembro.php';

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
            //console.log(response);
            if (!editMiecel && response == 'registra') {
                actualizarSecuencia("MCL", corre2);
            }
            if (editMiecel && response == 'modificado') {

            }
            editMiecel = false;
            ListarMieCel(codigoCel);
            LimpiarMiecel();
            DeshabilitarFormulario();
            //ListarMiembro();
        });
        //console.log('completado..');
    }

    function LimpiarMiecel() {
        $('#formMiecel1').trigger('reset');
        $('#formMiecel2').trigger('reset');
        $('#formMiecel3').trigger('reset');
    }

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
        DeshabilitarFormulario();
        e.preventDefault();
    });

    function DeshabilitarFormulario() {
        $("#txt_nombre").attr("disabled", true);
        $("#txt_codMiembro").attr("disabled", true);
        $("#txt_ci").attr("disabled", true);
        $("#txt_paterno").attr("disabled", true);
        $("#txt_materno").attr("disabled", true);
        $("#txt_numcontacto").attr("disabled", true);
        $("#txt_fecnac").attr("disabled", true);
        $("#txt_direccion").attr("disabled", true);
        //$("#btn_AgregarMiecel").attr("disabled", true);
        $("#cbx_funcion").attr("disabled", true);
        $("#btn_nuevoMiecel").attr("disabled", false);
    }

    function habilitarFormulario() {
        $("#txt_nombre").attr("disabled", false);
        $("#txt_codMiembro").attr("disabled", false);
        $("#txt_ci").attr("disabled", false);
        $("#txt_paterno").attr("disabled", false);
        $("#txt_materno").attr("disabled", false);
        $("#txt_numcontacto").attr("disabled", false);
        $("#txt_fecnac").attr("disabled", false);
        $("#txt_direccion").attr("disabled", false);
        //$("#btn_AgregarMiecel").attr("disabled", true);
        $("#cbx_funcion").attr("disabled", false);
        $("#btn_nuevoMiecel").attr("disabled", true);
    }


});