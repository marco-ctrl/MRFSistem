<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
canompro, 
pacodpro
FROM aproion 
order by canompro asc;";
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('pacodpro' => $row['pacodpro'],
                    'canompro' => $row['canompro']
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>