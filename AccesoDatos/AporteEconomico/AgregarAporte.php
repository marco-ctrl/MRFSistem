<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $caestapo = true;
    $cafecapo = $_POST['cafecapo'];
    $cahorapo = $_POST['cahorapo'];
    $pacodapo = $_POST['pacodapo'];
    $facodusu = $_POST['facodusu'];
    $camontot = $_POST['camontot'];
    
    $sql = "INSERT INTO public.aapotes(
        caestapo, 
        cafecapo, 
        cahorapo, 
        pacodapo, 
        facodusu)
        VALUES ('{$caestapo}', 
                '{$cafecapo}', 
                '{$cahorapo}', 
                '{$pacodapo}', 
                '{$facodusu}');";
    $stm = pg_query($conexion, $sql);
//}


if ($stm) {
    $sql="INSERT INTO public.aapoeco(
        camontot, 
        pacodeco)
        VALUES ('{$camontot}', 
                '{$pacodapo}');";

    $stm1=pg_query($conexion, $sql);
    if($stm1){
        echo "registra";
    }
    else{
        echo "noRegistra";
    }
    
} else {
    echo "noRegistra";
}

pg_close($conexion);
?>