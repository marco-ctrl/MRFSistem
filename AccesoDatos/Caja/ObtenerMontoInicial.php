<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT `pacodcaj`, 
format(camonfin, 2)
FROM `aarqcaj`
ORDER BY pacodcaj DESC";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

//while ($row = mysqli_fetch_array($resultado)) {
    $row = mysqli_fetch_array($resultado);
    $json[] = array('pacodcaj' => $row['pacodcaj'],
                    'camonfin' => $row['format(camonfin, 2)']
                    );
//}
if ($json==null){
    echo 'false';
}
else{
    echo json_encode($json);
}
mysqli_close($conexion);
?>