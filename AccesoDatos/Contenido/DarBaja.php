<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodcon = $_POST['pacodcon'];
    $sql = "UPDATE  aconido SET
        caestcon= false 
        WHERE pacodcon='{$pacodcon}'";
    $stm = mysqli_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        echo 'noModificado';
    }
//}


mysqli_close($conexion);

?>