<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
            caestbar, 
            canombar, 
            pacodbar
            FROM public.abardir";
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('pacodbar' => $row['pacodbar'],
                    'canombar' => $row['canombar']
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>