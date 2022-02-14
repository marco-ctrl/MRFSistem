<?php

include '../Conexion/Conexion.php';

$cacidmie = $_POST['cacidmie'];
//$buscar = "B";

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie,
cacidext, 
cadirmie, 
cafecnac, 
canommie, 
pacodmie, 
canomcel,
cafunmie,
pacodmcl,
pacodcel
FROM amiebro m, acelula, amiecel 
where pacodmie=facodmie
and pacodcel=facodcel
and amiecel.caestmcl=1
and cacidmie = $cacidmie";
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
        'cafecnac' => $row['cafecnac'],
        'canommie' => $row['canommie'],
        'pacodmie' => $row['pacodmie'],
        'canomcel' => $row['canomcel'],
        'cafunmie' => $row['cafunmie'],
        'pacodmcl' => $row['pacodmcl'],
        'pacodcel' => $row['pacodcel']);
    }
    if($json!=null){
        echo json_encode($json);
    }
    else {
        echo "no encontrado";
    }
    mysqli_close($conexion);
