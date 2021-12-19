<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodmie = $_POST['pacodmie'];
    $sql = "UPDATE  amiebro SET
        caestmie= false 
        WHERE pacodmie='{$pacodmie}'";
    $stm = mysqli_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        echo 'noModificado';
    }
//}


mysqli_close($conexion);

?>