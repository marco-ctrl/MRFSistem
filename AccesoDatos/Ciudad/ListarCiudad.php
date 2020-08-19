<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
caestciu, 
canomciu, 
pacodciu
FROM aciudad";
$resultado = pg_query($conexion, $consulta);

while ($row = pg_fetch_array($resultado)) {
    $json[] = array('caestciu' => $row['caestciu'],
                    'canomciu' => $row['canomciu'],
                    'pacodciu' => $row['pacodciu'],
                    );
}
pg_close($conexion);
echo json_encode($json);
?>