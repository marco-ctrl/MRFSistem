<?php

include '../Conexion/Conexion.php';

$pacodapo = $_POST['pacodapo'];

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
cafecing,
facodcaj
FROM aconfin, aconing, ausurio, amiebro
where pacodapo=pacodeco
and facodusu=pacodusu
and facodmie=pacodmie
and caestapo=true
and pacodapo='{$pacodapo}'
order by pacodapo desc";

$resultado = mysqli_query($conexion, $consulta);

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
                    'cafecing' => $row['cafecing'],
                    'facodcaj' => $row['facodcaj']
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>