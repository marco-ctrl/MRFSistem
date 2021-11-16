<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
$caestefe = true;
$cadesefe = $_POST['cadesefe'];
$cacanefe = $_POST['cacanefe'];
$pacodefe = $_POST['pacodefe'];
$catipcan = $_POST['catipcan'];

$sql = "INSERT INTO `aegrefij`
    (`pacodefe`,
     `cadesefe`,
     `cacanefe`,
     `caestefe`,
     `catipcan`)
VALUES ('{$pacodefe}',
      '{$cadesefe}',
      {$cacanefe},
      {$caestefe},
      '{$catipcan}')";
$stm = mysqli_query($conexion, $sql);
//}

if ($stm) {
    echo "registra";

} else {
    //echo "noRegistra";
    die(mysqli_error($conexion));
}

mysqli_close($conexion);
