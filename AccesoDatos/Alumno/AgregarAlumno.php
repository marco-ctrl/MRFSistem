<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $caestalu = $_POST['caestalu'];
    $pacodalu = $_POST['pacodalu'];
    $facodmie = $_POST['facodmie'];
    
    $sql = "INSERT INTO alumno(
        facodmie, 
        caestalu, 
        pacodalu)
        VALUES (
        '{$facodmie}',
        '{$caestalu}',
        '{$pacodalu}');";
    $stm = mysqli_query($conexion, $sql);
//}


if ($stm) {
    $sql="UPDATE public.amiebro
            SET cabanalu='true'
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