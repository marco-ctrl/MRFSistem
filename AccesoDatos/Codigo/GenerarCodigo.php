<?php

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

?>
