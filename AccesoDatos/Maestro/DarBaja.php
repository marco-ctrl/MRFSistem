<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodmae = $_POST['pacodmae'];
    $sql = "UPDATE amaetro
	SET  caestmae=false
	WHERE pacodmae='{$pacodmae}';";
    $stm = mysqli_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        echo 'noModificado';
    }
//}


mysqli_close($conexion);

?>