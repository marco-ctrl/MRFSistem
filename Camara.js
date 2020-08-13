//Nos aseguramos que estén definidas
//algunas funciones básicas
window.URL = window.URL || window.webkitURL;
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || function(){alert('Su navegador no soporta navigator.getUserMedia().');};
 
jQuery(document).ready(function(){
    //Este objeto guardará algunos datos sobre la cámara
    window.datosVideo = {
        'StreamVideo': null,
        'url' : null
    };
     
    jQuery('#botonIniciar').on('click', function(e){
        //Pedimos al navegador que nos de acceso a 
        //algún dispositivo de video (la webcam)
        navigator.getUserMedia({'audio':false, 'video':true}, function(streamVideo){
            datosVideo.StreamVideo = streamVideo;
            datosVideo.url = window.URL.createObjectURL(streamVideo);
            jQuery('#camara').attr('src', datosVideo.url);
        }, function(){
            alert('No fue posible obtener acceso a la cámara.');
        });
 
    });
 
    jQuery('#botonDetener').on('click', function(e){
        if(datosVideo.StreamVideo){
            datosVideo.StreamVideo.stop();
            window.URL.revokeObjectURL(datosVideo.url);
        };
    });
});