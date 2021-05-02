<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT caestapo, 
                    cafecapo, 
                    cahorapo, 
                    pacodapo, 
                    facodusu, 
                    camontot, 
                    canommie, 
                    capatmie, 
                    camatmie
            FROM public.aapotes, aapoeco, ausurio, amiebro
            where pacodapo=pacodeco
            and facodusu=pacodusu
            and facodmie=pacodmie
            and caestapo='true'";
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('caestapo' => $row['caestapo'],
                    'cafecapo' => $row['cafecapo'],
                    'cahorapo' => $row['cahorapo'],
                    'pacodapo' => $row['pacodapo'],
                    'camontot' => $row['camontot'],
                    'canommie' => $row['canommie'],
                    'capatmie' => $row['capatmie'],
                    'camatmie' => $row['camatmie']
                    );
}
mysqli_close($conexion);
echo json_encode($json);
?>