<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $pacodcur = $_POST['pacodcur'];
    $sql = "UPDATE acursom
	SET caestcur='false' 
	WHERE pacodcur='{$pacodcur}'";
    $stm = pg_query($conexion, $sql);
//}
if ($stm) {
    echo "baja";
} else {
    echo "noRegistra";
}

pg_close($conexion);
?>