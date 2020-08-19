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

function guardarSecuencia(){
    const postData = {
        codigo: getCodigo(),
        correlativo: getCorrelativo()
    };
    $.post('/MRFIglesiaBermejo/AccesoDatos/Codigo/GuardarSecuencia.php', 
        postData, function (response) {
        //console.log(response);
    });
}

function modificarSecuencia(){
    const postData = {
        codigo: getCodigo(),
        correlativo: getCorrelativo()
    };
    console.log(postData);
    $.post('/MRFIglesiaBermejo/AccesoDatos/Codigo/ModificarSecuencia.php', 
        postData, function (response) {
        //console.log(response);
    });
}

function verificarSecuencia(codigo){
    $.ajax({
        url: '/MRFIglesiaBermejo/AccesoDatos/Codigo/VerificarExistencia.php',
        type: 'POST',
        async: false,
        data: {codigo},
        success: function (response) {
            setBan(response);
            console.log(getBan());
        }
    });
}

function obtenerCorrelativo(codigo){
    $.ajax({
        url: '/MRFIglesiaBermejo/AccesoDatos/Codigo/ObtenerCorrelativo.php',
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

function actualizarSecuencia(codigo){
    verificarSecuencia(codigo);
    if(getBan()=='true'){
        modificarSecuencia(codigo);
    }
    else{
        guardarSecuencia(codigo);
    }
}