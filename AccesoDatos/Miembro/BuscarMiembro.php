<?php

include '../Conexion/Conexion.php';

$buscar = $_POST['buscar'];
//$buscar = "B";

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie, 
cadirmie, 
caestmie, 
caestciv, 
cafecnac, 
cafotmie, 
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
and canommie like'%{$buscar}%'
order by pacodmie desc LIMIT 15";
$resultado = pg_query($conexion, $consulta);
//if ($resultado) {
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
                        'cafotmie' => $row['cafotmie'],
                        'canommie' => $row['canommie'],
                        'pacodmie' => $row['pacodmie'],
                        'facodciu' => $row['facodciu'],
                        'facodpro' => $row['facodpro'],
                        'pacodpro' => $row['pacodpro'],
                        'canompro' => $row['canompro'],
                        'pacodciu' => $row['pacodciu'],
                        'canomciu' => $row['canomciu']);
    }
    if($json!=null){
        echo json_encode($json);
    }
    else {
        echo "no encontrado";
    }
    pg_close($conexion);
    


?>