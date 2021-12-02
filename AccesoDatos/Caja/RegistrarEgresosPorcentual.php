<?php
include '../Conexion/Conexion.php';

date_default_timezone_set('UTC');
date_default_timezone_set('America/La_Paz');

$pacodcaj = $_POST['pacodcaj']; //codigo caja
$pacodusu = $_POST['pacodusu']; //codigo cajero

//$pacodcaj = 'CAJ-000001'; //codigo caja
//$pacodusu = 'USU-000004'; //codigo cajero

$egrPorcentual = array();

$corre = 0; //variable para obtener numero correlativo
$correlativo = 0;
$codEgreso = ''; //codigo de egreso porcentual

$fecha = date('Y-m-d');
$hora = date('h:i');

$mensaje = '';


$consulta = "SELECT cadesefe,
round(cacanefe, 0) as cacanefe,
format((SUM(camoning)/100)*cacanefe, 2) as total
FROM aegrefij, aconing, aconfin, aarqcaj
WHERE catipcan='PORCENTUAL'
and aconing.pacodeco=aconfin.pacodapo
AND aconfin.facodcaj=aarqcaj.pacodcaj
and aegrefij.caestefe=1
and aconfin.facodcaj='{$pacodcaj}'
GROUP BY cadesefe";

$resultado = mysqli_query($conexion, $consulta);

while ($egrPorcentual = mysqli_fetch_array($resultado)) {
    if (VerificarExistencia('EGR', $conexion, $corre)) {
        $corre = ObtenerCorrelativo('EGR', $conexion);
        $correlativo = ObtenerSiguiente($corre);
        $codEgreso = numeroCorrelativo($correlativo, 'EGR');
    } else {
        $correlativo = 1;
        $codEgreso = numeroCorrelativo($correlativo, 'EGR');
    }

    $camonegr=$egrPorcentual['total'];
    $cadesegr=$egrPorcentual['cadesefe'] . '(' . $egrPorcentual['cacanefe'] . '%)';

    $sql = "INSERT INTO `aconfin`(`caestapo`, `cafecapo`, `cahorapo`, `pacodapo`, `facodusu`, `facodcaj`)
    VALUES(
        true,
        '{$fecha}',
        '{$hora}',
        '{$codEgreso}',
        '{$pacodusu}',
        '{$pacodcaj}'
    )";
    $stm = mysqli_query($conexion, $sql);
//}

    if ($stm) {
        $sql = "INSERT INTO `aconegr`(`camonegr`, `cadesegr`, `pacodegr`, `cafecegr`)
    VALUES('{$camonegr}','{$cadesegr}','{$codEgreso}', '{$fecha}')";

        $stm1 = mysqli_query($conexion, $sql);
        if ($stm1) {
            ActualizarSecuencia($correlativo, 'EGR', $conexion);
            $mensaje = "registra";
        } else {
            $mensaje = "noRegistra ".mysqli_error($conexion);
            break;
        }

    } else {
        $mensaje = "noRegistra ".mysqli_error($conexion);
        break;
    }

}

echo $mensaje;
mysqli_close($conexion);

function VerificarExistencia($codigo, $conexion, $corre)
{
    $sql = "select * from num_correlativo where codigo='{$codigo}'";

    $stm = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($stm)) {
        $corre = $row['correlativo'];
    }

    if ($corre != null) {
        return true;
    } else {
        return false;
    }
}

function ObtenerCorrelativo($codigo, $conexion)
{
    $sql = "select * from num_correlativo where codigo ='{$codigo}'";

    $stm = mysqli_query($conexion, $sql);

    while ($row = mysqli_fetch_array($stm)) {
        $corre = $row['correlativo'];
    }
    return $corre;
}

function ObtenerSiguiente($corre)
{
    return ($corre + 1);
}

function ModificarSecuencia($correlativo, $codigo, $conexion)
{
    $sql = "UPDATE num_correlativo
                SET correlativo='{$correlativo}'
                WHERE codigo='{$codigo}'";

    $stm = mysqli_query($conexion, $sql);

    if ($stm) {
        //echo "registra codigo";
        return true;
    } else {
        //echo "noModifica codigo " . mysqli_result_error($conexion);
        return false;
    }

    //mysqli_close($conexion);
}

function numeroCorrelativo($correlativo, $codigo)
{

    switch ((mb_strlen($correlativo))) {
        case 1:
            return $codigo . '-00000' . $correlativo;
            break;
        case 2:
            return $codigo . '-0000' . $correlativo;
            break;
        case 3:
            return $codigo . '-000' . $correlativo;
            break;
        case 4:
            return $codigo . '-00' . $correlativo;
            break;
        case 5:
            return $codigo . '-0' . $correlativo;
            break;
        case 6:
            return $codigo . '-' . $correlativo;
            break;
        default:
            # code...
            break;
    }
}

function GuardarSecuencia($codigo, $correlativo, $conexion)
{
    $sql = "INSERT INTO num_correlativo(
        codigo, correlativo)
        VALUES ('{$codigo}', '{$correlativo}')";

    $stm = mysqli_query($conexion, $sql);

    if ($stm) {
        //echo "registra codigo";
        return true;
    } else {
        //die("noRegistra codigo " . mysqli_result_error($conexion));
        return false;
    }

}

function ActualizarSecuencia($corre, $codigo, $conexion)
{
    if (VerificarExistencia($codigo, $conexion, $corre)) {
        ModificarSecuencia($corre, $codigo, $conexion);
    } else {
        GuardarSecuencia($codigo, $corre, $conexion);
    }
}
