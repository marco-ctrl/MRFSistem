<?php

include '../Conexion/Conexion.php';

$buscar=$_POST['buscar'];

$consulta = "SELECT 
cagescur, 
cadescur, 
caestcur, 
cafecini, 
pacodcur, 
facodcon, 
facodmae,
canommat,
canommie,
capatmie,
camatmie
	FROM acursom, 
		aconido, 
		amiebro,
		amaetro
	where facodcon=pacodcon
	and facodmae=pacodmae
    and facodmie=pacodmie
    and caestcur='true'
    and canommat like '%{$buscar}%'
            order by pacodcon desc 
            limit 15;";
$resultado = pg_query($conexion, $consulta);

$json=array();

while ($row = pg_fetch_array($resultado)) {
    $json[] = array('cagescur' => $row['cagescur'],
    'cadescur' => $row['cadescur'],
    'caestcur' => $row['caestcur'],
    'cafecini' => $row['cafecini'],
    'pacodcur' => $row['pacodcur'],
    'facodcon' => $row['facodcon'],
    'facodmae' => $row['facodmae'],
    'canommat' => $row['canommat'],
    'canommie' => $row['canommie'],
    'capatmie' => $row['capatmie'],
    'camatmie' => $row['camatmie']
                    );
}
if($json!=null){
    echo json_encode($json);
}
else {
    echo "no encontrado";
}
pg_close($conexion);
?>