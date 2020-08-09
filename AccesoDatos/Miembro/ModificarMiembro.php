<?php

include 'Conexion.php';

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

$path = "Imagenes/$pacodmie$canommie.jpg";

//$url = "http://localhost/EjemploBD/$path";
//$url = "Imagenes/"$pacodmie$canommie.".jpg";

file_put_contents($path, base64_decode($cafotmie));
$bytesArchivo = file_get_contents($path);
$bytesArchivo = pg_escape_bytea($bytesArchivo);
    //$imagen = $_POST['imagen'];
    //echo ' '.$documento.' '.$nombre.' '.$profesion;
    $sql = "UPDATE  amiebro SET
        camatmie='{$camatmie}', 
        capatmie='{$capatmie}', 
        cacelmie='{$cacelmie}', 
        cacidmie='{$cacidmie}', 
        cadirmie='{$cadirmie}', 
        caestmie='{$caestmie}', 
        caestciv='{$caestciv}', 
        cafecnac='{$cafecnac}', 
        cafotmie='{$bytesArchivo}', 
        canommie='{$canommie}', 
        facodciu='{$facodciu}', 
        facodpro='{$facodpro}'
        WHERE pacodmie='{$pacodmie}'";
    $stm = pg_query($conexion, $sql);
}
if($stm){
    $cafecenc = $_POST['cafecenc'];
    $cafecbau = $_POST['cafecbau'];
    $cafecigl = $_POST['cafecigl'];
    $cafeccon = $_POST['cafeccon'];
    $pacodcre = $_POST['pacodcre'];

    $sql = "UPDATE public.acreesp
	SET 
	cafecenc='{$cafecenc}', 
	cafecbau='{$cafecbau}', 
	cafecigl='{$cafecigl}', 
	cafeccon='{$cafeccon}' 
	WHERE pacodcre='{$pacodcre}';";
    
    $stm1 = pg_query($conexion, $sql);
    
    if ($stm1) {
        echo "modificado";
    } else {
        echo "noModifica";
    }
}
else{
    echo "noRegistra";
}

pg_close($conexion);

?>