$(document).ready(function () {

    //Definicion de Variables//
    var gestion='0';
    var materia='0';
    var maestro='';
    
    //Listar Datos//
    listarMateria();
    ListarMaestro();
    ListarCurso(gestion, materia, maestro);
    listarGestion();

    $('#formulario').hide();//ocultar formulario

    function ListarMaestro() {//lista maestros
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Maestro/ListarMaestro.php',
            type: 'GET',
            success: function (response) {
                let miembros = JSON.parse(response);
                let plantilla = '';

                miembros.forEach(miembros => {
                    plantilla += `<option data-codigo="${miembros.pacodmae}" value="${miembros.canommie} ${miembros.capatmie} ${miembros.camatmie}"></option>`;
                });
                $('#dat_maestro').html(plantilla);
            }
        });
    }

    
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


    

    $('#btn_reporte').click(function (e) {//nuevo registro de curso 
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_InfoCurso.php?gestion=' + gestion +
                        '&materia=' + materia + '&maestro=' + maestro);
    });

    
    //Funciones//////
    function ListarCurso(gestion, materia, maestro) {//listar curso
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Curso/ListarInfoCurso.php',
            type: 'POST',
            data: { gestion, materia, maestro },
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
                    plantilla = '<tr><td colspan="7" align="CENTER">Tabla Vacia</td></tr>'
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
                    <button class="ver-curso btn btn-primary">
                    <i class="fas fa-info-circle "></i></button>
                </>
            </tr>`
        return plantilla;
    }


    
    
    function listarMateria() {//listar Materia
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Contenido/ListarContenido.php',
            type: 'GET',
            success: function (response) {
                let con = JSON.parse(response);
                let plantilla = '<option value=0>Todo</option>';
                con.forEach(barrio => {
                    plantilla += `<option value="${barrio.pacodcon}" class="cod-barrio">${barrio.canommat}</option>`;
                });
                $('#cbx_materia').html(plantilla);
            }
        });
    }

    function listarGestion() {//listar Materia
        $.ajax({
            url: '/MRFSistem/AccesoDatos/Curso/ListarGestion.php',
            type: 'GET',
            success: function (response) {
                let con = JSON.parse(response);
                let plantilla = '<option value=0>Todo</option>';
                con.forEach(barrio => {
                    plantilla += `<option value="${barrio.cagescur}" class="cod-barrio">${barrio.cagescur}</option>`;
                });
                $('#cbx_gestion').html(plantilla);
            }
        });
    }


    //filtrar por gestion
    $('#cbx_gestion').change(function (e) {//asigar codigo profesion
        gestion = $('#cbx_gestion').val();
        materia = $('#cbx_materia').val();
        ListarCurso(gestion, materia, maestro);
        e.preventDefault();

    });

    //filtrar por materia
    $('#cbx_materia').change(function (e) {//asigar codigo profesion
        gestion = $('#cbx_gestion').val();
        materia = $('#cbx_materia').val();
        ListarCurso(gestion, materia, maestro);
        e.preventDefault();

    });

    $('#txt_maestro').on('input', function () {//asigar codigo barrio
        //camposVacios();
        var val = $('#txt_maestro').val().toUpperCase();
        maestro = $('#dat_maestro').find('option[value="' + val + '"]').data('codigo');
        console.log(maestro);
        gestion = $('#cbx_gestion').val();
        materia = $('#cbx_materia').val();
        
        
        if (maestro === undefined) {
            maestro = '';
            ListarCurso(gestion, materia, maestro);
            console.log("EmpName no está definido");
            //console.log(codBarrio);
        } else {
            ListarCurso(gestion, materia, maestro)
            console.log("EmpName está definido");
            //console.log(codBarrio);
        }
    });

    $(document).on('click', '.ver-curso', function () {//elimina miembros

        let elemento = $(this)[0].parentElement.parentElement;
        let pacodcur = $(elemento).attr('UserDocu');
        abrirNuevoTab('/MRFSistem/ReportesPDF/PDF_DatosCurso.php?pacodcur=' + pacodcur);

    });

    function abrirNuevoTab(url) {
        // Abrir nuevo tab
        var win = window.open(url, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();
    }

});