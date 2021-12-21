$(document).ready(function () {

    var codCaja;
    var corre;
    var edit = false;

    var monInicial = 0
    var totIngresos = 0;
    var totEgresos = 0;
    var totEgresosPor = 0;
    var monFinal = 0;

    //ListarItems();

    //Fecha Actual
    var hoy = new Date().format('Y-m-d');
    fechaActual();
    function fechaActual() {
        $('#dat_maximo').val(hoy);
        $('#dat_Egreso').val(hoy);
        $('#dat_caja').val(hoy);
        myFunc();
        setInterval(myFunc, 1000);
    }

    ListarCaja();
    //ListarDetalleIngresos();

    $('#formulario').hide();//ocultar formulario

    function myFunc() {
        var now = new Date();
        var time = now.getHours() + ":" + now.getMinutes();
        //document.getElementById('hor_caja').innerHTML= time;
        $('#hor_caja').val(time);
    }


    $('#btn_busFec').click(function (e) {//permite hacer busqueda de miembros
        //if ($('#btn_busFec').val()) {
        let cafecmin = $('#dat_inicio').val();
        let cafecmax = $('#dat_maximo').val();
        let plantilla = '';
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Caja/BuscarFechaCaja.php',
            type: 'POST',
            data: { cafecmin, cafecmax },
            success: function (response) {
                ////console.log(response);
                if (response != "no encontrado") {
                    let cel = JSON.parse(response);

                    cel.forEach(cel => {
                        plantilla = MostrarTabla(plantilla, cel);
                    });
                    $('#tb_caja').html(plantilla);
                }

                else {
                    if (response == "no encontrado") {
                        plantilla = '<tr><td colspan="9" align="center">Datos no encontrados!</td></tr>'
                        $('#tb_caja').html(plantilla);
                    }
                }
            }
        });
    });


    function ListarCaja() {//listar Caja
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Caja/ListarCaja.php',
            type: 'GET',
            beforeSend: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200'
                ////console.log("cargando..");
            },
            complete: function() {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'hidden';
                contenedor.style.opacity = '0';
            },
            success: function (response) {
                ////console.log(response);
                if (response != "false") {
                    let Caja = JSON.parse(response);
                    let plantilla = '';
                    Caja.forEach(con => {
                        plantilla = MostrarTabla(plantilla, con);
                    });
                    $('#tb_caja').html(plantilla);
                }

            }
        });
    }

    function ListarDetalleIngresos() {//listar tabla detalle de ingresos
        let plantilla;
        let plantilla1;
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Caja/ListarTotalIngresos.php',
            type: 'POST',
            data: { codCaja },
            success: function (response) {
                if (response != "no encontrado") {
                    ////console.log(response);
                    let cel = JSON.parse(response);

                    cel.forEach(cel => {
                        plantilla += `<tr><td>${cel.catiping}</td>
                                    <td align="right">${cel.catoting}</td></tr>`;
                        totIngresos += parseFloat(cel.catoting);
                    });
                    ////console.log(suma);
                    plantilla1 = `<tr>
                                    <td>TOTAL</td>
                                    <td align="right">${totIngresos}</td>
                                  </tr>`
                    $('#tb_detIngresos').html(plantilla);
                    $('#tf_ingresos').html(plantilla1);
                    $('#txt_toting').val(totIngresos);
                    ListarDetalleEgresosPorcentual();

                }
            },
        });
    }

    function ListarDetalleEgresos(plantilla) {//listar tabla detalle de egresos
        //let plantilla;
        let plantilla1;
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Caja/ListarTotalEgresos.php',
            type: 'POST',
            data: { codCaja },
            success: function (response) {
                if (response != "no encontrado") {
                    ////console.log(response);
                    let cel = JSON.parse(response);

                    cel.forEach(cel => {
                        plantilla += `<tr><td>${cel.cadesegr}</td>
                                    <td align="right">${cel.catotegr}</td></tr>`;
                        totEgresos += parseFloat(cel.catotegr);
                    });
                    ////console.log(suma);
                    totEgresos += totEgresosPor;
                    plantilla1 = `<tr>
                                    <td>TOTAL</td>
                                    <td align="right">${totEgresos}</td>
                                  </tr>`
                    $('#tb_detEgresos').html(plantilla);
                    $('#tf_egresos').html(plantilla1);
                    $('#txt_totegr').val(totEgresos);
                    monFinal = (monInicial + totIngresos) - totEgresos;
                    $('#txt_monfin').val(round(monFinal));
                    ////console.log(round(monFinal));
                }
            },
        });
    }

    function ListarDetalleEgresosPorcentual() {//listar tabla detalle de egresos
        let plantilla;
        let plantilla1;
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Caja/ListarTotalEgresosPorcentual.php',
            type: 'POST',
            data: { codCaja },
            success: function (response) {
                if (response != "no encontrado") {
                    ////console.log(response);
                    let cel = JSON.parse(response);

                    cel.forEach(cel => {
                        plantilla += `<tr><td>${cel.cadesefe}(${cel.cacanefe}%)</td>
                                    <td align="right">${cel.total}</td></tr>`;
                        totEgresosPor += parseFloat(cel.total);
                    });
                    ListarDetalleEgresos(plantilla);
                }
            },
        });
    }


    function MostrarTabla(plantilla, usu) {//////Mostrar Tabla///////////
        let disable;
        let estado
        if (usu.caestcaj == 1) {
            estado = "ABIERTO";
            disable = "";
        }
        if (usu.caestcaj == 0) {
            estado = "CERRADO";
            disable = "disabled"
        }
        plantilla +=
            `<tr UserDocu="${usu.pacodcaj}" class="table-light">
                <td>${usu.pacodcaj}</td>
                <td>${usu.cainicaj}</td>
                <td>${usu.camonini}</td>
                <td>${usu.catoting}</td>
                <td>${usu.catotegr}</td>
                <td>${usu.cafincaj}</td>
                <td>${usu.camonfin}</td>
                <td>`+ estado + `</td>
                <td>
                    <button type="button" class="cerrar-caja btn btn-danger" ${disable}>Cerrar</button>
                </td>
            </tr>`
        return plantilla;
    }

    $(document).on('click', '.cerrar-caja', function () {//modifica usuario
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcaj = $(elemento).attr('UserDocu');
        //agregarEgresoPorcentual(pacodcaj);
        cerrarCaja(pacodcaj);
    });

    function cerrarCaja(pacodcaj) {
        fechaActual();
        $.post('/MRFSistem/AccesoDatos/Caja/SingleCaja.php',
            { pacodcaj }, function (responce) {
                ////console.log(responce);
                $('#lista').hide();
                $('#formulario').show();
                $("#btn_nuevo").attr("disabled", true);
                const celula = JSON.parse(responce);
                celula.forEach(con => {
                    codCaja = con.pacodcaj,
                        $('#dat_inicaja').val(con.cainicaj),
                        $('#txt_moninicial').val(con.camonini)
                });
                monInicial = parseFloat($('#txt_moninicial').val());
                ListarDetalleIngresos();
                ////console.log(codCaja);
                edit = true;
            });
    }

    $('#btn_nuevo').click(function (e) {//nuevo registro de Caja
        verificarApertura();
    });

    $('#btn_cancelarApe').click(function (e) {
        myModal.hide();
    });

    $('#btn_aperturar').click(function (e) {
        AbrirCaja();
    })

    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
        keyboard: false,
        backdrop: 'static',
        focus: true
    });

    function verificarApertura() {
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Caja/VerificarApertura.php',
            type: 'GET',
            beforeSend: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200'
                ////console.log("cargando..");
            },
            success: function (response) {
                ////console.log(response);
                if (response == "false") {
                    aperturarCaja();
                    myModal.show();
                }
                else {
                    alertify.alert('Mensaje', 'Ya existe una caja abierta', function () { alertify.error('se cancelo la apertura de caja'); });
                }

            }
        });
    }

    function aperturarCaja() {
        fechaActual();
        let num = "";
        verificarSecuencia("CAJ");
        if (getBan() != "true") {
            setCodigo("CAJ");
            setCorrelativo(1);
        }
        else {
            setCodigo("CAJ");
            obtenerCorrelativo("CAJ");
            setCorrelativo(obtenerSiguinete("CAJ"));
        }
        corre = getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codCaja = getCodigo() + '-' + num;
        ////console.log(codCaja);
        // 
        document.getElementById('txt_monini').focus();
    }

    $('#btn_cancelar').click(function (e) {
        Limpiar();
        edit = false;
        totEgresosPor = 0;
        totIngresos = 0;
        totEgresos = 0;
        monFinal = 0;
    });

    $('#btn_guardar').click(function (e) {
        agregarEgresoPorcentual(codCaja);
        //Limpiar();
    });

    function Limpiar() {//limpiar formulario
        //$('#form1').trigger('reset');
        //$('#form2').trigger('reset');
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
        edit = false;
    }

    function AbrirCaja() {//guardar Caja
        const postData = {
            pacodcaj: codCaja,
            cainicaj: $('#dat_caja').val(),
            camonini: $('#txt_monini').val()
        };
        ////console.log(postData);
        let url = '/MRFSistem/AccesoDatos/Caja/AperturarCaja.php';

        $.post(url, postData, function (response) {
            ////console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("CAJ", corre);
                myModal.hide();
                //MostrarMensaje("Datos de Egreso guardados correctamente", "success");
                alertify.alert('Mensaje', 'Se Aperturo una nueva Caja', function () { alertify.success('Caja Aperturada'); });
            }

            //$('#formulario').hide();
            //$('#lista').show();
            $('#txt_monini').val(' ');
            ListarCaja();
            //Limpiar();
        });

    }

    function ArqueoCaja() {//guardar Caja
        ////console.log(codCaja);
        const postData = {
            pacodcaj: codCaja,
            cainicaj: $('#dat_inicaja').val(),
            camonini: $('#txt_monini').val(),
            cafincaj: $('#dat_fincaja').val(),
            camonfin: $('#txt_monfin').val(),
            caestcaj: 0,
            catoting: $('#txt_toting').val(),
            catotegr: $('#txt_totegr').val()
        };
        ////console.log(postData);
        let url = '/MRFSistem/AccesoDatos/Caja/CerrarCaja.php';
        //$.ajax();

        $.post(url, postData, function (response) {
            ////console.log(response);
            if (response == 'modificado') {
                //MostrarMensaje("datos de Egreso modificados correctamente", "success")
                alertify.alert('Mensaje', 'Se Cerro la Caja', function () { alertify.success('Caja cerrada exitosamente'); });

            }
            edit = false;

            $('#formulario').hide();
            $('#lista').show();
            ListarCaja();
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

    function round(num) {//funcion para redondear numero mas presisios
        var m = Number((Math.abs(num) * 100).toPrecision(15));
        return Math.round(m) / 100 * Math.sign(num);
    }

    function agregarEgresoPorcentual(pacodcaj) {

        const postData = {
            pacodcaj: pacodcaj,
            pacodusu: $('#txt_codCajero').val()
        };
        //console.log(postData);
        let url = '/MRFSistem/AccesoDatos/Caja/RegistrarEgresosPorcentual.php';
        //$.ajax();

        $.post(url, postData, function (response) {
            //console.log(response);
            if (response == 'registra') {
                ArqueoCaja();
            }

        });

    }
});

