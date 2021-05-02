<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
            caestcal, 
            canomcal, 
            pacodcal
	        FROM public.acaldir;";
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('pacodcal' => $row['pacodcal'],
                    'canomcal' => $row['canomcal']
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>