<?php

include 'Conexion.php';

$pacodmie = $_POST['pacodmie'];
//$pacodmie = "MBR-9";

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
and m.facodciu=c.pacodciu
and m.pacodmie='{$pacodmie}'";
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
                        'cafotmie' => urlencode(base64_encode(
                            pg_unescape_bytea($row['cafotmie']))),
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