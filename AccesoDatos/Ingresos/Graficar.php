<?php

include '../Conexion/Conexion.php';

//$pacodcaj = $_POST['pacodcaj'];
$anio=date('Y');

$consulta = "SELECT SUM(`camoning`) as total, DATE_FORMAT(cafecing, '%m') as mes, DATE_FORMAT(cafecing, '%Y') as anio
FROM aconing
WHERE DATE_FORMAT(cafecing, '%Y')='{$anio}'
GROUP by mes, anio";

$resultado = mysqli_query($conexion, $consulta);

$json = array();

while ($row = mysqli_fetch_array($resultado)) {
    switch ($row['mes']) {
        case '1':
            $json[] = array('total' => $row['total'],
                'mes' => 'ENERO',
            );
            break;
        case '2':
            $json[] = array('total' => $row['total'],
                'mes' => 'FEBRERO',
            );
            break;
        case '3':
            $json[] = array('total' => $row['total'],
                'mes' => 'MARZO',
            );
            break;
        case '4':
            $json[] = array('total' => $row['total'],
                'mes' => 'ABRIL',
            );
            break;
        case '5':
            $json[] = array('total' => $row['total'],
                'mes' => 'MAYO',
            );
            break;
        case '6':
            $json[] = array('total' => $row['total'],
                'mes' => 'JUNIO',
            );
            break;
        case '7':
            $json[] = array('total' => $row['total'],
                'mes' => 'JULIO',
            );
            break;
        case '8':
            $json[] = array('total' => $row['total'],
                'mes' => 'AGOSTO',
            );
            break;
        case '9':
            $json[] = array('total' => $row['total'],
                'mes' => 'SEPTIEMBRE',
            );
            break;
        case '10':
            $json[] = array('total' => $row['total'],
                'mes' => 'OCTUBRE',
            );
            break;
        case '11':
            $json[] = array('total' => $row['total'],
                'mes' => 'NOVIEMBRE',
            );
            break;
        case '12':
            $json[] = array('total' => $row['total'],
                'mes' => 'DICIEMBRE',
            );
            break;
        default:
            # code...
            break;
    }

}
if ($json == null) {
    die(mysqli_error($conexion));
} else {
    echo json_encode($json);
}
mysqli_close($conexion);

//echo ("hola mundo");
