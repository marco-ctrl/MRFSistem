<?php

include '../Conexion/Conexion.php';

$codigo=$_POST['codigo'];

$sql="select * from num_correlativo where codigo ='{$codigo}'";

$stm= mysqli_query($conexion, $sql);
 
while($row=mysqli_fetch_array($stm)){
    $json[]=array('correlativo'=>$row['correlativo']);
}

mysqli_close($conexion);
echo json_encode($json);
?>