<?php

include '../Conexion/Conexion.php';

$buscar=$_POST['buscar'];

$consulta = "SELECT 
cadescon, 
caestcon, 
canommat, 
pacodcon
FROM 
public.aconido 
where
canommat like '%{$buscar}%'
            order by pacodcon desc 
            limit 15;";
$resultado = pg_query($conexion, $consulta);

$json=array();

while ($row = pg_fetch_array($resultado)) {
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
pg_close($conexion);
?>