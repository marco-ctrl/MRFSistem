<?php

include '../Conexion/Conexion.php';

$pacodcaj = $_POST['pacodcaj'];

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
pacodcaj
FROM aconfin, aconing, ausurio, amiebro, aarqcaj
where pacodapo=pacodeco
and facodusu=pacodusu
and facodmie=pacodmie
and caestapo=true
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
order by pacodapo desc";

$resultado = mysqli_query($conexion, $consulta);

$json = array();

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
    );
}
if ($json == null) {
    echo 'false';
} else {
    echo json_encode($json);
}
mysqli_close($conexion);
