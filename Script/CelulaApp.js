
$(document).ready(function () {

    //Definicion de Variables//
    var codCelula;
    var codBarrio;
    var codCalle;
    var latitud;
    var longitud;
    var edit=false;

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
        marker = L.marker([lat, lon]).addTo(mymap);
    });

    $('#btn_guardar').click(function (e){
        GuardarCelula();
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
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codCelula = getCodigo() + '-' + num;
        console.log(codCelula);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById("txt_nomCelula").focus();
    });

    $('#btn_guardar').click(function (e) {
        Limpiar();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();

    });

    //Funciones//////
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

    function GuardarCelula() {
        const postData = {
            facodbar: codBarrio,
            facodcal: codCalle,
            pacodcel: codCelula,
            canomcel: $('#txt_nomCelula').val(),
            canumcel: $('#txt_numCelula').val(),
            caestcel: true,
            calatcel: latitud,
            calogcel: longitud
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFIglesiaBermejo/AccesoDatos/Celula/AgregarCelula.php' :
            '/MRFIglesiaBermejo/AccesoDatos/Celula/ModificarCelula.php';

        $.post(url, postData, function (response) {
            console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("CEL");
                MostrarMensaje("Datos de Celula guardados correctamente", "success");

            }
            if (edit && response == 'modificado') {
                MostrarMensaje("datos de Celula modificados correctamente", "success")
            }
            edit = false;
            //ListarCelula();
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
            url: '/MRFIglesiaBermejo/AccesoDatos/Barrio/ListarBarrio.php',
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
            url: '/MRFIglesiaBermejo/AccesoDatos/Calle/ListarCalle.php',
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