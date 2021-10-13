<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $facodcon = $_POST['facodcon'];
    $facodmae = $_POST['facodmae'];
    $pacodcur = $_POST['pacodcur'];
    $cagescur = $_POST['cagescur'];
    $cafecini = $_POST['cafecini'];
    $caestcur = $_POST['caestcur'];
    $cadescur = $_POST['cadescur'];
    
    $sql = "INSERT INTO acursom(
        cagescur, 
        cadescur, 
        caestcur, 
        cafecini, 
        pacodcur, 
        facodcon, 
        facodmae)    
        VALUES (
        '{$cagescur}', 
        '{$cadescur}',
        {$caestcur}, 
        '{$cafecini}',
        '{$pacodcur}',
        '{$facodcon}',
        '{$facodmae}');";
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