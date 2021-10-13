<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodalu = $_POST['pacodalu'];
    $sql = "UPDATE aalumno
	SET  caestalu=false
	WHERE pacodalu='{$pacodalu}';";
    $stm = mysqli_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        echo 'noModificado';
    }
//}


mysqli_close($conexion);

?>