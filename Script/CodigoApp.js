var codigo;
var correlativo;
var ban;

function setCorrelativo(_correlativo){
    correlativo=_correlativo;
}

function getCorrelativo(){
    return correlativo;
}

function setCodigo(_codigo){
    codigo=_codigo;
}

function getCodigo(){
    return codigo;
}

function setBan(_ban){
    ban=_ban;
}

function getBan(){
    return ban;
}

function guardarSecuencia(codigo, corre){
    const postData = {
        codigo: codigo,
        correlativo: corre
    };
    $.post('/MRFSistem/AccesoDatos/Codigo/GuardarSecuencia.php', 
        postData, function (response) {
        //console.log(response);
    });
}

function modificarSecuencia(codigo, corre){
    const postData = {
        codigo: codigo,
        correlativo: corre
    };
    console.log(postData);
    $.post('/MRFSistem/AccesoDatos/Codigo/ModificarSecuencia.php', 
        postData, function (response) {
        //console.log(response);
    });
}

function verificarSecuencia(codigo){
    $.ajax({
        url: '/MRFSistem/AccesoDatos/Codigo/VerificarExistencia.php',
        type: 'POST',
        async: false,
        data: {codigo},
        success: function (response) {
            setBan(response);
            //console.log(getBan());
        }
    });
}

function obtenerCorrelativo(codigo){
    $.ajax({
        url: '/MRFSistem/AccesoDatos/Codigo/ObtenerCorrelativo.php',
        type: 'POST',
        data: {codigo},
        async: false,
        success: function (response) {
            let corre = JSON.parse(response);
            corre.forEach(corre => {
                setCorrelativo(corre.correlativo);            
            });
        }
    });
}

function obtenerSiguinete(codigo){
    //var dato=0;
    obtenerCorrelativo(codigo);
    dato=parseInt(getCorrelativo())+1;
    return dato;
}

function actualizarSecuencia(codigo, corre){
    verificarSecuencia(codigo);
    if(getBan()=='true'){
        modificarSecuencia(codigo, corre);
    }
    else{
        guardarSecuencia(codigo, corre);
    }
}