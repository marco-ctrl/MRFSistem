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
cafunmie
FROM amiebro m, aproion p, aciudad c, acelula, amiecel  
where m.facodpro=p.pacodpro
and m.caestmie=true 
and m.facodciu=c.pacodciu
and m.cabanalu=false
and pacodmie=facodmie
and pacodcel=facodcel
and canommie like'%{$buscar}%'
order by pacodmie desc LIMIT 15";

$resultado = mysqli_query($conexion, $consulta);
//if ($resultado) {
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
                        'cafunmie' => $row['cafunmie']);
    }
    if($json!=null){
        echo json_encode($json);
    }
    else {
        echo "no encontrado";
    }
    mysqli_close($conexion);
    


?>