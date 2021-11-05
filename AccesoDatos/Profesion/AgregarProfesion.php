<?php

include '../Conexion/Conexion.php';

$pacodpro = $_POST['pacodpro'];
$canompro = $_POST['canompro'];

$consulta = "INSERT INTO aproion(
                        canompro, 
                        pacodpro) 
                VALUES (
                        '{$canompro}',
                        '{$pacodpro}')";
$stm = mysqli_query($conexion, $consulta);

if($stm){
    echo "AgregaProfesion";
}
else{
    die (mysqli_error($conexion));
}

mysqli_close($conexion);

?>