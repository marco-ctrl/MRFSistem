<?php

include '../Conexion/Conexion.php';

$imagenCodificada = $_POST["cafotmie"]; //Obtener la imagen
if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
//La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
$imagenCodificadaLimpia = str_replace("data:image/jpeg;base64,", "", urldecode($imagenCodificada));

if (isset($_POST["pacodmie"]) && isset($_POST["canommie"]) && isset($_POST["cacidmie"])) {
    $pacodmie = $_POST['pacodmie'];
    $canommie = $_POST['canommie'];
    $cacidmie = $_POST['cacidmie'];
    $capatmie = $_POST['capatmie'];
    $camatmie = $_POST['camatmie'];
    $cadirmie = $_POST['cadirmie'];
    $cacelmie = $_POST['cacelmie'];
    $cafecnac = $_POST['cafecnac'];
    $caestciv = $_POST['caestciv'];
    $caestmie = $_POST['caestmie'];
    $facodpro = $_POST['facodpro'];
    $facodciu = $_POST['facodciu'];
    $cafotmie = $imagenCodificadaLimpia;

$date=date('jmyhis');
//echo ''.$date ;
$path = "Imagenes/$pacodmie$canommie$date.jmysqli";

$url = "/MRFIglesiaBermejo/AccesoDatos/Miembro/$path";
//$url = "Imagenes/"$pacodmie$canommie.".jmysqli";

file_put_contents($path, base64_decode($cafotmie));
$bytesArchivo = file_get_contents($path);
$bytesArchivo = mysqli_escape_bytea($bytesArchivo);
    //$imagen = $_POST['imagen'];
    //echo ' '.$documento.' '.$nombre.' '.$profesion; '{$bytesArchivo}', 
    $sql = "INSERT INTO amiebro(
        camatmie, 
        capatmie, 
        cacelmie, 
        cacidmie, 
        cadirmie, 
        caestmie, 
        caestciv, 
        cafecnac, 
        caurlfot, 
        canommie, 
        pacodmie, 
        facodciu, 
        facodpro,
        cabanmae,
        cabanalu)
        VALUES (
        '{$camatmie}', 
        '{$capatmie}', 
        '{$cacelmie}', 
        '{$cacidmie}', 
        '{$cadirmie}', 
        '{$caestmie}', 
        '{$caestciv}', 
        '{$cafecnac}', 
        '{$url}',
        '{$canommie}', 
        '{$pacodmie}', 
        '{$facodciu}', 
        '{$facodpro}',
        'false',
        'false');";
    $stm = mysqli_query($conexion, $sql);
}

if($stm){
    $cafecenc = $_POST['cafecenc'];
    $cafecbau = $_POST['cafecbau'];
    $cafecigl = $_POST['cafecigl'];
    $cafeccon = $_POST['cafeccon'];
    $pacodcre = $_POST['pacodcre'];

    $sql = "INSERT INTO public.acreesp(
            cafecenc, 
            cafecbau, 
            cafecigl, 
            cafeccon, 
            pacodcre)
            VALUES (
            '{$cafecenc}', 
            '{$cafecbau}', 
            '{$cafecigl}', 
            '{$cafeccon}',
            '{$pacodcre}')";
    
    $stm1 = mysqli_query($conexion, $sql);
    
    if ($stm1) {
        echo "registra";
    } else {
        echo "noRegistra";
    }
}
else{
    echo "noRegistra";
}
    


mysqli_close($conexion);
?>