<?php

include 'Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $pacodusu = $_POST['pacodusu'];
    $facodmie = $_POST['facodmie'];
    $canomusu = $_POST['canomusu'];
    $caconusu = $_POST['caconusu'];
    $catipusu = $_POST['catipusu'];
    $caestusu = $_POST['caestusu'];

    /*$pacodusu = "USU-1";
    $facodmie = "MBR-1";
    $canomusu = "marck45";
    $caconusu = "1234";
    $catipusu = "ADMINISTRADOR";
    $caestusu = true;*/
    
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
        '{$caestusu}')";
    $stm = pg_query($conexion, $sql);
//}
if ($stm) {
    echo "registra";
} else {
    echo "noRegistra";
}

pg_close($conexion);
?>