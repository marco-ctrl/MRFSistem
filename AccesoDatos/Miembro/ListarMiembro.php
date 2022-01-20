<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie,
cacidext, 
cadirmie, 
caestmie, 
ceestciv, 
cafecnac, 
caurlfot, 
canommie, 
pacodmie, 
facodciu, 
facodpro,
pacodpro,
canompro,
pacodciu,
canomciu
FROM amiebro, aproion, aciudad  
where facodpro=pacodpro 
and caestmie=true
and facodciu=pacodciu
order by pacodmie desc LIMIT 15";
$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('camatmie' => $row['camatmie'],
                    'capatmie' => $row['capatmie'],
                    'cacelmie' => $row['cacelmie'],
                    'cacidmie' => $row['cacidmie'],
                    'cacidext' => $row['cacidext'],
                    'cadirmie' => $row['cadirmie'],
                    'caestmie' => $row['caestmie'],
                    'caestciv' => $row['ceestciv'],
                    'cafecnac' => $row['cafecnac'],
                    'caurlfot' => $row['caurlfot'],
                    'canommie' => $row['canommie'],
                    'pacodmie' => $row['pacodmie'],
                    'facodciu' => $row['facodciu'],
                    'facodpro' => $row['facodpro'],
                    'pacodpro' => $row['pacodpro'],
                    'canompro' => $row['canompro'],
                    'pacodciu' => $row['pacodciu'],
                    'canomciu' => $row['canomciu']);
}
if ($json==null){
    echo 'false';
}
else{
    echo json_encode($json);
}
mysqli_close($conexion);

?>