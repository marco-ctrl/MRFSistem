<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $caestmae = $_POST['caestmae'];
    $pacodmae = $_POST['pacodmae'];
    $facodmie = $_POST['facodmie'];
    
    $sql = "INSERT INTO amaetro(
        facodmie, 
        pacodmae, 
        caestmae)
        VALUES (
        '{$facodmie}', 
        '{$pacodmae}', 
        true);";
    $stm = mysqli_query($conexion, $sql);
//}


if ($stm) {
    $sql="UPDATE amiebro
            SET cabanmae=true
            WHERE pacodmie='{$facodmie}'";

    $stm1=mysqli_query($conexion, $sql);
    if($stm1){
        echo "registra";
    }
    else{
        echo "noRegistra";
    }
    
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>