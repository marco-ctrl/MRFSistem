<?php

include '../Conexion/Conexion.php';

$pacodcaj=$_POST['pacodcaj'];

$consulta = "SELECT format(camonegr, 2), 
cadesegr, 
pacodegr, 
cafecegr,
canommie, 
capatmie, 
camatmie,
cafecapo, 
cahorapo, 
pacodapo,
caestapo, 
facodusu,
pacodcaj
FROM aconegr, ausurio, amiebro, aconfin, aarqcaj 
WHERE pacodapo=pacodegr
and facodusu=pacodusu
and facodmie=pacodmie
and caestapo=true
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
order by pacodegr desc";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('caestapo' => $row['caestapo'],
                    'cadesegr' => $row['cadesegr'],
                    'cafecapo' => $row['cafecapo'],
                    'cahorapo' => $row['cahorapo'],
                    'pacodapo' => $row['pacodapo'],
                    'camonegr' => $row['format(camonegr, 2)'],
                    'canommie' => $row['canommie'],
                    'capatmie' => $row['capatmie'],
                    'camatmie' => $row['camatmie'],
                    'cafecegr' => $row['cafecegr']
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