<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $facodcon = $_POST['facodcon'];
    $facodmae = $_POST['facodmae'];
    $pacodcur = $_POST['pacodcur'];
    $cagescur = $_POST['cagescur'];
    $cafecini = $_POST['cafecini'];
    $caestcur = $_POST['caestcur'];
    $cadescur = $_POST['cadescur'];
    
    $sql = "UPDATE acursom
	SET cagescur='{$cagescur}', 
		cadescur='{$cadescur}', 
		caestcur={$caestcur}, 
		cafecini='{$cafecini}', 
		facodcon='{$facodcon}', 
		facodmae='{$facodmae}'
	WHERE pacodcur='{$pacodcur}'";
    $stm = mysqli_query($conexion, $sql);
//}
if ($stm) {
    echo "modificado";
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>