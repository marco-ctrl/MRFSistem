<?php

    include 'Conexion.php';

    /*$cafecenc = '05/02/2010';
    $cafecbau = '26/04/2010';
    $cafecigl = '24/05/2010';
    $cafeccon = '28/06/2011';
    $pacodcre = 'MBR-2';*/

    $cafecenc = $_POST['cafecenc'];
    $cafecbau = $_POST['cafecbau'];
    $cafecigl = $_POST['cafecigl'];
    $cafeccon = $_POST['cafeccon'];
    $pacodcre = $_POST['pacodcre'];

    $sql = "INSERT INTO public.acreesp(
            cafecenc, 
            cafecbau, 
            cafecigl, 
            cafeccon, 
            pacodcre)
            VALUES (
            '{$cafecenc}', 
            '{$cafecbau}', 
            '{$cafecigl}', 
            '{$cafeccon}',
            '{$pacodcre}')";
    
    $stm = pg_query($conexion, $sql);
    if ($stm) {
        echo "registra";
    } else {
        echo "noRegistra";
    }

pg_close($conexion);
?>