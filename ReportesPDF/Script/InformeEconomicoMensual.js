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
                    $('#tb_informe').html(plantilla);
                }

                else {
                    if (response == "no encontrado") {
                        plantilla = '<tr><td colspan="9" align="center">Datos no encontrados!</td></tr>'
                        $('#tb_informe').html(plantilla);
                    }
                }
            }
        });
    });


    function ListarCaja() {//listar Caja
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Caja/ListarCajaCerrada.php',
            type: 'GET',
            beforeSend: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200'
                ////console.log("cargando..");
            },
            success: function (response) {
                ////console.log(response);
                if (response != "false") {
                    let Caja = JSON.parse(response);
                    let plantilla = '';
                    Caja.forEach(con => {
                        plantilla = MostrarTabla(plantilla, con);
                    });
                    $('#tb_informe').html(plantilla);
                }

            }
        });
    }

    
    
    
    function MostrarTabla(plantilla, usu) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${usu.pacodcaj}" class="table-light">
                <td>${usu.pacodcaj}</td>
                <td>${usu.cainicaj}</td>
                <td>${usu.camonini}</td>
                <td>${usu.catoting}</td>
                <td>${usu.catotegr}</td>
                <td>${usu.cafincaj}</td>
                <td>${usu.camonfin}</td>
                <td>CERRADO</td>
                <td>
                    <button type="button" class="generar-informe btn btn-primary"><i class="far fa-file-pdf"></i></button>
                </td>
            </tr>`
        return plantilla;
    }

    $(document).on('click', '.generar-informe', function () {//modifica usuario
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcaj = $(elemento).attr('UserDocu');
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_InformeEconomicoMensual.php?pacodcaj=' + pacodcaj);
        //agregarEgresoPorcentual(pacodcaj);
        //cerrarCaja(pacodcaj);
    });

    function abrirNuevoTab(url) {
        // Abrir nuevo tab
        var win = window.open(url, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();
    }


    
});

