<?php

include 'Conexion.php'; 

$codigo=$_POST['codigo'];

$sql="select * from num_correlativo where codigo ='{$codigo}'";

$stm= pg_query($conexion, $sql);
 
while($row=pg_fetch_array($stm)){
    $json[]=array('correlativo'=>$row['correlativo']);
}

pg_close($conexion);
echo json_encode($json);
?>