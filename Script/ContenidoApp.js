$(document).ready(function () {

    var condContenido;
    var corre;
    var edit = false;

    ListarContenido();

    $('#formulario').hide();//ocultar formulario

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
                <td>
                    <button class="baja-contenido btn btn-danger">
                    <i class="fas fa-trash-alt "></i></button>
                </>
                <td style="width:15%">
                    <button class="modificar-contenido btn btn-secondary">
                    <i class="far fa-edit "></i></button>
                </td>
            </tr>`
        return plantilla;
    }

    $(document).on('click', '.modificar-contenido', function () {//modifica usuario

        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcon = $(elemento).attr('UserDocu');
        $.post('/MRFSistem/AccesoDatos/Contenido/SingleContenido.php',
            { pacodcon }, function (responce) {
                $('#lista').hide();
                $('#formulario').show();
                const celula = JSON.parse(responce);
                celula.forEach(con => {
                    codContenido = con.pacodcon,
                        $('#txt_contenido').val(con.canommat),
                        $('#txt_descripcion').val(con.cadescon)
                });
                //contex.hide();
                document.getElementById("txt_contenido").focus();
                edit = true;
                camposVacios();
            });
    });

    $(document).on('click', '.baja-contenido', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja esta materia")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodcon = $(elemento).attr('UserDocu');
            $.post('/MRFSistem/AccesoDatos/Contenido/DarBaja.php',
                { pacodcon }, function (responce) {
                    if (responce == 'baja') {
                        ListarContenido();
                        MostrarMensaje("Contenido dado de baja", "warning");
                    }

                });
        }
    });

    $('#btn_nuevo').click(function (e) {//nuevo registro de Contenido
        $('#lista').hide();
        $('#formulario').show();
        let num = "";
        verificarSecuencia("CON");
        if (getBan() != "true") {
            setCodigo("CON");
            setCorrelativo(1);
        }
        else {
            setCodigo("CON");
            obtenerCorrelativo("CON");
            setCorrelativo(obtenerSiguinete("CON"));
        }
        corre = getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codContenido = getCodigo() + '-' + num;
        console.log(codContenido);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById("txt_contenido").focus();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();
        edit = false;
        camposVacios();

    });

    $('#btn_guardar').click(function (e) {
        GuardarContenido();
        Limpiar();
    });

    function Limpiar() {//limpiar formulario
        $('#form').trigger('reset');
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
    }

    function GuardarContenido() {//guardar contenido
        const postData = {
            pacodcon: codContenido,
            canommat: $('#txt_contenido').val().toUpperCase(),
            cadescon: $('#txt_descripcion').val().toUpperCase()
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFSistem/AccesoDatos/Contenido/AgregarContenido.php' :
            '/MRFSistem/AccesoDatos/Contenido/ModificarContenido.php';

        $.post(url, postData, function (response) {
            console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("CON", corre);
                MostrarMensaje("Datos de Materia guardados correctamente", "success");

            }
            if (edit && response == 'modificado') {
                MostrarMensaje("datos de Materia modificados correctamente", "success")
            }
            edit = false;

            $('#formulario').hide();
            $('#lista').show();
            ListarContenido();
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
    $('#txt_contenido').keyup(function (e) {
        camposVacios();
    });

    $('#txt_descripcion').keyup(function (e) {
        camposVacios();
        //soloLetras(e);
    });
    
    var contador;

    function camposVacios() {
        contador = 0;
        contenido = $('#txt_contenido').val();
        descripcion = $('#txt_descripcion').val();

        if (contenido == "") {
            $("#val_contenido").html("Completa este campo");
            $("#div_contenido").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_contenido").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_contenido").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {
            if (contenido.toString().length < 3) {
                $("#div_contenido").switchClass("border-bottom-success", "border-bottom-danger", 100);
                $("#val_contenido").html("Este campo debe tener al menos 3 letras");
                $("#chk_contenido").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
                $("#chk_contenido").html('<i class="fas fa-exclamation-triangle"></i>');
                //console.log('contenido debe tener almenos 7 carateres');
                contador++;
            }
            else {
                $("#div_contenido").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_contenido").html("");
                $("#chk_contenido").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
                $("#chk_contenido").html('<i class="fas fa-check"></i>');
                //console.log('corecto');
            }
        }
        if (descripcion == "") {
            $("#val_descripcion").html("Completa este campo");
            $("#div_descripcion").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
            $("#chk_descripcion").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_descripcion").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {
            if (descripcion.toString().length < 5) {
                $("#div_descripcion").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
                $("#val_descripcion").html("Este campo debe tener al menos 5 letras");
                $("#chk_descripcion").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
                $("#chk_descripcion").html('<i class="fas fa-exclamation-triangle"></i>');
                //console.log('descripcion debe tener almenos 7 carateres');
                contador++;
            }
            else {
                $("#div_descripcion").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_descripcion").html("");
                $("#chk_descripcion").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
                $("#chk_descripcion").html('<i class="fas fa-check"></i>');
                //console.log('corecto');
            }
        }
        if (contador > 0) {
            $("#btn_guardar").attr("disabled", true);
            $("#btn_guardar").attr("title", "Llene todos los campos requeridos");
            //alertify.alert('Mensaje', 'Deber llenar todos los campos requeridos por el Sistema!');
        }
        else {
            if (contador == 0) {
                $("#btn_guardar").attr("disabled", false);
                $("#btn_guardar").attr("title", "Guardar datos de Materia");

            }
        }
    }
});

