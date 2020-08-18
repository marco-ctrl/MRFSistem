<?php

include 'Conexion.php';

$consulta = "SELECT 
            caestbar, 
            canombar, 
            pacodbar
            FROM public.abardir";
$resultado = pg_query($conexion, $consulta);

while ($row = pg_fetch_array($resultado)) {
    $json[] = array('pacodbar' => $row['pacodbar'],
                    'canombar' => $row['canombar']
                    );
}
pg_close($conexion);
echo json_encode($json);
?>