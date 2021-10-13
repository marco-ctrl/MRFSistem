<?php

include '../Conexion/Conexion.php';

$pacodcon = $_POST['pacodcon'];
//$buscar = "B";

$consulta = "SELECT 
            cadescon, 
            caestcon, 
            canommat, 
            pacodcon
            FROM 
            aconido
            WHERE caestcon=true
            and pacodcon='{$pacodcon}'
            order by pacodcon desc 
            limit 15;";
$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('caestcon' => $row['caestcon'],
                    'canommat' => $row['canommat'],
                    'cadescon' => $row['cadescon'],
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