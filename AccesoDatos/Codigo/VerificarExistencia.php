<?php

include 'Conexion.php'; 

$codigo=$_POST['codigo'];

$sql="select * from num_correlativo where codigo='{$codigo}'";

$stm= pg_query($conexion, $sql);
 
if($stm){
    $json[]=array('ban'=>true);
    //echo ''.true;
}
else{
    $json[]=array('ban'=>false);
    //echo ''.true;
}
pg_close($conexion);
echo json_encode($json);
?>