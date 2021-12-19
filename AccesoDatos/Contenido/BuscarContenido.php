<?php

include '../Conexion/Conexion.php';

$buscar=$_POST['buscar'];

$consulta = "SELECT 
cadescon, 
caestcon, 
canommat, 
pacodcon
FROM 
aconido 
where
caestcon=true
and canommat like '%{$buscar}%'
            order by pacodcon desc 
            limit 15;";
$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('cadescon' => $row['cadescon'],
    'caestcon' => $row['caestcon'],
    'canommat' => $row['canommat'],
    'pacodcon' => $row['pacodcon']
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