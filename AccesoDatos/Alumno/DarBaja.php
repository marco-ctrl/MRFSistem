<?php

include '../Conexion/Conexion.php';

//if (isset($_POST["pacodmie"])) {
    $pacodalu = $_POST['pacodalu'];
    $sql = "UPDATE public.alumno
	SET  caestalu='false'
	WHERE pacodalu='{$pacodalu}';";
    $stm = pg_query($conexion, $sql);
    
    if ($stm) {
        echo 'baja';
    } else {
        echo 'noModificado';
    }
//}


pg_close($conexion);

?>