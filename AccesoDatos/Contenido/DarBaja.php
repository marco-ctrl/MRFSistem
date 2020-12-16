<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodcon = $_POST['pacodcon'];
    $sql = "UPDATE  aconido SET
        caestcon='false' 
        WHERE pacodcon='{$pacodcon}'";
    $stm = pg_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        echo 'noModificado';
    }
//}


pg_close($conexion);

?>