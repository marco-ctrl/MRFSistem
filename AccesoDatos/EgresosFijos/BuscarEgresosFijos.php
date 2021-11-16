<?php

include '../Conexion/Conexion.php';

$buscar = $_POST['buscar'];

$consulta = "SELECT `pacodefe`, 
`cadesefe`, 
`cacanefe`, 
`caestefe`, 
`catipcan` 
FROM `aegrefij` 
WHERE caestefe=true
and cadesefe like '%{$buscar}%'";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('pacodefe' => $row['pacodefe'],
    'cadesefe' => $row['cadesefe'],
    'cacanefe' => $row['cacanefe'],
    'caestefe' => $row['caestefe'],
    'catipcan' => $row['catipcan'],
    );
}
if($json!=null){
    echo json_encode($json);
}
else {
    echo "no encontrado";
}
mysqli_close($conexion);
?>