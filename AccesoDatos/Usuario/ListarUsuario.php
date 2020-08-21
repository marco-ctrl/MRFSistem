<?php
    include '../Conexion/Conexion.php';

    $consulta = "SELECT usu.caconusu, 
    usu.catipusu, 
    usu.canomusu, 
    usu.pacodusu, 
    usu.facodmie, 
    usu.caestusu,
    mbr.canommie,
    mbr.capatmie,
    mbr.camatmie
        FROM ausurio usu, 
             amiebro mbr 
        WHERE 
            mbr.pacodmie=usu.facodmie
        and usu.caestusu='true'";
$resultado = pg_query($conexion, $consulta);

$json=array();

while ($row = pg_fetch_array($resultado)) {
    $json[] = array('caconusu' => $row['caconusu'],
                    'catipusu' => $row['catipusu'],
                    'canomusu' => $row['canomusu'],
                    'pacodusu' => $row['pacodusu'],
                    'facodmie' => $row['facodmie'],
                    'caestusu' => $row['caestusu'],
                    'canommie' => $row['canommie'],
                    'capatmie' => $row['capatmie'],
                    'camatmie' => $row['camatmie'],);
}

if ($json==null){
    echo 'false';
}
else{
    echo json_encode($json);
}

pg_close($conexion);
//echo json_encode($json);

?>