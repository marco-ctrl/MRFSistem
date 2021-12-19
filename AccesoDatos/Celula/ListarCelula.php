<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
            caestcel, 
            canomcel, 
            canumcel, 
            pacodcel, 
            facodbar, 
            facodcal, 
            calatcel, 
            calogcel,
            canombar,
            canomcal,
            pacodbar,
            pacodcal
            FROM `acelula`, abardir, acaldir 
            WHERE caestcel=true
            and facodbar=pacodbar
            and facodcal=pacodcal
            order by pacodcel desc 
            limit 15;";
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('caestcel' => $row['caestcel'],
                    'canomcel' => $row['canomcel'],
                    'canumcel' => $row['canumcel'],
                    'pacodcel' => $row['pacodcel'],
                    'facodbar' => $row['facodbar'],
                    'facodcal' => $row['facodcal'],
                    'calatcel' => $row['calatcel'],
                    'calogcel' => $row['calogcel'],
                    'canombar' => $row['canombar'],
                    'canomcal' => $row['canomcal'],
                    'pacodbar' => $row['pacodbar'],
                    'pacodcal' => $row['pacodcal']
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>