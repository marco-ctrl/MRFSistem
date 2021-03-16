<?php

include '../Conexion/Conexion.php';

$pacodalu=$_POST['pacodalu'];
//$pacodalu='ALU-000003';
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
canomciu,
canomcel,
cafunmie,
pacodalu
FROM amiebro m, aproion p, aciudad c, acelula e, amiecel f, alumno a  
where m.facodpro=p.pacodpro 
and m.caestmie=true
and m.facodciu=c.pacodciu
and m.pacodmie=f.facodmie
and e.pacodcel=f.facodcel
and a.facodmie=m.pacodmie
and a.pacodalu='{$pacodalu}'
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
                    'canomciu' => $row['canomciu'],
                    'canomcel' => $row['canomcel'],
                    'cafunmie' => $row['cafunmie'],
                    'pacodalu' => $row['pacodalu']);
}
if ($json==null){
    echo 'no encontrado';
}
else{
    echo json_encode($json);
}
pg_close($conexion);

?>