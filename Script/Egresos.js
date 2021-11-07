$(document).ready(function () {

    var codEconomico;
    var codUsu;
    var corre;
    var edit=false;

    
    //Fecha Actual
    var hoy=new Date().format('Y-m-d');
    $('#dat_maximo').val(hoy);
    $('#dat_Egreso').val(hoy);
    $('#dat_aporte').val(hoy);
    
    ListarEgresos();

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
                url: '/MRFSistem/AccesoDatos/Egresos/BuscarEgresoFecha.php',
                type: 'POST',
                data: { cafecmin, cafecmax },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cel = JSON.parse(response);

                        cel.forEach(cel => {
                            plantilla = MostrarTabla(plantilla, cel);
                        });
                        $('#tb_egresos').html(plantilla);
                    }
                    else {
                        $('#tb_egresos').html(plantilla);
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
        //}
       /* else {
            $('#mensaje').hide();
            ListarEgresos();
        }*/
    });


    $('#txt_buscar').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscar').val()) {
            let buscar = $('#txt_buscar').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Egresos/BuscarEgresos.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cel = JSON.parse(response);

                        cel.forEach(cel => {
                            plantilla = MostrarTabla(plantilla, cel);
                        });
                        $('#tb_egresos').html(plantilla);
                    }
                    else {
                        $('#tb_egresos').html(plantilla);
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
            ListarEgresos();
        }
    });

    function ListarEgresos() {//listar Egresos
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Egresos/ListarEgresos.php',
            type: 'GET',
            success: function (response) {
                let Egresos = JSON.parse(response);
                let plantilla = '';
                Egresos.forEach(con => {
                    plantilla = MostrarTabla(plantilla, con);
                });
                $('#tb_egresos').html(plantilla);
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
        $.post('/MRFSistem/AccesoDatos/Egresos/SingleEgresos.php',
            { pacodapo }, function (responce) {
                const celula = JSON.parse(responce);
                celula.forEach(con => {
                    codEconomico = con.pacodapo,
                    $('#dat_Egreso').val(con.cafecing),
                    $('#txt_cantidad').val(con.camoning),
                    $('#cbx_tipIng').val(con.catiping)
                    });
                //contex.hide();
                document.getElementById("cbx_tipIng").focus();
                edit = true;
            });
    });

    $(document).on('click', '.baja-Egresos', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja esta materia")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodapo = $(elemento).attr('UserDocu');
            $.post('/MRFSistem/AccesoDatos/Egresos/DarBaja.php',
                { pacodapo }, function (responce) {
                    if (responce == 'baja') {
                        ListarEgresos();
                        MostrarMensaje("Egresos dado de baja", "warning");
                    }

                });
        }
    });

    $('#btn_nuevo').click(function (e) {//nuevo registro de Egresos
        $('#lista').hide();
        $('#formulario').show();
        let num = "";
        verificarSecuencia("EGR");
        if (getBan() != "true") {
            setCodigo("EGR");
            setCorrelativo(1);
        }
        else {
            setCodigo("EGR");
            obtenerCorrelativo("EGR");
            setCorrelativo(obtenerSiguinete("EGR"));
        }
        corre=getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codEconomico = getCodigo() + '-' + num;
        console.log(codEconomico);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById('txt_descripcion').focus();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();
        edit=false;
    });

    $('#btn_guardar').click(function (e){
        GuardarEgresos();
        //Limpiar();
    });

    function Limpiar() {//limpiar formulario
        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
    }

    function GuardarEgresos() {//guardar Egresos
        const postData = {
            pacodapo: codEconomico,
            cafecing: $('#dat_Egreso').val(),
            cafecapo: $('#dat_aporte').val(),
            cahorapo: $('#hor_aporte').val(),
            facodusu: $('#txt_codUsuario').val(),
            camoning: $('#txt_cantidad').val(),
            catiping: $('#cbx_tipIng').val(),
            pacodeco: codEconomico
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFSistem/AccesoDatos/Egresos/AgregarEgresos.php' :
            '/MRFSistem/AccesoDatos/Egresos/ModificarEgresos.php';

        $.post(url, postData, function (response) {
            if (!edit && response == 'registra') {
                actualizarSecuencia("EGR", corre);
                MostrarMensaje("Datos de Egreso guardados correctamente", "success");

            }
            if (edit && response == 'modificado') {
                MostrarMensaje("datos de Egreso modificados correctamente", "success")
            }
            edit = false;
           
            $('#formulario').hide();
            $('#lista').show();
            ListarEgresos();
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

