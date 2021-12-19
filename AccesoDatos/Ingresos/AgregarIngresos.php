<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $caestapo = true;
    $cafecapo = $_POST['cafecapo'];
    $cahorapo = $_POST['cahorapo'];
    $pacodapo = $_POST['pacodapo'];
    $facodusu = $_POST['facodusu'];
    $camoning = $_POST['camoning'];
    $catiping = $_POST['catiping'];
    $cafecing = $_POST['cafecing'];
    $facodcaj = $_POST['facodcaj'];
    
    $sql = "INSERT INTO `aconfin`(
        `caestapo`,
        `cafecapo`,
        `cahorapo`,
        `pacodapo`,
        `facodusu`,
        `facodcaj`
    )
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
    $sql="INSERT INTO `aconing`(`camoning`, `pacodeco`, `catiping`, `cafecing`)
    VALUES('{$camoning}','{$pacodapo}','{$catiping}', '{$cafecing}')";

    $stm1=mysqli_query($conexion, $sql);
    if($stm1){
        echo "registra";
    }
    else{
        die(mysqli_error($conexion)." aconing");
    }
    
} else {
    die(mysqli_error($conexion)." aconfin");
}

mysqli_close($conexion);
?>