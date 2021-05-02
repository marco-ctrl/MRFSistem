<?php

include '../Conexion/Conexion.php';

$buscar=$_POST['buscar'];

$consulta = "SELECT 
            caestcel, 
            canomcel, 
            canumcel, 
            pacodcel, 
            facodbar, 
            facodcal, 
            calatcel, 
            calogcel,
            canombar,
            canomcal,
            pacodbar,
            pacodcal
            FROM acelula, abardir, acaldir 
            WHERE caestcel='true'
            and facodbar=pacodbar
            and facodcal=pacodcal
            and canomcel like '%{$buscar}%'
            order by pacodcel desc 
            limit 15;";
$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('caestcel' => $row['caestcel'],
                    'canomcel' => $row['canomcel'],
                    'canumcel' => $row['canumcel'],
                    'pacodcel' => $row['pacodcel'],
                    'facodbar' => $row['facodbar'],
                    'facodcal' => $row['facodcal'],
                    'calatcel' => $row['calatcel'],
                    'calogcel' => $row['calogcel'],
                    'canombar' => $row['canombar'],
                    'canomcal' => $row['canomcal'],
                    'pacodbar' => $row['pacodbar'],
                    'pacodcal' => $row['pacodcal']
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