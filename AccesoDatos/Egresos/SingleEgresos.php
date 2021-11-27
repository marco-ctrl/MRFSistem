<?php

include '../Conexion/Conexion.php';

$pacodapo = $_POST['pacodapo'];

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
facodcaj, 
facodusu 
FROM aconegr, ausurio, amiebro, aconfin 
WHERE pacodapo=pacodegr
and facodusu=pacodusu
and facodmie=pacodmie
and caestapo=true
and pacodapo='{$pacodapo}'
order by pacodegr desc";

$resultado = mysqli_query($conexion, $consulta);

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
                    'cafecegr' => $row['cafecegr'],
                    'facodcaj' => $row['facodcaj']
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>