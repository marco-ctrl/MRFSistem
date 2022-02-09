$(document).ready(function () {

    var codEgreFijo;
    var codUsu;
    var corre;
    var edit = false;



    ListarEgresosFijos();

    $('#formulario').hide();//ocultar formulario


    $('#buscarItem').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#buscarItem').val()) {
            let buscar = $('#buscarItem').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/EgresosFijos/BuscarEgresosFijos.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cel = JSON.parse(response);

                        cel.forEach(cel => {
                            plantilla = MostrarTabla(plantilla, cel);
                        });
                        $('#tb_items').html(plantilla);
                    }
                    else {
                        $('#tb_items').html(plantilla);
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
            ListarEgresosFijos();
        }
    });

    function ListarEgresosFijos() {//listar EgresosFijos
        $.ajax({
            url: '/MRFSistem/AccesoDatos/EgresosFijos/ListarEgresosFijos.php',
            type: 'GET',
            beforeSend: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200'
                console.log("cargando..");
            },
            success: function (response) {
                let EgresosFijos = JSON.parse(response);
                let plantilla = '';
                EgresosFijos.forEach(con => {
                    plantilla = MostrarTabla(plantilla, con);
                });
                $('#tb_items').html(plantilla);
            }
        });
    }

    function MostrarTabla(plantilla, usu) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${usu.pacodefe}" class="table-light">
                <td>${usu.pacodefe}</td>
                <td>${usu.cadesefe}</td>
                <td>${usu.cacanefe}</td>
                <td>${usu.catipcan}</td>
                <td>
                    <a class="baja-egreFijo btn btn-danger">
                    <i class="fas fa-trash-alt"></i></a>
                </>
                <td>
                    <a class="modificar-egreFijo btn btn-secondary">
                    <i class="far fa-edit"></i></a>
                </td>
            </tr>`
        return plantilla;
    }

    $(document).on('click', '.modificar-egreFijo', function () {//modifica usuario

        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodefe = $(elemento).attr('UserDocu');
        $.post('/MRFSistem/AccesoDatos/EgresosFijos/SingleEgresosFijos.php',
            { pacodefe }, function (responce) {
                $('#lista').hide();
                $('#formulario').show();
                const celula = JSON.parse(responce);
                celula.forEach(con => {
                    codEgreFijo = con.pacodefe,
                        $('#txt_descripcion').val(con.cadesefe),
                        $('#txt_cantidad').val(con.cacanefe),
                        $('#cbx_tipItem').val(con.catipcan)
                });
                //contex.hide();
                document.getElementById("cbx_tipItem").focus();
                edit = true;
                camposVacios();
            });
    });

    $(document).on('click', '.baja-egreFijo', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja este egreso fijo")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodefe = $(elemento).attr('UserDocu');
            $.post('/MRFSistem/AccesoDatos/EgresosFijos/DarBaja.php',
                { pacodefe }, function (responce) {
                    console.log(responce);
                    if (responce == 'baja') {
                        ListarEgresosFijos();
                        MostrarMensaje("EgresosFijos dado de baja", "warning");
                    }

                });
        }
    });

    $('#btn_nuevo').click(function (e) {//nuevo registro de EgresosFijos
        $('#lista').hide();
        $('#formulario').show();
        let num = "";
        verificarSecuencia("EGE");
        if (getBan() != "true") {
            setCodigo("EGE");
            setCorrelativo(1);
        }
        else {
            setCodigo("EGE");
            obtenerCorrelativo("EGE");
            setCorrelativo(obtenerSiguinete("EGE"));
        }
        corre = getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codEgreFijo = getCodigo() + '-' + num;
        console.log(codEgreFijo);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById('cbx_tipItem').focus();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();
        edit = false;
        camposVacios();
    });

    $('#btn_guardar').click(function (e) {
        GuardarEgresosFijos();
        //Limpiar();
    });

    function Limpiar() {//limpiar formulario
        $('#form1').trigger('reset');
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
    }

    function GuardarEgresosFijos() {//guardar EgresosFijos
        const postData = {
            pacodefe: codEgreFijo,
            cadesefe: $('#txt_descripcion').val().toUpperCase(),
            cacanefe: $('#txt_cantidad').val(),
            catipcan: $('#cbx_tipItem').val(),
        };
        let url = edit === false ?
            '/MRFSistem/AccesoDatos/EgresosFijos/AgregarEgresosFijos.php' :
            '/MRFSistem/AccesoDatos/EgresosFijos/ModificarEgresosFijos.php';

        $.post(url, postData, function (response) {
            console.log(response)
            if (!edit && response == 'registra') {
                actualizarSecuencia("EGE", corre);
                MostrarMensaje("Datos de Egresos Fijos guardados correctamente", "success");

            }
            if (edit && response == 'modificado') {
                MostrarMensaje("datos de Egresos Fijos modificados correctamente", "success")
            }
            edit = false;

            $('#formulario').hide();
            $('#lista').show();
            ListarEgresosFijos();
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

    $('#cbx_tipItem').change(function (e) {//asigar codigo profesion
        //capturarCampos();
        camposVacios();
        e.preventDefault();

    });

    $('#txt_descripcion').keyup(function (e) {
        //capturarCampos();
        camposVacios();
    });


    var contador;

    function camposVacios() {
        item = $('#cbx_tipItem').val();
        cantidad = $('#txt_cantidad').val();
        descripcion = $('#txt_descripcion').val();
        contador = 0;
        if (cantidad == "") {
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
            $("#div_tipItem").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
            $("#chk_tipItem").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_tipItem").html('<i class="fas fa-exclamation-triangle"></i>');
            $("#val_tipItem").html("Completa este campo");
            contador++;
        }
        else {
            $("#div_tipItem").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_tipItem").html("");
            $("#chk_tipItem").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_tipItem").html('<i class="fas fa-check"></i>');
        }
        if (descripcion == "") {
            $("#val_descripcion").html("Completa este campo");
            $("#div_descripcion").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_descripcion").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_descripcion").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {
                $("#div_descripcion").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_descripcion").html("");
                $("#chk_descripcion").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
                $("#chk_descripcion").html('<i class="fas fa-check"></i>');
            
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

