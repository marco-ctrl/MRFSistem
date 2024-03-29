$(document).ready(function () {

    //Definicion de Variables//
    var codCurso;
    var codMatricula;
    var codAlumno;
    var edit = false;
    var corre;

    //fechaActual
    var hoy = new Date().format('Y-m-d');
    //$('#dat_matriculacion').val(hoy);

    //Listar Datos//
    listarMatriculacion();
    ListarAlumno();
    ListarCurso();

    function myFunc() {
        var now = new Date();
        var time = now.getHours() + ":" + now.getMinutes();
        //document.getElementById('hor_aporte').innerHTML= time;
        $('#hor_matriculacion').val(time);
    }
    myFunc();
    setInterval(myFunc, 1000);

    $('#formulario').hide();//ocultar formulario

    function ListarAlumno() {//lista maestros
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Alumno/ListarAlumno.php',
            type: 'GET',
            success: function (response) {
                let miembros = JSON.parse(response);
                let plantilla = '';

                miembros.forEach(miembros => {
                    plantilla +=
                        `<tr codMbr="${miembros.pacodalu}" class="table-light">
                        <td>${miembros.canommie}</td> 
                        <td>${miembros.capatmie} ${miembros.camatmie}</td>
                        <td>${miembros.canomcel}</td>
                        <td>${miembros.cafunmie}</td>
                        <td style="width:15%"><button class="agregar-alumno btn btn-primary" data-dismiss="modal">
                        <i class="fas fa-user-plus "></i></button></td>
                        </tr>`;
                });
                $('#tb_miembro').html(plantilla);
            }
        });
    }

    $(document).on('click', '.agregar-alumno', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodalu = $(elemento).attr('codMbr');
        $.post('/MRFSistem/AccesoDatos/Alumno/SingleAlumno.php',
            { pacodalu }, function (responce) {
                const miembro = JSON.parse(responce);
                miembro.forEach(miembro => {
                    codAlumno = miembro.pacodalu,
                        $('#txt_alumno').val(miembro.canommie + ' ' + miembro.capatmie + ' ' + miembro.camatmie)
                });
                //console.log(codAlumno);
                camposVacios();
            });

    });

    $('#txt_buscarMatricula').keyup(function (e) {//permite hacer busqueda de miembros
        if ($('#txt_buscarMatricula').val()) {
            let buscar = $('#txt_buscarMatricula').val().toUpperCase();
            let plantilla = '';
            $.ajax({
                url: '/MRFSistem/AccesoDatos/Matriculacion/BuscarMatricula.php',
                type: 'POST',
                data: { buscar },
                success: function (response) {
                    if (response != "no encontrado") {
                        let cel = JSON.parse(response);

                        cel.forEach(cel => {
                            plantilla = MostrarTabla(plantilla, cel);
                        });
                        $('#tb_matricula').html(plantilla);
                    }
                    else {
                        $('#tb_matricula').html(plantilla);
                        let mensaje = `<div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>La persona ${buscar} no se encuentra matriculado en la Escuela de Lideres</strong></div>`;
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
            listarMatriculacion();
        }
    });


    $('#btn_guardar').click(function (e) {
        GuardarMatriculacion();
        Limpiar();
    });

    $(document).on('click', '.modificar-matricula', function () {//modifica curso

        //habilitarFormulario();
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodmat = $(elemento).attr('UserDocu');
        console.log(pacodmat);
        $.post('/MRFSistem/AccesoDatos/Matriculacion/SingleMatricula.php',
            { pacodmat }, function (responce) {
                $('#lista').hide();
                $('#formulario').show();
                const celula = JSON.parse(responce);
                console.log(celula);
                celula.forEach(cel => {
                    codCurso = cel.facodcur,
                        codAlumno = cel.facodalu,
                        codMatricula = cel.pacodmat,
                        $('#txt_codCurso').val(cel.facodcur),
                        $('#txt_materia').val(cel.canommat),
                        $('#txt_gestion').val(cel.cagescur),
                        $('#dat_matriculacion').val(cel.cafecmat),
                        $('#hor_matriculacion').val(cel.cahormat),
                        $('#dat_fecini').val(cel.cafecini),
                        $('#txt_alumno').val(cel.canommie + " " + cel.capatmie + " " + cel.camatmie)
                });
                //contex.hide();
                document.getElementById("btn_curso").focus();
                edit = true;
                camposVacios();
            });
    });

    $('#btn_nuevo').click(function (e) {//nuevo registro de Celula 
        $('#lista').hide();
        $('#formulario').show();
        let num = "";
        verificarSecuencia("MAT");
        if (getBan() != "true") {
            setCodigo("MAT");
            setCorrelativo(1);
        }
        else {
            setCodigo("MAT");
            obtenerCorrelativo("MAT");
            setCorrelativo(obtenerSiguinete("MAT"));
        }
        corre = getCorrelativo();
        num = ObtenerNumeroCorrelativo(getCorrelativo().toString(), num);
        codMatricula = getCodigo() + '-' + num;
        console.log(codMatricula);
        $("#btn_nuevo").attr("disabled", true);
        document.getElementById("btn_curso").focus();
    });

    $('#btn_cancelar').click(function (e) {
        Limpiar();
        edit = false;
        camposVacios();
        $('html, body').animate({ scrollTop: 0 }, 'slow'); //seleccionamos etiquetas,clase o identificador destino, creamos animación hacia top de la página.
        return false; 
    });

    //Funciones//////
    function listarMatriculacion() {//listar Celula
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Matriculacion/ListarMatricula.php',
            type: 'GET',
            success: function (response) {
                let plantilla = '';
                if (response != "no encontrado") {
                    let celula = JSON.parse(response);

                    celula.forEach(usu => {
                        plantilla = MostrarTabla(plantilla, usu);
                    });
                    $('#tb_matricula').html(plantilla);
                }
                else {
                    $('#tb_matricula').html(plantilla);
                }
            }
        });
    }

    function MostrarTabla(plantilla, cur) {//////Mostrar Tabla///////////
        plantilla +=
            `<tr UserDocu="${cur.pacodmat}" class="table-light">
                <td>${cur.canommie} ${cur.capatmie} ${cur.camatmie}</td>
                <td>${cur.canommat} ${cur.caparcur}</td>
                <td>${cur.cagescur}</td>
                <td>${cur.cafecmat} ${cur.cahormat}</td>
                <td style="width:15%">
                    <button class="modificar-matricula btn btn-secondary">
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
    function GuardarMatriculacion() {
        const postData = {
            facodcur: codCurso,
            facodalu: codAlumno,
            pacodmat: codMatricula,
            cahormat: $('#hor_matriculacion').val(),
            cafecmat: $('#dat_matriculacion').val(),
            caestmat: true,
            facodusu: $('#txt_codUsuario').val()
        };
        console.log(postData);
        let URL = edit === false ?
            '/MRFSistem/AccesoDatos/Matriculacion/AgregarMatricula.php' :
            '/MRFSistem/AccesoDatos/Matriculacion/ModificarMatricula.php';

        $.ajax({
            url: URL,
            type: 'POST',
            data: postData,
            beforeSend: function () {
                $("#btn_guardar").text("Guardando...");
                $("#btn_guardar").attr("disabled", true);
            },
            complete: function () {
                $("#btn_guardar").text("Guardar");
                $("#btn_guardar").attr("disabled", false);
            },
            success: function (response) {
                console.log(response);
                if (!edit && response == 'registra') {
                    actualizarSecuencia("MAT", corre);
                    MostrarMensaje("Datos de Matriculacion guardados correctamente", "success");

                }
                if (edit && response == 'modificado') {
                    MostrarMensaje("datos de Curso modificados correctamente", "success")
                }
                edit = false;

                $('#formulario').hide();
                $('#lista').show();
                listarMatriculacion();
            }
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

    function ListarCurso() {//listar Materia
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Curso/ListarCurso.php',
            type: 'GET',
            success: function (response) {
                let con = JSON.parse(response);
                let plantilla = '';
                con.forEach(miembros => {
                    plantilla +=
                        `<tr codMbr="${miembros.pacodcur}" class="table-light">
                        <td>${miembros.canommat}</td> 
                        <td>${miembros.caparcur}</td>
                        <td>${miembros.cagescur}</td>
                        <td>${miembros.canommie} ${miembros.capatmie} ${miembros.camatmie}</td>
                        <td style="width:15%"><button class="agregar-curso btn btn-primary" data-dismiss="modal">
                        <i class="fas fa-plus-square "></i></button></td>
                        </tr>`;
                });
                $('#tb_curso').html(plantilla);
            }
        });
    }

    $(document).on('click', '.agregar-curso', function () {
        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcur = $(elemento).attr('codMbr');
        $.post('/MRFSistem/AccesoDatos/Curso/SingleCurso.php',
            { pacodcur }, function (responce) {
                const miembro = JSON.parse(responce);
                miembro.forEach(miembro => {
                    codCurso = miembro.pacodcur,
                        $('#txt_codCurso').val(miembro.pacodcur),
                        $('#txt_gestion').val(miembro.cagescur),
                        $('#txt_materia').val(miembro.canommat),
                        $('#txt_maestro').val(miembro.canommie + ' ' + miembro.capatmie + ' ' + miembro.camatmie)
                    $('#dat_fecini').val(miembro.cafecini)
                });
                //console.log(codCurso);
                camposVacios();
            });

    });



    function Limpiar() {//limpiar formulario
        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        $("#btn_nuevo").attr("disabled", false);
        $('#formulario').hide();
        $('#lista').show();
    }

    $("#btn_guardar").attr("disabled", true);

    
    var contador;

    function camposVacios() {
        contador = 0;
        curso = $('#txt_codCurso').val();
        alumno = $('#txt_alumno').val();
        
        if (curso == "") {
            $("#val_curso").html("Selecciona un curso");
            $("#div_curso").switchClass("border-bottom-success", "border-bottom-danger", 100);
            
            contador++;
        }
        else {

            $("#div_curso").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_curso").html("");
            
        }
        if (alumno == "") {
            $("#val_miembro").html("Selecciona un Alumno");
            $("#div_miembro").switchClass("border-bottom-success", "border-bottom-danger", 100);
            
            contador++;
        }
        else {

            $("#div_miembro").switchClass("border-bottom-danger", "border-bottom-success", 100, "easeInOutQuad");
            $("#val_miembro").html("");
            
        }
        
        if (contador > 0) {
            $("#btn_guardar").attr("disabled", true);
            $("#btn_guardar").attr("title", "Llene todos los campos requeridos");
            //alertify.alert('Mensaje', 'Deber llenar todos los campos requeridos por el Sistema!');
        }
        else {
            if (contador == 0) {
                $("#btn_guardar").attr("disabled", false);
                $("#btn_guardar").attr("title", "Guardar datos de Matriculacion");

            }
        }
    }


});