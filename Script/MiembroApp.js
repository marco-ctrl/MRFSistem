$(document).ready(function () {

    ListarMiembro();
    ListarProfesion();
    ListarCiudad();
    let edit = false;

    let codProfesion, codCiudad;
    let codMiembro;

    DeshabilitarFormulario();

    $('#mensaje').hide();

    $('#txt_buscar').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscar').val()) {
            let buscar = $('#txt_buscar').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFIglesiaBermejo/AccesoDatos/Miembro/BuscarMiembro.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let usuario = JSON.parse(response);

                        usuario.forEach(usuario => {
                            plantilla = MostrarTabla(plantilla, usuario);
                        });
                        $('#tb_miembro').html(plantilla);
                    }
                    else {
                        $('#tb_miembro').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Miembro ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
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
            ListarMiembro();
        }

    });
    $('#btn_guardar').click(function (e) {//permiete guardar Usuario
        const canvas = document.getElementById('canvas');
        var foto = canvas.toDataURL('image/jpeg', 1.0);
        const postData = {
            pacodmie: codMiembro,
            cacidmie: $('#txt_ci').val(),
            canommie: $('#txt_nombre').val().toUpperCase(),
            capatmie: $('#txt_paterno').val().toUpperCase(),
            camatmie: $('#txt_materno').val().toUpperCase(),
            cacelmie: $('#txt_numcontacto').val(),
            cafecnac: $('#txt_fecnac').val(),
            caestciv: $('#cbx_estadoCivil').val(),
            cadirmie: $('#txt_direccion').val().toUpperCase(),
            caestmie: true,
            facodpro: codProfesion,
            facodciu: codCiudad,
            cafotmie: encodeURIComponent(foto)
        };

        let url = edit === false ?
            '/MRFIglesiaBermejo/AccesoDatos/Miembro/AgregarMiembro.php' :
            '/MRFIglesiaBermejo/AccesoDatos/Miembro/ModificarMiembro.php';

        $.post(url, postData, function (response) {
            console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("MBR");
                let mensaje = `<div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Datos guardados correctamente</strong>
              </div>`;
                $('#mensaje').html(mensaje);
                $('#mensaje').show();
            }
            if (edit && response == 'modificado') {
                let mensaje = `<div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Datos modificados correctamente</strong>
              </div>`;
                $('#mensaje').html(mensaje);
                $('#mensaje').show();
            }
            ListarMiembro();
            $('#form1').trigger('reset');
            $('#form2').trigger('reset');
            $('#form3').trigger('reset');
            DeshabilitarFormulario();
            edit = false;
        });
    });

    function ListarMiembro() {//lista usuarios
        $.ajax({
            url: '/MRFIglesiaBermejo/AccesoDatos/Miembro/ListarMiembro.php',
            type: 'GET',
            success: function (response) {
                let miembros = JSON.parse(response);
                let plantilla = '';
                miembros.forEach(miembros => {
                    plantilla = MostrarTabla(plantilla, miembros);
                });
                $('#tb_miembro').html(plantilla);
            }
        });
    }


    function MostrarTabla(plantilla, miembros) {
        plantilla +=
            `<tr UserDocu="${miembros.pacodmie}" class="table-light">
                <td>${miembros.cacidmie}</td>
                <td>${miembros.canommie}</td>
                <td>${miembros.capatmie} ${miembros.camatmie}</td>
                <td>${miembros.cafecnac}</td>
                <td>${miembros.cacelmie}</td>
                <td>${miembros.canompro}</td>
                <td>${miembros.cadirmie}</td>
                <td>
                    <button class="baja-miembro btn btn-danger">
                        Baja
                    </button>
                </td>
                <td>
                    <button class="modificar-miembro btn btn-secondary">
                        modificar</button>
                </td>
            </tr>`
        return plantilla;
    }

    $(document).on('click', '.baja-miembro', function () {//elimina usuario

        if (confirm("Seguro que desea dar de baja este Miembro de la iglesia")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodmie = $(elemento).attr('UserDocu');
            console.log('dando de baja...');
            $.post('/MRFIglesiaBermejo/AccesoDatos/Miembro/DarBaja.php',
                { pacodmie }, function (responce) {
                    if (responce == 'baja') {
                        ListarMiembro();
                        let mensaje = `<div class="alert alert-dismissible alert-primary">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Miembro dado de baja</strong>
                                </div>`;
                        $('#mensaje').html(mensaje);
                        $('#mensaje').show();
                    }

                });
        }
    });

    $(document).on('click', '.modificar-miembro', function () {//modifica usuario
        habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodmie = $(elemento).attr('UserDocu');
        $.post('/MRFIglesiaBermejo/AccesoDatos/Miembro/SingleMiembro.php',
            { pacodmie }, function (responce) {
                const miembro = JSON.parse(responce);
                var foto;
                miembro.forEach(miembro => {
                    codMiembro = miembro.pacodmie,
                        $('#txt_ci').val(miembro.cacidmie),
                        $('#txt_nombre').val(miembro.canommie),
                        $('#txt_paterno').val(miembro.capatmie),
                        $('#txt_materno').val(miembro.camatmie),
                        $('#txt_numcontacto').val(miembro.cacelmie),
                        $('#txt_fecnac').val(miembro.cafecnac),
                        $('#cbx_estadoCivil').val(miembro.caestciv),
                        $('#txt_direccion').val(miembro.cadirmie),
                        //caestmie: true,
                        codProfesion = miembro.facodpro,
                        codCiudad = miembro.facodciu,
                        console.log(miembro.caestciv);
                    $('#cbx_profesion').val(miembro.pacodpro),
                        $('#cbx_ciudad').val(miembro.pacodciu),
                        //cafotmie: encodeURIComponent(foto)
                        foto = decodeURIComponent(miembro.cafotmie);
                });
                const canvas = document.getElementById('canvas');
                var contex = canvas.getContext('2d');
                imagenes = document.getElementById('imagen');
                imagenes.setAttribute('src', "data:image/jpeg;base64," + foto);
                contex.drawImage(imagenes, 0, 0, 140, 120);
                //contex.hide();
                edit = true;
            });
    });

    function ListarProfesion() {//listar profesion
        $.ajax({
            url: '/MRFIglesiaBermejo/AccesoDatos/Miembro/ListarProfesion.php',
            type: 'GET',
            success: function (response) {
                let profesion = JSON.parse(response);
                let plantilla = '<option value=0>Eligir Profesion</option>';
                profesion.forEach(profesion => {
                    plantilla += `<option value="${profesion.pacodpro}" class="cod-profesion">${profesion.canompro}</option>`;
                });
                $('#cbx_profesion').html(plantilla);
            }
        });

    }

    $('#cbx_profesion').change(function (e) {//asigar codigo profesion
        codProfesion = $('#cbx_profesion').val();
        console.log("codigo profesion " + codProfesion);
        e.preventDefault();

    });

    function ListarCiudad() {//listar ciudad
        $.ajax({
            url: '/MRFIglesiaBermejo/AccesoDatos/Miembro/ListarCiudad.php',
            type: 'GET',
            success: function (response) {
                let ciudad = JSON.parse(response);
                let plantilla = '<option value=0>Eligir Ciudad</option>';
                ciudad.forEach(ciudad => {
                    plantilla += `<option value="${ciudad.pacodciu}" class="ciudad">${ciudad.canomciu}</option>`;
                });
                $('#cbx_ciudad').html(plantilla);
            }
        });
    }

    $('#cbx_ciudad').change(function (e) {//asignar codigo de cuidad
        codCiudad = $('#cbx_ciudad').val();
        console.log("codigo ciudad " + codCiudad);
        e.preventDefault();

    });

    $("#btn_nuevo").click(function (event) {
        habilitarFormulario();
        verificarSecuencia("MBR");
        if (!getBan()) {
            setCodigo("MBR");
            setCorrelativo(1);
        }
        else {
            setCodigo("MBR");
            obtenerCorrelativo("MBR");
            setCorrelativo(obtenerSiguinete("MBR"));
        }
        codMiembro = getCodigo() + '-' + getCorrelativo();
        console.log(codMiembro);

    });

    //DesabilitarFormulario
    function habilitarFormulario() {
        $("#txt_nombre").attr("disabled", false);
        $("#txt_codMiembro").attr("disabled", false);
        $("#txt_ci").attr("disabled", false);
        $("#txt_paterno").attr("disabled", false);
        $("#txt_materno").attr("disabled", false);
        $("#txt_numcontacto").attr("disabled", false);
        $("#txt_fecnac").attr("disabled", false);
        $("#cbx_ciudad").attr("disabled", false);
        $("#cbx_estadoCivil").attr("disabled", false);
        $("#cbx_profesion").attr("disabled", false);
        $("#txt_direccion").attr("disabled", false);
        $("#snap").attr("disabled", false);
        $("#dat_feccon").attr("disabled", false);
        $("#dat_fecbau").attr("disabled", false);
        $("#dat_fecentrada").attr("disabled", false);
        $("#dat_fecencuentro").attr("disabled", false);
        $("#cbx_celula").attr("disabled", false);
        $("#cbx_funcion").attr("disabled", false);
        $("#btn_guardar").attr("disabled", false);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById("txt_ci").focus();
    }

    function DeshabilitarFormulario() {
        $("#txt_nombre").attr("disabled", true);
        $("#txt_codMiembro").attr("disabled", true);
        $("#txt_ci").attr("disabled", true);
        $("#txt_paterno").attr("disabled", true);
        $("#txt_materno").attr("disabled", true);
        $("#txt_numcontacto").attr("disabled", true);
        $("#txt_fecnac").attr("disabled", true);
        $("#cbx_ciudad").attr("disabled", true);
        $("#cbx_estadoCivil").attr("disabled", true);
        $("#cbx_profesion").attr("disabled", true);
        $("#txt_direccion").attr("disabled", true);
        $("#snap").attr("disabled", true);
        $("#dat_feccon").attr("disabled", true);
        $("#dat_fecbau").attr("disabled", true);
        $("#dat_fecentrada").attr("disabled", true);
        $("#dat_fecencuentro").attr("disabled", true);
        $("#btn_guardar").attr("disabled", true);
        $("#cbx_celula").attr("disabled", true);
        $("#cbx_funcion").attr("disabled", true);
        $("#btn_nuevo").attr("disabled", false);
    }

    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const snap = document.getElementById("snap");
    const foto = document.getElementById('imagen');
    const errorMsgElement = document.querySelector('span#errorMsg');

    const constraints = {
        audio: false,
        video: {
            width: 140, height: 120
        }
    };

    // Access webcam
    async function init() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia(constraints);
            handleSuccess(stream);
        } catch (e) {
            errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
        }
    }

    // Success
    function handleSuccess(stream) {
        window.stream = stream;
        video.srcObject = stream;
    }

    //Load init
    init();

    // Draw image
    var context = canvas.getContext('2d');
    var imagenes;
    snap.addEventListener("click", function () {
        context.drawImage(video, 0, 0, 140, 120);
    });


});




//console.log('Hola mundo');

