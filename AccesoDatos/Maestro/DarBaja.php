<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodmae = $_POST['pacodmae'];
    $sql = "UPDATE public.amaetro
	SET  caestmae='false'
	WHERE pacodmae='{$pacodmae}';";
    $stm = pg_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        echo 'noModificado';
    }
//}


pg_close($conexion);

?>