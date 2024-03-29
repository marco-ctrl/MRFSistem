$(document).ready(function () {

    //Definicion de Variables//
    var codCurso;
    var codMateria;
    var codMaestro;
    var edit = false;
    var corre;

    //Fecha Actual
    var hoy = new Date().format('Y-m-d');
    //$('#dat_fecini').val(hoy),

    //Listar Datos//
    listarMateria();
    ListarMaestro();
    ListarCurso();

    $('#formulario').hide();//ocultar formulario

    function ListarMaestro() {//lista maestros
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Maestro/ListarMaestro.php',
            type: 'GET',
            success: function (response) {
                let miembros = JSON.parse(response);
                let plantilla = '';

                miembros.forEach(miembros => {
                    plantilla +=
                        `<tr codMbr="${miembros.pacodmae}" class="table-light">
                        <td>${miembros.canommie}</td> 
                        <td>${miembros.capatmie} ${miembros.camatmie}</td>
                        <td style="width:15%"><button class="agregar-miembro btn btn-primary" data-dismiss="modal">
                        <i class="fas fa-user-plus "></i></button></td>
                        </tr>`;
                });
                $('#tb_miembro').html(plantilla);
            }
        });
    }

    $(document).on('click', '.agregar-miembro', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodmae = $(elemento).attr('codMbr');
        $.post('/MRFSistem/AccesoDatos/Maestro/SingleMaestro.php',
            { pacodmae }, function (responce) {
                const miembro = JSON.parse(responce);
                miembro.forEach(miembro => {
                    codMaestro = miembro.pacodmae,
                    $('#txt_maestro').val(miembro.canommie + ' ' + miembro.capatmie + ' ' + miembro.camatmie)
                });
                //console.log(codMaestro);
                camposVacios();
            });

    });

    $('#txt_buscarCurso').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscarCurso').val()) {
            let buscar = $('#txt_buscarCurso').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Curso/BuscarCurso.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cur = JSON.parse(response);

                        cur.forEach(cur => {
                            plantilla = MostrarTabla(plantilla, cur);
                        });
                        $('#tb_curso').html(plantilla);
                    }
                    else {
                        $('#tb_curso').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>El curso ${buscar} no se encuentra registrado en la base de datos</strong></div>`;
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
            ListarCurso();
        }
    });


    $('#btn_guardar').click(function (e) {
        GuardarMateria();
        Limpiar();
    });

    $(document).on('click', '.modificar-curso', function () {//modifica curso

        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcur = $(elemento).attr('UserDocu');
        $.post('/MRFSistem/AccesoDatos/Curso/SingleCurso.php',
            { pacodcur }, function (responce) {
                $('#lista').hide();
                $('#formulario').show();
                const curso = JSON.parse(responce);
                console.log(curso);
                curso.forEach(cur => {
                    codCurso = cur.pacodcur,
                        codMaestro = cur.facodmae,
                        codMateria = cur.facodcon,
                        $('#txt_gestion').val(cur.cagescur),
                        $('#txt_descripcion').val(cur.cadescur),
                        $('#cbx_materia').val(cur.facodcon),
                        $('#dat_fecini').val(cur.cafecini),
                        $('#txt_maestro').val(cur.canommie + " " + cur.capatmie + " " + cur.camatmie),
                        $('#cbx_paralelo').val(cur.caparcur)
                });
                //contex.hide();
                document.getElementById("cbx_materia").focus();
                edit = true;
                camposVacios();
            });
    });

    $(document).on('click', '.baja-curso', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja este curso")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodcur = $(elemento).attr('UserDocu');
            $.post('/MRFSistem/AccesoDatos/Curso/DarBaja.php',
                { pacodcur }, function (responce) {
                    if (responce == 'baja') {
                        ListarCurso();
                        MostrarMensaje("Curso dado de baja", "warning");
                    }

                });
        }
    });

    $('#cbx_materia').change(function (e) {//asignar codigo de cuidad
        codMateria = $('#cbx_materia').val();
        console.log("codigo materia " + codMateria);
        e.preventDefault();

    });


    $('#btn_nuevo').click(function (e) {//nuevo registro de curso 
        $('#lista').hide();
        $('#formulario').show();
        let num = "";
        verificarSecuencia("CUR");
        if (getBan() != "true") {
            setCodigo("CUR");
            setCorrelativo(1);
        }
        else {
            setCodigo("CUR");
            obtenerCorrelativo("CUR");
            setCorrelativo(obtenerSiguinete("CUR"));
        }
        corre = getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codCurso = getCodigo() + '-' + num;
        console.log(codCurso);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById("cbx_materia").focus();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();
        edit=false;
        camposVacios();
    });

    //Funciones//////
    function ListarCurso() {//listar curso
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Curso/ListarCurso.php',
            type: 'GET',
            success: function (response) {
                let plantilla = '';
                if (response != "no encontrado") {
                    let curso = JSON.parse(response);

                    curso.forEach(usu => {
                        plantilla = MostrarTabla(plantilla, usu);
                    });
                    $('#tb_curso').html(plantilla);
                }
                else {
                    $('#tb_curso').html(plantilla);
                }
            }
        });
    }

    function MostrarTabla(plantilla, cur) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${cur.pacodcur}" class="table-light">
                <td>${cur.canommat}</td>
                <td>${cur.caparcur}</td>
                <td>${cur.cagescur}</td>
                <td>${cur.canommie} ${cur.capatmie} ${cur.camatmie}</td>
                <td>${cur.cafecini}</td>
                <td>${cur.cadescur}</td>
                <td>
                    <button class="baja-curso btn btn-danger">
                    <i class="fas fa-trash-alt "></i></button>
                </>
                <td style="width:15%">
                    <button class="modificar-curso btn btn-secondary">
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
    function GuardarMateria() {
        const postData = {
            facodcon: codMateria,
            facodmae: codMaestro,
            pacodcur: codCurso,
            cagescur: $('#txt_gestion').val(),
            cafecini: $('#dat_fecini').val(),
            caestcur: true,
            cadescur: $('#txt_descripcion').val(),
            caparcur: $('#cbx_paralelo').val()
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFSistem/AccesoDatos/Curso/AgregarCurso.php' :
            '/MRFSistem/AccesoDatos/Curso/ModificarCurso.php';

        $.post(url, postData, function (response) {
            console.log(response);
            if (!edit && response == 'registra') {
                actualizarSecuencia("CUR", corre);
                MostrarMensaje("Datos de Curso guardados correctamente", "success");

            }
            if (edit && response == 'modificado') {
                MostrarMensaje("datos de Curso modificados correctamente", "success")
            }
            edit = false;

            $('#formulario').hide();
            $('#lista').show();
            ListarCurso();
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

    function listarMateria() {//listar Materia
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Contenido/ListarContenido.php',
            type: 'GET',
            success: function (response) {
                let con = JSON.parse(response);
                let plantilla = '<option value=0>Eligir Materia</option>';
                con.forEach(barrio => {
                    plantilla += `<option value="${barrio.pacodcon}" class="cod-barrio">${barrio.canommat}</option>`;
                });
                $('#cbx_materia').html(plantilla);
            }
        });
    }



    function Limpiar() {//limpiar formulario
        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        //$('#dat_fecini').val(hoy);
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
    }

    $("#btn_guardar").attr("disabled", true);

    //Validacion de Campos Vacios
    $('#cbx_materia').change(function (e) {//asigar codigo profesion
        //capturarCampos();
        camposVacios();
        e.preventDefault();

    });

    $('#cbx_paralelo').change(function (e) {//asigar codigo profesion
        //capturarCampos();
        camposVacios();
        e.preventDefault();

    });

    $('#txt_descripcion').keyup(function (e) {
        camposVacios();
        //soloLetras(e);
    });

    var contador;

    function camposVacios() {
        contador = 0;
        materia = $('#cbx_materia').val();
        paralelo = $('#cbx_paralelo').val();
        maestro = $('#txt_maestro').val();
        descripcion = $('#txt_descripcion').val();

        if (materia == "0") {
            $("#val_materia").html("Completa este campo");
            $("#div_materia").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_materia").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_materia").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {

            $("#div_materia").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_materia").html("");
            $("#chk_materia").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_materia").html('<i class="fas fa-check"></i>');

        }
        if (paralelo == "0") {
            $("#val_paralelo").html("Completa este campo");
            $("#div_paralelo").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_paralelo").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_paralelo").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {

            $("#div_paralelo").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_paralelo").html("");
            $("#chk_paralelo").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_paralelo").html('<i class="fas fa-check"></i>');

        }
        if (maestro == "") {
            $("#val_maestro").html("Completa este campo");
            $("#div_maestro").switchClass("border-bottom-success", "border-bottom-danger", 100);
            $("#chk_maestro").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_maestro").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {

            $("#div_maestro").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_maestro").html("");
            $("#chk_maestro").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
            $("#chk_maestro").html('<i class="fas fa-check"></i>');

        }
        if (descripcion == "") {
            $("#val_descripcion").html("Completa este campo");
            $("#div_descripcion").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
            $("#chk_descripcion").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
            $("#chk_descripcion").html('<i class="fas fa-exclamation-triangle"></i>');

            contador++;
        }
        else {
            if (descripcion.toString().length < 5) {
                $("#div_descripcion").switchClass("border-bottom-success", "border-bottom-danger", 100, "easeInOutQuad");
                $("#val_descripcion").html("Este campo debe tener al menos 5 letras");
                $("#chk_descripcion").switchClass("bg-success", "bg-danger", 100, "easeInOutQuad");
                $("#chk_descripcion").html('<i class="fas fa-exclamation-triangle"></i>');
                //console.log('descripcion debe tener almenos 7 carateres');
                contador++;
            }
            else {
                $("#div_descripcion").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
                $("#val_descripcion").html("");
                $("#chk_descripcion").switchClass("bg-danger", "bg-success", 100, "easeInOutQuad");
                $("#chk_descripcion").html('<i class="fas fa-check"></i>');
                //console.log('corecto');
            }
        }
        if (contador > 0) {
            $("#btn_guardar").attr("disabled", true);
            $("#btn_guardar").attr("title", "Llene todos los campos requeridos");
            //alertify.alert('Mensaje', 'Deber llenar todos los campos requeridos por el Sistema!');
        }
        else {
            if (contador == 0) {
                $("#btn_guardar").attr("disabled", false);
                $("#btn_guardar").attr("title", "Guardar datos de Curso");

            }
        }
    }

});