<?php

include '../Conexion/Conexion.php';

$pacodmae = $_POST['pacodmae'];

$consulta = "SELECT 
            facodmie, 
            pacodmae, 
            cacidmie, 
            canommie, 
            capatmie, 
            camatmie, 
            cadirmie, 
            cacelmie,
            caestmie
            FROM 
	        amaetro, 
	        amiebro
            WHERE caestmae='true'
            and facodmie=pacodmie
            and pacodmae='{$pacodmae}'
            order by pacodmie desc 
            limit 15;";
$resultado = pg_query($conexion, $consulta);

$json=array();

while ($row = pg_fetch_array($resultado)) {
    $json[] = array('caestmie' => $row['caestmie'],
                    'canommie' => $row['canommie'],
                    'capatmie' => $row['capatmie'],
                    'camatmie' => $row['camatmie'],
                    'cacidmie' => $row['cacidmie'],
                    'cadirmie' => $row['cadirmie'],
                    'cacelmie' => $row['cacelmie'],
                    'pacodmae' => $row['pacodmae'],
                    'facodmie' => $row['facodmie']
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