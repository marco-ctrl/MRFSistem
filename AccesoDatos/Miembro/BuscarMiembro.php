<?php

include '../Conexion/Conexion.php';

$buscar = $_POST['buscar'];
$condicion = $_POST['condicion'];
//$buscar = "B";
//$condicion = "cacidmie";

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie,
cacidext, 
cadirmie, 
caestmie, 
ceestciv, 
cafecnac, 
cafotmie, 
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
pacodcel
FROM amiebro m, aproion p, aciudad c, amiecel, acelula
where m.facodpro=p.pacodpro
and m.caestmie=true 
and m.facodciu=c.pacodciu
and facodcel=pacodcel
and facodmie=pacodmie
and {$condicion} like '%{$buscar}%'
order by pacodmie desc LIMIT 15";
$resultado = mysqli_query($conexion, $consulta);
//if ($resultado) {
    $json=array();
    while ($row = mysqli_fetch_array($resultado)) {
        $json[] = array('camatmie' => $row['camatmie'],
                        'capatmie' => $row['capatmie'],
                        'cacelmie' => $row['cacelmie'],
                        'cacidmie' => $row['cacidmie'],
                        'cacidext' => $row['cacidext'],
                        'cadirmie' => $row['cadirmie'],
                        'caestmie' => $row['caestmie'],
                        'caestciv' => $row['ceestciv'],
                        'cafecnac' => $row['cafecnac'],
                        'cafotmie' => $row['cafotmie'],
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
                        'pacodcel' => $row['pacodcel']);
    }
    if($json!=null){
        echo json_encode($json);
    }
    else {
        echo "no encontrado";
    }
    mysqli_close($conexion);
    


?>