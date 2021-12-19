<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $pacodapo = $_POST['pacodapo'];
    
    $sql = "UPDATE `aconfin` SET
        `caestapo`=false,
        WHERE `pacodapo`='{$pacodapo}'";

    $stm = mysqli_query($conexion, $sql);
//}


if ($stm) {
    
    echo "baja";
    
    
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>