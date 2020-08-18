<?php

include 'Conexion.php'; 

$codigo=$_POST['codigo'];

//$codigo="CEL";
$sql="select * from num_correlativo where codigo='{$codigo}'";

$stm= pg_query($conexion, $sql);
$json=array();
while($row=pg_fetch_array($stm)){
    $json[]=array('correlativo'=>$row['correlativo']);
}

//echo sizeof();
//echo sizeof($json);
//echo $stm;
if(sizeof($json)>0){
    echo 'true';
}
else{
    echo 'false';
}
pg_close($conexion);
//echo json_encode($json);
?>