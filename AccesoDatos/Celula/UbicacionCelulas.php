<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT canomcel, 
canumcel, 
pacodcel, 
calatcel, 
calogcel, 
canommie, 
capatmie, 
camatmie 
FROM `acelula`, amiecel, amiebro
WHERE amiecel.facodcel=acelula.pacodcel
and amiecel.facodmie=amiebro.pacodmie
and amiecel.cafunmie='LIDER'";

$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('canomcel' => $row['canomcel'],
                    'canumcel' => $row['canumcel'],
                    'pacodcel' => $row['pacodcel'],
                    'calatcel' => $row['calatcel'],
                    'calogcel' => $row['calogcel'],
                    'canommie' => $row['canommie'],
                    'capatmie' => $row['capatmie'],
                    'camatmie' => $row['camatmie']
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>