$(document).ready(function () {

    $("#mn_alumno").click(function(event) {
        $("#escuela").load('FRM_Alumno.php');
    });

    $("#mn_maestro").click(function(event) {
        $("#escuela").load('FRM_Maestro.php');
    });

    $("#mn_contenido").click(function(event) {
        $("#escuela").load('FRM_Contenido.php');
    });

    $("#mn_curso").click(function(event) {
        $("#escuela").load('FRM_Curso.php');
    });

    $("#mn_matricula").click(function(event) {
        $("#escuela").load('FRM_Matriculacion.php');
    });

    //imagenes = document.getElementById('imagen');
    //imagenes.setAttribute('src', "http://localhost/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-2Oscar.jpg");
    //$('#imagen').setAtribute('src', "http://localhost/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-2Oscar.jpg");
    /*$("#div_archivos").hide();
    var ban1 = true

    $("#div_reportes").hide();
    var ban2 = true

    $("#div_sistema").hide();
    var ban3 = true

    $("#mn_archivos").click(function (event) {
        if (ban1) {
            $("#div_archivos").show();
            ban1 = false;
        }
        else {
            $("#div_archivos").hide();
            ban1 = true
        }


    });

    $("#mn_reportes").click(function (event) {
        if (ban2) {
            $("#div_reportes").show();
            ban2 = false;
        }
        else {
            $("#div_reportes").hide();
            ban2 = true
        }


    });

    $("#mn_sistema").click(function (event) {
        if (ban3) {
            $("#div_sistema").show();
            ban3 = false;
        }
        else {
            $("#div_sistema").hide();
            ban3 = true
        }


    });


    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });*/

});