
$(document).ready(function () {

    //Definicion de Variables//
    var codCelula;
    var codBarrio;
    var codCalle;
    var latitud;
    var longitud;
    var edit=false;
    var corre1;

    const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var mymap = L.map('map').setView([-22.735938864584394, -64.34173274785282], 15);
    L.tileLayer(tilesProvider, {
        maxZoom: 18,
    }).addTo(mymap);
    //Marcador en el mapa//
    var marker = L.marker([-22.735938864584394, -64.34173274785282]).addTo(mymap);

    //Listar Datos//
    listarBarrio();
    listarCalle();
    ListarCelula();

    $('#formulario').hide();//ocultar formulario

    ////Eventos//////
    mymap.doubleClickZoom.disable()//evitar que el mapa se haga zoom al hacer dobleclic

    mymap.on('dblclick', function (e) {//poner un marcador en el mapa
        lat = e.latlng.lat;
        lon = e.latlng.lng;

        latitud = lat;
        longitud = lon;
        console.log("You clicked the map at LAT: " + latitud + " and LONG: " + longitud);
        //Clear existing marker, 
        if (marker != undefined) {
            mymap.removeLayer(marker);
        };
        //Add a marker to show where you clicked.
        marker = L.marker([latitud, longitud]).addTo(mymap);
    });

    $('#txt_buscar').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscar').val()) {
            let buscar = $('#txt_buscar').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Celula/BuscarCelula.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cel = JSON.parse(response);

                        cel.forEach(cel => {
                            plantilla = MostrarTabla(plantilla, cel);
                        });
                        $('#tb_celula').html(plantilla);
                    }
                    else {
                        $('#tb_celula').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>La Celula ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
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
            ListarCelula();
        }
    });


    $('#btn_guardar').click(function (e){
        GuardarCelula();
        Limpiar();
    });

    $(document).on('click', '.modificar-celula', function () {//modifica usuario
        $('#lista').hide();
        $('#formulario').show();
        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcel = $(elemento).attr('UserDocu');
        $.post('/MRFSistem/AccesoDatos/Celula/SingleCelula.php',
            { pacodcel }, function (responce) {
                console.log(responce);
                const celula = JSON.parse(responce);
                celula.forEach(cel => {
                    codCelula = cel.pacodcel,
                    codBarrio = cel.facodbar,
                    codCalle  = cel.facodcal,
                    latitud = cel.calatcel,
                    longitud = cel.calogcel,
                    $('#txt_nomCelula').val(cel.canomcel),
                    $('#txt_numCelula').val(cel.canumcel),
                    $('#cbx_barrio').val(cel.pacodbar),
                    $('#cbx_calle').val(cel.pacodcal)
                    });
                //contex.hide();
                if (marker != undefined) {
                    mymap.removeLayer(marker);
                };
                marker = L.marker([latitud, longitud]).addTo(mymap);
                document.getElementById("txt_nomCelula").focus();
                edit = true;
            });
    });

    $(document).on('click', '.baja-celula', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja esta celula")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodcel = $(elemento).attr('UserDocu');
            $.post('/MRFSistem/AccesoDatos/Celula/DarBaja.php',
                { pacodcel }, function (responce) {
                    if (responce == 'baja') {
                        ListarCelula();
                        MostrarMensaje("Celula dado de baja", "warning");
                    }

                });
        }
    });

    $('#cbx_barrio').change(function (e) {//asignar codigo de cuidad
        codBarrio = $('#cbx_barrio').val();
        console.log("codigo barrio " + codBarrio);
        e.preventDefault();

    });

    $('#cbx_calle').change(function (e) {//asignar codigo de cuidad
        codCalle = $('#cbx_calle').val();
        console.log("codigo calle " + codCalle);
        e.preventDefault();

    });

    $('#btn_nuevo').click(function (e) {//nuevo registro de Celula 
        $('#lista').hide();
        $('#formulario').show();
        let num = "";
        verificarSecuencia("CEL");
        if (getBan() != "true") {
            setCodigo("CEL");
            setCorrelativo(1);
        }
        else {
            setCodigo("CEL");
            obtenerCorrelativo("CEL");
            setCorrelativo(obtenerSiguinete("CEL"));
        }
        corre1 = getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codCelula = getCodigo() + '-' + num;
        console.log(codCelula);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById("txt_nomCelula").focus();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();

    });

    //Funciones//////
    function ListarCelula() {//listar Celula
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Celula/ListarCelula.php',
            type: 'GET',
            success: function (response) {
                let celula = JSON.parse(response);
                let plantilla = '';
                celula.forEach(usu => {
                    plantilla = MostrarTabla(plantilla, usu);
                });
                $('#tb_celula').html(plantilla);
            }
        });
    }

    function MostrarTabla(plantilla, usu) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${usu.pacodcel}" class="table-light">
                <td>${usu.canomcel}</td>
                <td>${usu.canumcel}</td>
                <td>B/${usu.canombar} C/${usu.canomcal}</td>
                <td>
                    <button class="baja-celula btn btn-danger">
                    <i class="fas fa-trash-alt "></i></button>
                </>
                <td style="width:15%">
                    <button class="modificar-celula btn btn-secondary">
                    <i class="far fa-edit "></i></button>
                </td>
            </tr>`
        return plantilla;
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

    //$('#btn_guardar').click(function (e){
    function GuardarCelula() {
        const postData = {
            facodbar: codBarrio,
            facodcal: codCalle,
            pacodcel: codCelula,
            canomcel: $('#txt_nomCelula').val().toUpperCase(),
            canumcel: $('#txt_numCelula').val(),
            caestcel: true,
            calatcel: latitud,
            calogcel: longitud
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFSistem/AccesoDatos/Celula/AgregarCelula.php' :
            '/MRFSistem/AccesoDatos/Celula/ModificarCelula.php';

        $.post(url, postData, function (response) {
            console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("CEL", corre1);
                MostrarMensaje("Datos de Celula guardados correctamente", "success");
                ListarCelula();
            }
            if (edit && response == 'modificado') {
                MostrarMensaje("datos de Celula modificados correctamente", "success")
                ListarCelula();
            }
            edit = false;
           
            $('#formulario').hide();
            $('#lista').show();
            
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

    function listarBarrio() {//listar Barrio
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Barrio/ListarBarrio.php',
            type: 'GET',
            success: function (response) {
                let barrio = JSON.parse(response);
                let plantilla = '<option value=0>Eligir Bario</option>';
                barrio.forEach(barrio => {
                    plantilla += `<option value="${barrio.pacodbar}" class="cod-barrio">${barrio.canombar}</option>`;
                });
                $('#cbx_barrio').html(plantilla);
            }
        });
    }

    function listarCalle() {//listar Calle
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Calle/ListarCalle.php',
            type: 'GET',
            success: function (response) {
                let calle = JSON.parse(response);
                let plantilla = '<option value=0>Eligir Calle</option>';
                calle.forEach(calle => {
                    plantilla += `<option value="${calle.pacodcal}" class="cod-calle">${calle.canomcal}</option>`;
                });
                $('#cbx_calle').html(plantilla);
            }
        });
    }

    function Limpiar() {//limpiar formulario
        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
    }

    function localizacion(pocision) {
        var latitud = pocision.coords.latitude;
        var longitud = pocision.coords.longitude;
        plantilla = `<p>${latitud} ${longitud}</p>`;
        $('#pos').html(plantilla);
        console.log(latitud + " " + longitud);
    }

    function Error() {
        console.log("ocurrio un error al obtener ubicacion");
    }
});