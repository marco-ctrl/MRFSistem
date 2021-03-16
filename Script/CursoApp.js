$(document).ready(function () {

    //Definicion de Variables//
    var codCurso;
    var codMateria;
    var codMaestro;
    var edit = false;
    var corre;

    //Listar Datos//
    listarMateria();
    ListarMaestro();
    ListarCurso();

    $('#formulario').hide();//ocultar formulario

    function ListarMaestro() {//lista maestros
        $.ajax({
            url: '/MRFIglesiaBermejo/AccesoDatos/Maestro/ListarMaestro.php',
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
                        <i class="fas fa-user-plus gi-2x"></i></button></td>
                        </tr>`;
                });
                $('#tb_miembro').html(plantilla);
            }
        });
    }

    $(document).on('click', '.agregar-miembro', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodmae = $(elemento).attr('codMbr');
        $.post('/MRFIglesiaBermejo/AccesoDatos/Maestro/SingleMaestro.php',
            { pacodmae }, function (responce) {
                const miembro = JSON.parse(responce);
                miembro.forEach(miembro => {
                    codMaestro = miembro.pacodmae,
                        $('#txt_maestro').val(miembro.canommie + ' ' + miembro.capatmie + ' ' + miembro.camatmie)
                });
                console.log(codMaestro);

            });

    });

    $('#txt_buscar').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscar').val()) {
            let buscar = $('#txt_buscar').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFIglesiaBermejo/AccesoDatos/Curso/BuscarCurso.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cel = JSON.parse(response);

                        cel.forEach(cel => {
                            plantilla = MostrarTabla(plantilla, cel);
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
        $('#lista').hide();
        $('#formulario').show();
        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcur = $(elemento).attr('UserDocu');
        $.post('/MRFIglesiaBermejo/AccesoDatos/Curso/SingleCurso.php',
            { pacodcur }, function (responce) {
                const celula = JSON.parse(responce);
                console.log(celula);
                celula.forEach(cel => {
                    codCurso = cel.pacodcur,
                        codMaestro = cel.facodmae,
                        codMateria = cel.facodcon,
                        $('#txt_gestion').val(cel.cagescur),
                        $('#txt_descripcion').val(cel.cadescur),
                        $('#cbx_materia').val(cel.facodcon),
                        $('#dat_fecini').val(cel.cafecini),
                        $('#txt_maestro').val(cel.canommie + " " + cel.capatmie + " " + cel.camatmie)
                });
                //contex.hide();
                document.getElementById("cbx_materia").focus();
                edit = true;
            });
    });

    $(document).on('click', '.baja-curso', function () {//elimina usuario
        if (confirm("Seguro que desea dar de baja este curso")) {
            let elemento = $(this)[0].parentElement.parentElement;
            let pacodcur = $(elemento).attr('UserDocu');
            $.post('/MRFIglesiaBermejo/AccesoDatos/Curso/DarBaja.php',
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


    $('#btn_nuevo').click(function (e) {//nuevo registro de Celula 
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

    });

    //Funciones//////
    function ListarCurso() {//listar Celula
        $.ajax({
            url: '/MRFIglesiaBermejo/AccesoDatos/Curso/ListarCurso.php',
            type: 'GET',
            success: function (response) {
                let plantilla = '';
                if (response != "no encontrado") {
                    let celula = JSON.parse(response);
                    
                    celula.forEach(usu => {
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
                <td>${cur.pacodcur}</td>
                <td>${cur.canommat}</td>
                <td>${cur.cagescur}</td>
                <td>${cur.canommie} ${cur.capatmie} ${cur.camatmie}</td>
                <td>${cur.cafecini}</td>
                <td>${cur.cadescur}</td>
                <td>
                    <button class="baja-curso btn btn-danger">
                    <i class="fas fa-trash-alt gi-2x"></i></button>
                </>
                <td style="width:15%">
                    <button class="modificar-curso btn btn-secondary">
                    <i class="far fa-edit gi-2x"></i></button>
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
            cadescur: $('#txt_descripcion').val()
        };
        console.log(postData);
        let url = edit === false ?
            '/MRFIglesiaBermejo/AccesoDatos/Curso/AgregarCurso.php' :
            '/MRFIglesiaBermejo/AccesoDatos/Curso/ModificarCurso.php';

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
        });
        ListarCurso();
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
            url: '/MRFIglesiaBermejo/AccesoDatos/Contenido/ListarContenido.php',
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
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
    }


});