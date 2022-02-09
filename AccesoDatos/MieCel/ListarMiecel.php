<?php

include '../Conexion/Conexion.php';

$pacodcel=$_POST['codCel'];

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
cafunmie,
pacodmcl
FROM amiebro m, acelula, amiecel 
where pacodmie=facodmie
and pacodcel=facodcel
and amiecel.caestmcl=1
and pacodcel='{$pacodcel}'
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
                    'pacodmcl' => $row['pacodmcl']);
}
if ($json==null){
    echo 'false';
}
else{
    echo json_encode($json);
}
mysqli_close($conexion);

?>