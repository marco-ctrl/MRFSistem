$(document).ready(function () {

    /*$('#txt_ci').focus(function(){
        $(this).css('border-color', 'red');
        $(this).css('box-shadow:', 'red');
    });*/
    
    //Validacion de Campos Vacios
    var ci, nombre, apPaterno, apMaterno, telefono, estCivil, direccion,
        profesion, nomCiudad, nomCelula, funCel;

    function capturarCampos() {
        ci = $('#txt_ci').val();
        nombre = $('#txt_nombre').val();
        apPaterno = $('#txt_paterno').val();
        apMaterno = $('#txt_materno').val();
        telefono = $('#txt_numcontacto').val();
        estCivil = $('#cbx_estadoCivil').val();
        direccion = $('#txt_direccion').val();
        profesion = $('#inp_profesion').val();
        nomCiudad = $('#cbx_ciudad').val();
        nomCelula = $('#cbx_celula').val();
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
    $('#txt_materno').keyup(function (e) {
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
    $('#inp_profesion').keyup(function (e) {
        capturarCampos();
        camposVacios();
    });

    $('#cbx_funcion').change(function (e) {//asigar codigo profesion
        capturarCampos();
        camposVacios();
        e.preventDefault();

    });

    $('#cbx_estadoCivil').change(function (e) {//asigar codigo profesion
        capturarCampos();
        camposVacios();
        e.preventDefault();

    });

    var contador;

    function camposVacios() {
        //console.log("ciu"+nomCiudad);
        contador = 0;
        if (ci == "") {
            if (ci.length<7){
                console.log('ci debe tener almenos 7 carateres');
                contador++;
            }
            else{
                console.log('corecto');
            }
            
        }
        if (nombre == "") {
            contador++;
        }
        if (apPaterno == "") {
            contador++;
        }
        if (apMaterno == "") {
            contador++;
        }
        if (telefono == "") {
            contador++;
        }
        if (estCivil == "0") {
            contador++;
        }
        if (direccion == "") {
            contador++;
        }
        if (profesion == "") {
            contador++;
        }
        if (nomCiudad == "0") {
            contador++;
        }
        if (nomCelula == "0") {
            contador++;
        }
        if (funCel == "0") {
            contador++;
        }
        if (contador > 0) {
            $("#btn_guardarMiembro").attr("disabled", true);
            //alertify.alert('Mensaje', 'Deber llenar todos los campos requeridos por el Sistema!');
        }
        else {
            if (contador == 0) {
                $("#btn_guardarMiembro").attr("disabled", false);
            }
        }
    }


});

