<?php

include 'Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodusu = $_POST['pacodusu'];
    $sql = "UPDATE  ausurio SET
        caestusu='false' 
        WHERE pacodusu='{$pacodusu}'";
    $stm = pg_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        echo 'noModificado';
    }
//}


pg_close($conexion);

?>