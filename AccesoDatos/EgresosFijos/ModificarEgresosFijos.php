<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
$caestefe = true;
$cadesefe = $_POST['cadesefe'];
$cacanefe = $_POST['cacanefe'];
$pacodefe = $_POST['pacodefe'];
$catipcan = $_POST['catipcan'];

$sql = "UPDATE `aegrefij` SET
        `caestefe`=true,
        `cadesefe`='{$cadesefe}',
        `cacanefe`='{$cacanefe}',
        `catipcan`='{$catipcan}'
        WHERE `pacodefe`='{$pacodefe}'";

$stm = mysqli_query($conexion, $sql);
//}

if ($stm) {

    echo "modificado";

} else {
    echo "noRegistra";
}

mysqli_close($conexion);
