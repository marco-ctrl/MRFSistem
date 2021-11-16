<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $pacodefe = $_POST['pacodefe'];
    
    $sql = "UPDATE `aegrefij` SET
    `caestefe`=false
    WHERE `pacodefe`='{$pacodefe}'";

    $stm = mysqli_query($conexion, $sql);
//}


if ($stm) {
    
    echo "baja";
    
    
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>