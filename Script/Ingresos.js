$(document).ready(function () {

    var codEconomico;
    var codUsu;
    var corre;
    var edit = false;

    var codCaja = $('#txt_codCaja').val();
    if (codCaja != "") {
        ListarIngresos();
    }
    else {
        if (codCaja == "") {
            let plantilla = '';
            plantilla = '<tr><td colspan="5" align="center">No se encontro una caja abierta, Favor de abrir una nueva caja!</td></tr>'
            $('#tb_economico').html(plantilla);
            $("#dat_inicio").attr("disabled", true);
            $("#dat_maximo").attr("disabled", true);
            $("#btn_busFec").attr("disabled", true);
        }
    }
    //ListarIngresos();
    fechaActual();

    //Fecha Actual
    function fechaActual() {
        var hoy = new Date().format('Y-m-d');
        $('#dat_maximo').val(hoy);
        $('#dat_ingreso').val(hoy);
        $('#dat_aporte').val(hoy);

    }

    //ListarIngresos();

    $('#formulario').hide();//ocultar formulario

    function myFunc() {
        var now = new Date();
        var time = now.getHours() + ":" + now.getMinutes();
        //document.getElementById('hor_aporte').innerHTML= time;
        $('#hor_aporte').val(time);
    }
    myFunc();
    setInterval(myFunc, 1000);

    $('#btn_busFec').click(function (e) {//permite hacer busqueda de miembros
        //if ($('#btn_busFec').val()) {
        let cafecmin = $('#dat_inicio').val();
        let cafecmax = $('#dat_maximo').val();
        let plantilla = '';
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Ingresos/BuscarIngresoFecha.php',
            type: 'POST',
            data: { cafecmin, cafecmax },
            success: function (response) {
                if (response != "no encontrado") {
                    let cel = JSON.parse(response);

                    cel.forEach(cel => {
                        plantilla = MostrarTabla(plantilla, cel);
                    });
                    $('#tb_economico').html(plantilla);
                }
                else {
                    $('#tb_economico').html(plantilla);
                    let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>NO se encuentran Ingresos registrados en la base de datos</strong></div>`;
                    $('#mensaje').html(mensaje);
                    $('#mensaje').show();
                }
            },
            error: function (xhr, status) {
                alert('error al buscar miembro');
            }
        });
        //}
        /* else {
             $('#mensaje').hide();
             ListarIngresos();
         }*/
    });



    function ListarIngresos() {//listar Ingresos
        var pacodcaj = $('#txt_codCaja').val();
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Ingresos/ListarIngresos.php',
            type: 'POST',
            data: { pacodcaj },
            beforeSend: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200'
            },
            success: function (response) {
                let plantilla = '';
                if (response != "false") {
                    let Ingresos = JSON.parse(response);
                    Ingresos.forEach(con => {
                        plantilla = MostrarTabla(plantilla, con);
                    });
                    //$('#tb_economico').html(plantilla);
                }
                else {
                    if (response == "false") {
                        plantilla = '<tr><td colspan="5" align="center">Tabla vacia</td></tr>'
                    }
                }
                $('#tb_economico').html(plantilla);
            }
        });
    }

    function MostrarTabla(plantilla, usu) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${usu.pacodapo}" class="table-light">
                <td>${usu.catiping}</td>
                <td>${usu.camoning}</td>
                <td>${usu.cafecing}</td>
                <td>${usu.canommie} ${usu.capatmie} ${usu.camatmie} </td>
                <!--<td>
                    <a class="baja-aporte btn btn-danger">
                    <i class="fas fa-trash-alt"></i></a>
                </>-->
                <td>
                    <a class="modificar-aporte btn btn-secondary">
                    <i class="far fa-edit"></i></a>
                </td>
            </tr>`
        return plantilla;
    }

    $(document).on('click', '.modificar-aporte', function () {//modifica usuario

        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodapo = $(elemento).attr('UserDocu');
        $.post('/MRFSistem/AccesoDatos/Ingresos/SingleIngresos.php',
            { pacodapo }, function (responce) {
                fechaActual();
                $('#lista').hide();
                $('#formulario').show();
                const celula = JSON.parse(responce);
                celula.forEach(con => {
                    codEconomico = con.pacodapo,
                        $('#dat_ingreso').val(con.cafecing),
                        $('#txt_cantidad').val(con.camoning),
                        $('#cbx_tipIng').val(con.catiping)
                });
                //contex.hide();
                document.getElementById("cbx_tipIng").focus();
                edit = true;
                camposVacios();
            });
    });

    $(document).on('click', '.baja-Ingresos', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja esta materia")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodapo = $(elemento).attr('UserDocu');
            $.post('/MRFSistem/AccesoDatos/Ingresos/DarBaja.php',
                { pacodapo }, function (responce) {
                    if (responce == 'baja') {
                        ListarIngresos();
                        MostrarMensaje("Ingresos dado de baja", "warning");
                    }

                });
        }
    });

    $('#btn_nuevo').click(function (e) {//nuevo registro de Ingresos
        //verificarApertura();
        RegistrarIngresos();
        camposVacios();
    });

    function RegistrarIngresos() {
        $('#lista').hide();
        $('#formulario').show();
        fechaActual();
        let num = "";
        edit = false;
        verificarSecuencia("ING");
        if (getBan() != "true") {
            setCodigo("ING");
            setCorrelativo(1);
        }
        else {
            setCodigo("ING");
            obtenerCorrelativo("ING");
            setCorrelativo(obtenerSiguinete("ING"));
        }
        corre = getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codEconomico = getCodigo() + '-' + num;
        console.log(codEconomico);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById('cbx_tipIng').focus();
    }

    function verificarApertura() {
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Caja/VerificarApertura.php',
            type: 'GET',
            beforeSend: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200'
                //console.log("cargando..");
            },
            success: function (response) {
                //console.log(response);
                if (response == "false") {
                    alertify.alert('Mensaje', 'No existe una caja abierta', function () { alertify.error('Favor de abrir una caja!'); });

                }
                else {
                    RegistrarIngresos();
                }

            }
        });
    }


    $('#btn_cancelar').click(function (e) {
        Limpiar();
        edit = false;
    });



    $('#btn_guardar').click(function (e) {
        GuardarIngresos();
        //Limpiar();
    });

    function Limpiar() {//limpiar formulario
        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
    }

    function GuardarIngresos() {//guardar Ingresos
        const postData = {
            pacodapo: codEconomico,
            cafecing: $('#dat_ingreso').val(),
            cafecapo: $('#dat_aporte').val(),
            cahorapo: $('#hor_aporte').val(),
            facodusu: $('#txt_codUsuario').val(),
            camoning: $('#txt_cantidad').val(),
            catiping: $('#cbx_tipIng').val(),
            facodcaj: $('#txt_codCaja').val()
        };
        let url = edit === false ?
            '/MRFSistem/AccesoDatos/Ingresos/AgregarIngresos.php' :
            '/MRFSistem/AccesoDatos/Ingresos/ModificarIngresos.php';

        $.post(url, postData, function (response) {
            console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("ING", corre);
                alertify.alert('Mensaje', 'Datos de Ingresos guardados correctamente', function () { alertify.success('Se guardó correctamente'); });

            }
            if (edit && response == 'modificado') {
                alertify.alert('Mensaje', 'Datos de Ingresos modificados correctamente', function () { alertify.success('Se modifico correctamente'); });

            }
            edit = false;

            $('#formulario').hide();
            $('#lista').show();
            ListarIngresos();
            Limpiar();
        });

    }

    function MostrarMensaje(cadena, clase) {
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

    $("#btn_guardar").attr("disabled", true);

    //Validacion de Campos Vacios
    $('#txt_cantidad').keyup(function (e) {
        //capturarCampos();
        camposVacios();
    });

    $('#cbx_tipIng').change(function (e) {//asigar codigo profesion
        //capturarCampos();
        camposVacios();
        e.preventDefault();

    });

    var contador;

    function camposVacios() {
        item = $('#cbx_tipIng').val();
        cantidadIngreso = $('#txt_cantidad').val();
        contador = 0;
        if (cantidadIngreso == "") {
            $("#val_cantidad").html("Completa este campo");
            $("#div_cantidad").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_cantidad").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_cantidad").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {
                $("#div_cantidad").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_cantidad").html("");
                $("#chk_cantidad").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
                $("#chk_cantidad").html('<i class="fas fa-check"></i>');
            
        }
        if (item == "0") {
            $("#div_tipIng").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
            $("#chk_tipIng").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_tipIng").html('<i class="fas fa-exclamation-triangle"></i>');
            $("#val_tipIng").html("Completa este campo");
            contador++;
        }
        else {
            $("#div_tipIng").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_tipIng").html("");
            $("#chk_tipIng").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_tipIng").html('<i class="fas fa-check"></i>');
        }
        if (contador > 0) {
            $("#btn_guardar").attr("disabled", true);
            $("#btn_guardar").attr("title", "Llene todos los campos requeridos");
            //alertify.alert('Mensaje', 'Deber llenar todos los campos requeridos por el Sistema!');
        }
        else {
            if (contador == 0) {
                $("#btn_guardar").attr("disabled", false);
                $("#btn_guardar").attr("title", "Guardar datos de Ingreso");

            }
        }
    }

});

