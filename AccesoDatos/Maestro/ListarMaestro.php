<?php

include '../Conexion/Conexion.php';

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
            order by pacodmie desc 
            limit 15;";
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
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
mysqli_close($conexion);
echo json_encode($json);
?>