<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
            cadescon, 
            caestcon, 
            canommat, 
            pacodcon
            FROM 
            public.aconido;";
$resultado = pg_query($conexion, $consulta);

while ($row = pg_fetch_array($resultado)) {
    $json[] = array('cadescon' => $row['cadescon'],
                    'caestcon' => $row['caestcon'],
                    'canommat' => $row['canommat'],
                    'pacodcon' => $row['pacodcon']
                    );
}
pg_close($conexion);
echo json_encode($json);
?>