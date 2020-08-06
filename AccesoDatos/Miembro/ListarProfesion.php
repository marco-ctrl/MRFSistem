<?php

include 'Conexion.php';

$consulta = "SELECT 
canompro, 
pacodpro
FROM aproion;";
$resultado = pg_query($conexion, $consulta);

while ($row = pg_fetch_array($resultado)) {
    $json[] = array('pacodpro' => $row['pacodpro'],
                    'canompro' => $row['canompro']
                    );
}
pg_close($conexion);
echo json_encode($json);
?>