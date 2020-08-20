<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie, 
cadirmie, 
caestmie, 
caestciv, 
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
FROM amiebro m, aproion p, aciudad c 
where m.facodpro=p.pacodpro 
and m.caestmie=true
and m.facodciu=c.pacodciu
order by pacodmie desc LIMIT 15";
$resultado = pg_query($conexion, $consulta);

$json=array();

while ($row = pg_fetch_array($resultado)) {
    $json[] = array('camatmie' => $row['camatmie'],
                    'capatmie' => $row['capatmie'],
                    'cacelmie' => $row['cacelmie'],
                    'cacidmie' => $row['cacidmie'],
                    'cadirmie' => $row['cadirmie'],
                    'caestmie' => $row['caestmie'],
                    'caestciv' => $row['caestciv'],
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
pg_close($conexion);

?>