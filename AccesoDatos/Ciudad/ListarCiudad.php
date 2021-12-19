<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
caestciu, 
canomciu, 
pacodciu
FROM aciudad";
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('caestciu' => $row['caestciu'],
                    'canomciu' => $row['canomciu'],
                    'pacodciu' => $row['pacodciu'],
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>