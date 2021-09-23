<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $pacodusu = $_POST['pacodusu'];
    $facodmie = $_POST['facodmie'];
    $canomusu = $_POST['canomusu'];
    $caconusu = $_POST['caconusu'];
    $catipusu = $_POST['catipusu'];
    $caestusu = $_POST['caestusu'];

    /*$pacodusu = "USU-1";
    $facodmie = "MBR-1";
    $canomusu = "marck45";
    $caconusu = "1234";
    $catipusu = "ADMINISTRADOR";
    $caestusu = true;*/
    
    $sql = "UPDATE ausurio
	SET caconusu='{$caconusu}', 
		catipusu='{$catipusu}', 
		canomusu='{$canomusu}', 
		facodmie='{$facodmie}', 
		caestusu=true
	WHERE pacodusu='{$pacodusu}'";
    
    $stm = mysqli_query($conexion, $sql);
//}
if ($stm) {
    echo "modificado";
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>