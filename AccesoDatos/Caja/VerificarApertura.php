<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT *
FROM `aarqcaj`
where caestcaj=true";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('pacodcaj' => $row['pacodcaj'],
                    'cainicaj' => $row['cainicaj'],
                    'cafincaj' => $row['cafincaj'],
                    'camonini' => $row['camonini'],
                    'camonfin' => $row['camonfin'],
                    'caestcaj' => $row['caestcaj'],
                    'catoting' => $row['catoting'],
                    'catotegr' => $row['catoting']
                    );
}

//echo sizeof($json);

if(sizeof($json)>0){
    echo 'true';
}
else{
    echo 'false';
}
mysqli_close($conexion);
?>