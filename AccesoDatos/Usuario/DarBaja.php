<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodusu = $_POST['pacodusu'];
    $sql = "UPDATE  ausurio SET
        caestusu= false 
        WHERE pacodusu='{$pacodusu}'";
    $stm = mysqli_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        echo 'noModificado';
    }
//}


mysqli_close($conexion);

?>