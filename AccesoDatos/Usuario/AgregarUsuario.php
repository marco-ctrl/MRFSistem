<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $pacodusu = $_POST['pacodusu'];
    $facodmie = $_POST['facodmie'];
    $canomusu = $_POST['canomusu'];
    $caconusu = $_POST['caconusu'];
    $catipusu = $_POST['catipusu'];
    $caestusu = $_POST['caestusu'];

    $sql = "INSERT INTO ausurio(
        caconusu, 
        catipusu, 
        canomusu, 
        pacodusu, 
        facodmie,
        caestusu)
        VALUES (
        '{$caconusu}', 
        '{$catipusu}', 
        '{$canomusu}', 
        '{$pacodusu}', 
        '{$facodmie}',
        true)";
    $stm = mysqli_query($conexion, $sql);
//}
if ($stm) {
    echo "registra";
} else {
    //echo "noRegistra";
    die (mysqli_error($conexion));
}

mysqli_close($conexion);
?>