<?php

include '../Conexion/Conexion.php';

$pacodefe = $_POST['pacodefe'];

$consulta = "SELECT `pacodefe`, 
`cadesefe`, 
`cacanefe`, 
`caestefe`, 
`catipcan` 
FROM `aegrefij` 
WHERE caestefe=true
and pacodefe='{$pacodefe}'";

$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('pacodefe' => $row['pacodefe'],
    'cadesefe' => $row['cadesefe'],
    'cacanefe' => $row['cacanefe'],
    'caestefe' => $row['caestefe'],
    'catipcan' => $row['catipcan'],
    );
}
mysqli_close($conexion);
echo json_encode($json);
?>