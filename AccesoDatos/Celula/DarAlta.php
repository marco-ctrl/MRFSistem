<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodcel = $_POST['pacodcel'];
    $sql = "UPDATE  acelula SET
        caestcel=true 
        WHERE pacodcel='{$pacodcel}'";
    $stm = mysqli_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        //echo "noRegistra";
    die (mysqli_error($conexion));
    }
//}


mysqli_close($conexion);

?>