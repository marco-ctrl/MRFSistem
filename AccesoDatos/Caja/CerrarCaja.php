<?php

include '../Conexion/Conexion.php';

$pacodcaj = $_POST['pacodcaj'];
$cainicaj = $_POST['cainicaj'];
$camonini = $_POST['camonini'];
$cafincaj = $_POST['cafincaj'];
$camonfin = $_POST['camonfin'];
$caestcaj = 0;
$catoting = $_POST['catoting'];
$catotegr = $_POST['catotegr'];

$sql = "UPDATE `aarqcaj` SET
    cafincaj='{$cafincaj}',
    camonfin='{$camonfin}',
    caestcaj='{$caestcaj}',
    catoting='{$catoting}',
    catotegr='{$catotegr}'
    WHERE `pacodcaj`='{$pacodcaj}'";

$stm1 = mysqli_query($conexion, $sql);
if ($stm1) {
    echo "modificado";

} else {
    //echo "noRegistra";
    die(mysqli_error($conexion));
}

mysqli_close($conexion);
