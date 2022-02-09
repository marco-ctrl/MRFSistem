<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie, 
cadirmie, 
caestmie, 
ceestciv, 
cafecnac, 
caurlfot, 
canommie, 
pacodmie, 
facodciu, 
facodpro,
canomcel,
cafunmie,
caestmcl,
facodcel
FROM amiebro m, acelula, amiecel 
where caestmcl=true
and pacodmie=facodmie
and pacodcel=facodcel
and m.cabanalu=false
order by pacodmie desc";
$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('camatmie' => $row['camatmie'],
                    'capatmie' => $row['capatmie'],
                    'cacelmie' => $row['cacelmie'],
                    'cacidmie' => $row['cacidmie'],
                    'cadirmie' => $row['cadirmie'],
                    'caestmie' => $row['caestmie'],
                    'caestciv' => $row['ceestciv'],
                    'cafecnac' => $row['cafecnac'],
                    'caurlfot' => $row['caurlfot'],
                    'canommie' => $row['canommie'],
                    'pacodmie' => $row['pacodmie'],
                    'facodciu' => $row['facodciu'],
                    'facodpro' => $row['facodpro'],
                    'canomcel' => $row['canomcel'],
                    'cafunmie' => $row['cafunmie'],
                    'facodcel' => $row['facodcel']);
}
if ($json==null){
    echo 'false';
}
else{
    echo json_encode($json);
}
mysqli_close($conexion);

?>