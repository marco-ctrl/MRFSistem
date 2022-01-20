<?php

include '../Conexion/Conexion.php';

$pacodmie = $_POST['pacodmie'];
//$pacodmie = "MBR-9";

$consulta = "SELECT 
camatmie, 
capatmie, 
cacelmie, 
cacidmie, 
cacidext,
cadirmie, 
caestmie, 
ceestciv, 
cafecnac, 
caurlfot, 
canommie, 
pacodmie, 
facodciu, 
facodpro,
pacodpro,
canompro,
pacodciu,
canomciu,
cafeccon,
cafecbau,
cafecenc,
cafecigl,
pacodcre,
pacodcel,
cafunmie
FROM amiebro m, 
	 aproion p, 
	 aciudad c,
	 acreesp a,
     acelula, 
     amiecel
where m.facodpro=p.pacodpro 
and m.facodciu=c.pacodciu
and a.pacodcre=m.pacodmie
and pacodcel=facodcel
and facodmie=pacodmie
and m.pacodmie='{$pacodmie}'";
$resultado = mysqli_query($conexion, $consulta);
//if ($resultado) {'cafotmie' => urlencode(base64_encode(
    //mysqli_unescape_bytea($row['cafotmie']))),
    
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
                        'caurlfot' => $row['caurlfot'],
                        'canommie' => $row['canommie'],
                        'pacodmie' => $row['pacodmie'],
                        'facodciu' => $row['facodciu'],
                        'facodpro' => $row['facodpro'],
                        'pacodpro' => $row['pacodpro'],
                        'canompro' => $row['canompro'],
                        'pacodciu' => $row['pacodciu'],
                        'canomciu' => $row['canomciu'],
                        'cafeccon' => $row['cafeccon'] ,
                        'cafecbau' => $row['cafecbau'],
                        'cafecenc' => $row['cafecenc'],
                        'cafecigl' => $row['cafecigl'],
                        'pacodcre' => $row['pacodcre'],
                        'pacodcel' => $row['pacodcel'],
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