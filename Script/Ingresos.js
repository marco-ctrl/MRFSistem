$(document).ready(function () {

    var codEconomico;
    var codUsu;
    var corre;
    var edit=false;

    
    //Fecha Actual
    var hoy=new Date().format('Y-m-d');
    $('#dat_maximo').val(hoy);
    $('#dat_ingreso').val(hoy);
    $('#dat_aporte').val(hoy);
    
    ListarIngresos();

    $('#formulario').hide();//ocultar formulario

    function myFunc()  {
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


    $('#txt_buscar').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscar').val()) {
            let buscar = $('#txt_buscar').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Ingresos/BuscarIngresos.php',
                type: 'POST',
                data: { buscar },
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
            ListarIngresos();
        }
    });

    function ListarIngresos() {//listar Ingresos
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Ingresos/ListarIngresos.php',
            type: 'GET',
            success: function (response) {
                let Ingresos = JSON.parse(response);
                let plantilla = '';
                Ingresos.forEach(con => {
                    plantilla = MostrarTabla(plantilla, con);
                });
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
        $('#lista').hide();
        $('#formulario').show();
        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodapo = $(elemento).attr('UserDocu');
        $.post('/MRFSistem/AccesoDatos/Ingresos/SingleIngresos.php',
            { pacodapo }, function (responce) {
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
        $('#lista').hide();
        $('#formulario').show();
        let num = "";
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
        corre=getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codEconomico = getCodigo() + '-' + num;
        console.log(codEconomico);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById('cbx_tipIng').focus();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();
        edit=false;
    });

    $('#btn_guardar').click(function (e){
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
            pacodeco: codEconomico
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFSistem/AccesoDatos/Ingresos/AgregarIngresos.php' :
            '/MRFSistem/AccesoDatos/Ingresos/ModificarIngresos.php';

        $.post(url, postData, function (response) {
            if (!edit && response == 'registra') {
                actualizarSecuencia("ING", corre);
                MostrarMensaje("Datos de Ingreso guardados correctamente", "success");

            }
            if (edit && response == 'modificado') {
                MostrarMensaje("datos de Ingreso modificados correctamente", "success")
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


});

