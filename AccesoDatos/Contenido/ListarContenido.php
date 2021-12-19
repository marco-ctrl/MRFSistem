<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
            cadescon, 
            caestcon, 
            canommat, 
            pacodcon
            FROM 
            aconido
            WHERE caestcon= true";
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('cadescon' => $row['cadescon'],
                    'caestcon' => $row['caestcon'],
                    'canommat' => $row['canommat'],
                    'pacodcon' => $row['pacodcon']
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>