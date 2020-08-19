<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
            caestcal, 
            canomcal, 
            pacodcal
	        FROM public.acaldir;";
$resultado = pg_query($conexion, $consulta);

while ($row = pg_fetch_array($resultado)) {
    $json[] = array('pacodcal' => $row['pacodcal'],
                    'canomcal' => $row['canomcal']
                    );
}
pg_close($conexion);
echo json_encode($json);
?>