<?php

include '../Conexion/Conexion.php';

$cafecmin=$_POST['cafecmin'];
$cafecmax=$_POST['cafecmax'];

$consulta = "SELECT caestapo, 
catiping,
cafecapo, 
cahorapo, 
pacodapo, 
facodusu, 
format(camoning, 2), 
canommie, 
capatmie, 
camatmie,
cafecing
FROM aconfin, aconing, ausurio, amiebro
where pacodapo=pacodeco
and facodusu=pacodusu
and facodmie=pacodmie
and caestapo=true
and cafecing>='{$cafecmin}'
and cafecing<='{$cafecmax}'
order by pacodapo desc";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('caestapo' => $row['caestapo'],
                    'catiping' => $row['catiping'],
                    'cafecapo' => $row['cafecapo'],
                    'cahorapo' => $row['cahorapo'],
                    'pacodapo' => $row['pacodapo'],
                    'camoning' => $row['format(camoning, 2)'],
                    'canommie' => $row['canommie'],
                    'capatmie' => $row['capatmie'],
                    'camatmie' => $row['camatmie'],
                    'cafecing' => $row['cafecing']
                    );
}

if($json!=null){
    echo json_encode($json);
}
else {
    echo "no encontrado";
}

mysqli_close($conexion);
//echo json_encode($json);
?>