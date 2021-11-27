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
    
    $sql = "UPDATE `aconfin` SET
        `caestapo`=true,
        `cafecapo`='{$cafecapo}',
        `cahorapo`='{$cahorapo}',
        `facodusu`='{$facodusu}',
        `facodcaj`='{$facodcaj}'
        WHERE `pacodapo`='{$pacodapo}'";

    $stm = mysqli_query($conexion, $sql);
//}


if ($stm) {
    $sql="UPDATE `aconing` SET 
            `camoning`='{$camoning}', 
            `catiping`='{$catiping}', 
            `cafecing`='{$cafecing}'
            WHERE `pacodeco`='{$pacodapo}'";

    $stm1=mysqli_query($conexion, $sql);
    if($stm1){
        echo "modificado";
    }
    else{
        echo "noRegistra";
    }
    
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>