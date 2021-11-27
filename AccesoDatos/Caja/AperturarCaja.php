<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
$caestcaj = true;
$cainicaj = $_POST['cainicaj'];
$camonini = $_POST['camonini'];
$pacodcaj = $_POST['pacodcaj'];

$sql = "INSERT INTO `aarqcaj`(
        `pacodcaj`,
        `cainicaj`,
        `camonini`,
        `caestcaj`)
        VALUES (
        '{$pacodcaj}',
        '{$cainicaj}',
        '{$camonini}',
        {$caestcaj})";
$stm = mysqli_query($conexion, $sql);
//}

if ($stm) {
    echo "registra";

} else {
    echo "noRegistra";
}

mysqli_close($conexion);
