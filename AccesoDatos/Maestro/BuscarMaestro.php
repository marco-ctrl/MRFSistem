<?php

include '../Conexion/Conexion.php';

$buscar=$_POST['buscar'];
//$buscar = "B";

$consulta = "SELECT 
facodmie, 
pacodmae, 
cacidmie, 
canommie, 
capatmie, 
camatmie, 
cadirmie, 
cacelmie,
caestmie
FROM 
amaetro, 
amiebro
WHERE caestmae=true
and facodmie=pacodmie
and canommie like '%{$buscar}%'
order by pacodmae desc 
limit 15;";
$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('caestmie' => $row['caestmie'],
                    'canommie' => $row['canommie'],
                    'capatmie' => $row['capatmie'],
                    'camatmie' => $row['camatmie'],
                    'cacidmie' => $row['cacidmie'],
                    'cadirmie' => $row['cadirmie'],
                    'cacelmie' => $row['cacelmie'],
                    'pacodmae' => $row['pacodmae'],
                    'facodmie' => $row['facodmie']
                    );
}

if($json!=null){
    echo json_encode($json);
}
else {
    echo "no encontrado";
}
mysqli_close($conexion);

?>