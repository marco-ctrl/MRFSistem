<?php

include '../Conexion/Conexion.php';

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie,
cacidmie, 
cadirmie, 
cafecnac, 
canommie, 
pacodmie, 
canomcel,
canumcel,
canombar,
canomcal,
cafunmie,
caestcel,
pacodmcl,
pacodcel
FROM amiebro m, acelula, amiecel, abardir, acaldir 
where pacodmie=facodmie
and pacodcel=facodcel
and pacodbar=facodbar
and pacodcal=facodcal
and caestcel=true
and cafunmie='LIDER'
order by cafunmie desc";
$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('camatmie' => $row['camatmie'],
                    'capatmie' => $row['capatmie'],
                    'cacelmie' => $row['cacelmie'],
                    'cacidmie' => $row['cacidmie'],
                    'cacidext' => $row['cacidext'],
                    'cadirmie' => $row['cadirmie'],
                    'cafecnac' => $row['cafecnac'],
                    'canommie' => $row['canommie'],
                    'pacodmie' => $row['pacodmie'],
                    'canomcel' => $row['canomcel'],
                    'cafunmie' => $row['cafunmie'],
                    'pacodmcl' => $row['pacodmcl'],
                    'canombar' => $row['canombar'],
                    'canomcal' => $row['canomcal'],
                    'canumcel' => $row['canumcel'],
                    'pacodcel' => $row['pacodcel']);
}
if ($json==null){
    echo 'false';
}
else{
    echo json_encode($json);
}
mysqli_close($conexion);

?>