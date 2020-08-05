$(document).ready(function() {
    console.log('hola mundo Contenido');
    //$('#tab_registrar').hide();

    $("#mn_miembro").click(function(event) {
        
        $("#trabajo").load('FRM_Miembro.php');

    });

    $("#mn_celula").click(function(event) {
        
        $("#trabajo").load('FRM_Contenido.php');

    });

    $("#mn_usuario").click(function(event) {
        
        $("#trabajo").load('FRM_Usuario.php');

    });

    /*$('#btn_guardar').click(function(e){
        $('#form1').trigger('reset');
        $('#form2').trigger('reset');
        $('#form3').trigger('reset');
    })*/

    /*$('#registrarMiembro').click(function(e){
        $('#tab_registrar').show();
    })

    $('#listarMiembro').click(function(e){
        $('#tab_registrar').hide();
    })*/
});