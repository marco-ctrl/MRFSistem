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
    $sql="UPDATE `aconegr` SET 
            `camonegr`='{$camonegr}', 
            `cadesegr`='{$cadesegr}', 
            `cafecegr`='{$cafecegr}'
            WHERE `pacodegr`='{$pacodapo}'";

    $stm1=mysqli_query($conexion, $sql);
    if($stm1){
        echo "modificado";
        
    }
    else{
        //echo "noRegistra";
        die(mysqli_error($conexion));
    }
    
} else {
    //echo "noRegistra";
    die(mysqli_error($conexion));
}

mysqli_close($conexion);
?>