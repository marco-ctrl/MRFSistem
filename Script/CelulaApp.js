
$(document).ready(function () {

    //Definicion de Variables//
    var codCelula;
    var codBarrio;
    var codCalle;
    var latitud;
    var longitud;
    var edit = false;
    var corre1;
    var addBarrio = false;
    var addCalle = false;
    var nomBarrio;
    var nomCalle;

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
    camposVacios();

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
        camposVacios();
    });

    var myModal = new bootstrap.Modal(document.getElementById('md_miembro'), {
        keyboard: false,
        backdrop: 'static',
        focus: true
      })

    $('#buscarCelula').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#buscarCelula').val()) {
            let buscar = $('#buscarCelula').val().toUpperCase();
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


    $('#btn_guardar').click(function (e) {
        GuardarCelula();
        Limpiar();
    });

    $(document).on('click', '.modificar-celula', function () {//modifica usuario

        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcel = $(elemento).attr('UserDocu');
        $.post('/MRFSistem/AccesoDatos/Celula/SingleCelula.php',
            { pacodcel }, function (responce) {
                $('#lista').hide();
                $('#formulario').show();
                
                const celula = JSON.parse(responce);
                celula.forEach(cel => {
                    codCelula = cel.pacodcel,
                        codBarrio = cel.facodbar,
                        codCalle = cel.facodcal,
                        latitud = cel.calatcel,
                        longitud = cel.calogcel,
                        nomBarrio = cel.canombar,
                        nomCalle = cel.canomcal,
                        $('#txt_nomCelula').val(cel.canomcel),
                        $('#txt_numCelula').val(cel.canumcel),
                        $('#inp_barrio').val(cel.canombar),
                        $('#inp_calle').val(cel.canomcal)
                });
                //contex.hide();
                mymap.setView([latitud, longitud], 15);
                L.tileLayer(tilesProvider, {
                    maxZoom: 18,
                }).addTo(mymap);
                if (marker != undefined) {
                    mymap.removeLayer(marker);
                };
                marker = L.marker([latitud, longitud]).addTo(mymap);
                document.getElementById("txt_nomCelula").focus();
                edit = true;
                camposVacios();
            });
    });

    $(document).on('click', '.miembros-celula', function () {//modifica usuario
        console.log('hola mundo');
        myModal.show();
        //habilitarFormulario();
        /*let elemento = $(this)[0].parentElement.parentElement;
        let pacodcel = $(elemento).attr('UserDocu');
        $.post('/MRFSistem/AccesoDatos/Celula/SingleCelula.php',
            { pacodcel }, function (responce) {
                $('#lista').hide();
                $('#formulario').show();
                
                const celula = JSON.parse(responce);
                celula.forEach(cel => {
                    codCelula = cel.pacodcel,
                        codBarrio = cel.facodbar,
                        codCalle = cel.facodcal,
                        latitud = cel.calatcel,
                        longitud = cel.calogcel,
                        nomBarrio = cel.canombar,
                        nomCalle = cel.canomcal,
                        $('#txt_nomCelula').val(cel.canomcel),
                        $('#txt_numCelula').val(cel.canumcel),
                        $('#inp_barrio').val(cel.canombar),
                        $('#inp_calle').val(cel.canomcal)
                });
                //contex.hide();
                mymap.setView([latitud, longitud], 15);
                L.tileLayer(tilesProvider, {
                    maxZoom: 18,
                }).addTo(mymap);
                if (marker != undefined) {
                    mymap.removeLayer(marker);
                };
                marker = L.marker([latitud, longitud]).addTo(mymap);
                document.getElementById("txt_nomCelula").focus();
                edit = true;
                camposVacios();
            });*/
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
            beforeSend: function () {
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'visible';
                contenedor.style.opacity = '200'
            },
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
                <td ALIGN="CENTER">
                    <button class="baja-celula btn btn-danger" title="Dar de Baja Celula">
                    <i class="fas fa-trash-alt "></i></button>
                    
                </td>
                <td ALIGN="CENTER">
                    <button class="modificar-celula btn btn-secondary" title="Modificar Celula">
                    <i class="far fa-edit "></i></button>
                </td>
                <td ALIGN="CENTER">
                    <button class="miembros-celula btn btn-primary" title="Miembros de la Celula"
                    data-bs-toggle="modal" data-bs-target="#md_miembro"><i class="fas fa-users"></i></button>
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
            calogcel: longitud,
            nomBarrio: nomBarrio,
            addBarrio: addBarrio,
            addCalle: addCalle,
            nomCalle: nomCalle
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFSistem/AccesoDatos/Celula/AgregarCelula.php' :
            '/MRFSistem/AccesoDatos/Celula/ModificarCelula.php';

        $.post(url, postData, function (response) {
            console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("CEL", corre1);
                alertify.alert('Mensaje', 'Datos de Celulas guardados correctamente', function () { alertify.success('Se guardó correctamente'); });
                ListarCelula();
            }
            if (edit && response == 'modificado') {
                alertify.alert('Mensaje', 'Datos de Celulas modificados correctamente', function () { alertify.success('Se modifico correctamente'); });
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
                let plantilla = '<option value="">Eligir Barrio</option>';
                barrio.forEach(barrio => {
                    //plantilla += `<option value="${barrio.pacodbar}" class="cod-barrio">${barrio.canombar}</option>`;
                    plantilla += `<option data-codigo="${barrio.pacodbar}" data-nombre="${barrio.canombar}" value="${barrio.canombar}"></option>`;
                });
                $('#dat_barrio').html(plantilla);
            }
        });
    }

    $('#inp_barrio').on('input', function () {//asigar codigo barrio
        camposVacios();
        var val = $('#inp_barrio').val().toUpperCase();
        var ejemplo = $('#dat_barrio').find('option[value="' + val + '"]').data('codigo');
        var ejemplo1 = $('#dat_barrio').find('option[value="' + val + '"]').data('nombre');

        if (ejemplo === undefined) {
            console.log("EmpName no está definido");
            //banPro = true;
            //nuevaProfesion();
            addBarrio = true;
            nomBarrio = val;
            codBarrio = "";
            console.log(codBarrio);
        } else {
            codBarrio = ejemplo;
            nomBarrio = ejemplo1;
            //banPro = false;
            console.log("EmpName está definido");
            console.log(codBarrio);
        }
    });

    $('#inp_calle').on('input', function () {//asigar codigo calle
        camposVacios();
        var val = $('#inp_calle').val().toUpperCase();
        var ejemplo = $('#dat_calle').find('option[value="' + val + '"]').data('codigo');
        var ejemplo1 = $('#dat_calle').find('option[value="' + val + '"]').data('nombre');

        if (ejemplo === undefined) {
            console.log("EmpName no está definido");
            //banPro = true;
            //nuevaProfesion();
            addCalle = true;
            nomCalle = val;
            codCalle = "";
            console.log(codCalle);
        } else {
            codCalle = ejemplo;
            nomCalle = ejemplo1;
            //banPro = false;
            console.log("EmpName está definido");
            console.log(codCalle);
        }
    });

    function listarCalle() {//listar Calle
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Calle/ListarCalle.php',
            type: 'GET',
            success: function (response) {
                let calle = JSON.parse(response);
                let plantilla = '<option value="">Eligir Calle</option>';
                calle.forEach(calle => {
                    //plantilla += `<option value="" class="cod-calle">${calle.canomcal}</option>`;
                    plantilla += `<option data-codigo="${calle.pacodcal}" data-nombre="${calle.canomcal}" value="${calle.canomcal}"></option>`;
                });
                $('#dat_calle').html(plantilla);
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

    function camposVacios() {
        let celula = $('#txt_nomCelula').val();
        let numero = $('#txt_numCelula').val();
        let barrio = $('#inp_barrio').val();
        let calle = $('#inp_calle').val();
        let Latitud = latitud;
        let Longitud = longitud;

        let contador = 0;

        if (celula == '') {
            contador++
        }
        if (numero == '') {
            contador++
        }
        if (barrio == '') {
            contador++
        }
        if (calle == '') {
            contador++
        }
        if (Latitud === undefined) {
            contador++
        }
        if (Longitud === undefined) {
            contador++
        }

        if (contador > 0) {
            $('#btn_guardar').attr('disabled', true);
        }
        else {
            $('#btn_guardar').attr('disabled', false);
        }
    }

    $('#txt_nomCelula').keyup(function (e) {
        camposVacios();
    });

    $('#txt_numCelula').keyup(function (e) {
        camposVacios();
    });



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