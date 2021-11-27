<?php

include '../Conexion/Conexion.php';

$pacodcaj = $_POST['pacodcaj'];

$consulta = "SELECT `pacodcaj`, 
cainicaj, 
cafincaj, 
format(camonini, 2), 
format(camonfin, 2),
caestcaj,
format(catoting, 2),
format(catotegr, 2) 
FROM `aarqcaj`
where pacodcaj='{$pacodcaj}'
ORDER BY pacodcaj DESC";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('pacodcaj' => $row['pacodcaj'],
                    'cainicaj' => $row['cainicaj'],
                    'cafincaj' => $row['cafincaj'],
                    'camonini' => $row['format(camonini, 2)'],
                    'camonfin' => $row['format(camonfin, 2)'],
                    'caestcaj' => $row['caestcaj'],
                    'catoting' => $row['format(catoting, 2)'],
                    'catotegr' => $row['format(catoting, 2)']
                    );
}
if ($json==null){
    echo 'false';
}
else{
    echo json_encode($json);
}
mysqli_close($conexion);
?>