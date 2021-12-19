<?php

include '../Conexion/Conexion.php';
include_once '../Codigo/GenerarCodigo.php';

//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
$caestcel = true;
$canomcel = $_POST['canomcel'];
$canumcel = $_POST['canumcel'];
$pacodcel = $_POST['pacodcel'];
$facodbar = $_POST['facodbar'];
$facodcal = $_POST['facodcal'];
$calatcel = $_POST['calatcel'];
$calogcel = $_POST['calogcel'];

//datos de barrio
$addBarrio = $_POST['addBarrio'];
$nomBarrio = $_POST['nomBarrio'];
//datps de calle
$addCalle = $_POST['addCalle'];
$nomCalle = $_POST['nomCalle'];
//$addBarrio = 'true';

$corre = 0; //variable para obtener numero correlativo
$correlativo = 0;
//VARIABLES BOOLEANAS
$balBarrio = false;
$balCalle = false;

if ($addBarrio == 'true') {
    if (VerificarExistencia('BAR', $conexion, $corre)) {
        $corre = ObtenerCorrelativo('BAR', $conexion);
        $correlativo = ObtenerSiguiente($corre);
        $facodbar = numeroCorrelativo($correlativo, 'BAR');
    } else {
        $correlativo = 1;
        $facodbar = numeroCorrelativo($correlativo, 'BAR');
    }
    AgregarBarrio($conexion, $facodbar, $nomBarrio, $balBarrio, $correlativo);
    //echo $facodbar;
}

if ($addCalle == 'true') {
    if (VerificarExistencia('CAL', $conexion, $corre)) {
        $corre = ObtenerCorrelativo('CAL', $conexion);
        $correlativo = ObtenerSiguiente($corre);
        $facodcal = numeroCorrelativo($correlativo, 'CAL');
    } else {
        $correlativo = 1;
        $facodcal = numeroCorrelativo($correlativo, 'CAL');
    }
    AgregarCalle($conexion, $facodcal, $nomCalle, $balCalle, $correlativo);
    //echo $facodcal;
}

$sql = "INSERT INTO acelula(
caestcel,
canomcel,
canumcel,
pacodcel,
facodbar,
facodcal,
calatcel,
calogcel)
VALUES (
'{$caestcel}',
'{$canomcel}',
'{$canumcel}',
'{$pacodcel}',
'{$facodbar}',
'{$facodcal}',
'{$calatcel}',
'{$calogcel}');";
$stm = mysqli_query($conexion, $sql);
//}
if ($stm) {
echo "registra";
} else {
//echo "noRegistra";
die(mysqli_error($conexion));
}

mysqli_close($conexion);

//Funcion agregar Barrio y Calle

function AgregarBarrio($conexion, $codBarrio, $nomBarrio, $balBarrio, $correlativo)
{
    $consulta = "INSERT INTO `abardir`(
        `caestbar`,
        `canombar`,
        `pacodbar`)
        VALUES (
         true,
         '{$nomBarrio}',
         '{$codBarrio}'
        )";
    $balBarrio = mysqli_query($conexion, $consulta);

    if($balBarrio){
        ActualizarSecuencia($correlativo, 'BAR', $conexion);
    }
}

function AgregarCalle($conexion, $codCalle, $nomCalle, $balCalle, $correlativo)
{
    $consulta = "INSERT INTO `acaldir`(
                    `caestcal`,
                    `canomcal`,
                    `pacodcal`)
                VALUES (
                    true,
                    '{$nomCalle}',
                    '{$codCalle}'
                    )";
     $balCalle = mysqli_query($conexion, $consulta);
    if($balCalle){
        ActualizarSecuencia($correlativo, 'CAL', $conexion);
    }
}
