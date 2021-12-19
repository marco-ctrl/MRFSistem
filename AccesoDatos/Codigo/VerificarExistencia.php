<?php

include '../Conexion/Conexion.php'; 

$codigo=$_POST['codigo'];

//$codigo="CEL";
$sql="select * from num_correlativo where codigo='{$codigo}'";

$stm= mysqli_query($conexion, $sql);
$json=array();
while($row=mysqli_fetch_array($stm)){
    $json[]=array('correlativo'=>$row['correlativo']);
}

if(sizeof($json)>0){
    echo 'true';
}
else{
    echo 'false';
}
mysqli_close($conexion);
//echo json_encode($json);
?>