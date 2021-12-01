<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
$caestapo = true;
$cafecapo = $_POST['cafecapo'];
$cahorapo = $_POST['cahorapo'];
$pacodapo = $_POST['pacodapo'];
$facodusu = $_POST['facodusu'];
$camonegr = $_POST['camonegr'];
$cadesegr = $_POST['cadesegr'];
$cafecegr = $_POST['cafecegr'];
$facodcaj = $_POST['facodcaj'];

$sql = "INSERT INTO `aconfin`(`caestapo`, `cafecapo`, `cahorapo`, `pacodapo`, `facodusu`, `facodcaj`)
    VALUES(
        true,
        '{$cafecapo}',
        '{$cahorapo}',
        '{$pacodapo}',
        '{$facodusu}',
        '{$facodcaj}'
    )";
$stm = mysqli_query($conexion, $sql);
//}

if ($stm) {
    $sql = "INSERT INTO `aconegr`(`camonegr`, `cadesegr`, `pacodegr`, `cafecegr`)
    VALUES('{$camonegr}','{$cadesegr}','{$pacodapo}', '{$cafecegr}')";

    $stm1 = mysqli_query($conexion, $sql);
    if ($stm1) {
        echo "registra";
    } else {
        echo "noRegistra";
    }

} else {
    echo "noRegistra";
}

mysqli_close($conexion);
