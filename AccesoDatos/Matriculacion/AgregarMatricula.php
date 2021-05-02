<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $facodcur=$_POST['facodcur'];
    $facodalu=$_POST['facodalu'];
    $pacodmat=$_POST['pacodmat'];
    $cahormat=$_POST['cahormat'];
    $cafecmat=$_POST['cafecmat'];
    $caestmat=$_POST['caestmat'];
    $facodusu=$_POST['facodusu'];
    
    $sql = "INSERT INTO public.amatula(
        caestmat, 
        cafecmat, 
        cahormat, 
        pacodmat, 
        facodalu, 
        facodcur, 
        facodusu)
        VALUES (
        '{$caestmat}', 
        '{$cafecmat}', 
        '{$cahormat}', 
        '{$pacodmat}', 
        '{$facodalu}', 
        '{$facodcur}', 
        '{$facodusu}')";
    $stm = mysqli_query($conexion, $sql);
//}


if ($stm) {
    
    
        echo "registra";
    
    
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>