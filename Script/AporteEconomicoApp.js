$(document).ready(function () {

    var codEconomico;
    var codUsu;
    var corre;
    var edit=false;

    ListarAporte();

    $('#formulario').hide();//ocultar formulario

    function myFunc()  {
        var now = new Date();
        var time = now.getHours() + ":" + now.getMinutes();
        //document.getElementById('hor_aporte').innerHTML= time;
        $('#hor_aporte').val(time);
    }
    myFunc();
    setInterval(myFunc, 1000);

    $('#txt_buscar').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscar').val()) {
            let buscar = $('#txt_buscar').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFIglesiaBermejo/AccesoDatos/Contenido/BuscarContenido.php',
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
            ListarAporte();
        }
    });

    function ListarAporte() {//listar Contenido
        $.ajax({
            url: '/MRFIglesiaBermejo/AccesoDatos/AporteEconomico/ListarAporte.php',
            type: 'GET',
            success: function (response) {
                let contenido = JSON.parse(response);
                let plantilla = '';
                console.log(contenido);
                contenido.forEach(con => {
                    plantilla = MostrarTabla(plantilla, con);
                });
                $('#tb_economico').html(plantilla);
            }
        });
    }
    
    function MostrarTabla(plantilla, usu) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${usu.pacodapo}" class="table-light">
                <td>${usu.pacodapo}</td>
                <td>${usu.camontot}</td>
                <td>${usu.cafecapo} ${usu.cahorapo} </td>
                <td>${usu.canommie} ${usu.capatmie} ${usu.camatmie} </td>
                <td>
                    <button class="baja-aporte btn btn-danger">
                    <i class="fas fa-trash-alt gi-2x"></i></button>
                </>
                <td style="width:15%">
                    <button class="modificar-aporte btn btn-secondary">
                    <i class="far fa-edit gi-2x"></i></button>
                </td>
            </tr>`
        return plantilla;
    }

    $(document).on('click', '.modificar-contenido', function () {//modifica usuario
        $('#lista').hide();
        $('#formulario').show();
        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcon = $(elemento).attr('UserDocu');
        $.post('/MRFIglesiaBermejo/AccesoDatos/Contenido/SingleContenido.php',
            { pacodcon }, function (responce) {
                const celula = JSON.parse(responce);
                celula.forEach(con => {
                    codContenido = con.pacodcon,
                    $('#txt_contenido').val(con.canommat),
                    $('#txt_descripcion').val(con.cadescon)
                    });
                //contex.hide();
                document.getElementById("txt_contenido").focus();
                edit = true;
            });
    });

    $(document).on('click', '.baja-contenido', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja esta materia")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodcon = $(elemento).attr('UserDocu');
            $.post('/MRFIglesiaBermejo/AccesoDatos/Contenido/DarBaja.php',
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
        verificarSecuencia("APE");
        if (getBan() != "true") {
            setCodigo("APE");
            setCorrelativo(1);
        }
        else {
            setCodigo("APE");
            obtenerCorrelativo("APE");
            setCorrelativo(obtenerSiguinete("APE"));
        }
        corre=getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codEconomico = getCodigo() + '-' + num;
        console.log(codEconomico);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById("txt_cantidad").focus();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();

    });

    $('#btn_guardar').click(function (e){
        GuardarAporteEco();
        Limpiar();
    });

    function Limpiar() {//limpiar formulario
        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
    }

    function GuardarAporteEco() {//guardar contenido
        const postData = {
            pacodapo: codEconomico,
            cafecapo: $('#dat_aporte').val(),
            cahorapo: $('#hor_aporte').val(),
            facodusu: $('#txt_codUsuario').val(),
            camontot: $('#txt_cantidad').val(),
            pacodeco: codEconomico
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFIglesiaBermejo/AccesoDatos/AporteEconomico/AgregarAporte.php' :
            '/MRFIglesiaBermejo/AccesoDatos/AporteEconomico/ModificarAporte.php';

        $.post(url, postData, function (response) {
            console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("APE", corre);
                MostrarMensaje("Datos de Materia guardados correctamente", "success");

            }
            if (edit && response == 'modificado') {
                MostrarMensaje("datos de Materia modificados correctamente", "success")
            }
            edit = false;
           
            $('#formulario').hide();
            $('#lista').show();
            ListarAporte();
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


});

