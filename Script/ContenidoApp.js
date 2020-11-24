$(document).ready(function () {

    var condContenido;
    var corre;
    var edit=false;

    ListarContenido();

    $('#formulario').hide();//ocultar formulario

    function ListarContenido() {//listar Contenido
        $.ajax({
            url: '/MRFIglesiaBermejo/AccesoDatos/Contenido/ListarContenido.php',
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
                    <i class="fas fa-trash-alt gi-2x"></i></button>
                </>
                <td style="width:15%">
                    <button class="modificar-contenido btn btn-secondary">
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
        corre=getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codContenido = getCodigo() + '-' + num;
        console.log(codContenido);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById("txt_contenido").focus();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();

    });

    $('#btn_guardar').click(function (e){
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
            '/MRFIglesiaBermejo/AccesoDatos/Contenido/AgregarContenido.php' :
            '/MRFIglesiaBermejo/AccesoDatos/Contenido/ModificarContenido.php';

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


});

