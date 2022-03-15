<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT 
            cagescur 
	FROM acursom
    where caestcur=true
    group by cagescur";
$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('cagescur' => $row['cagescur']);
}
if($json!=null){
    echo json_encode($json);
}
else {
    echo "no encontrado";
}
?>