<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $caestcel = true;
    $canomcel = $_POST['canomcel'];
    $canumcel = $_POST['canumcel'];
    $pacodcel = $_POST['pacodcel'];
    $facodbar = $_POST['facodbar'];
    $facodcal = $_POST['facodcal'];
    $calatcel = $_POST['calatcel'];
    $calogcel = $_POST['calogcel'];

    $sql = "UPDATE acelula SET 
	caestcel='{$caestcel}', 
	canomcel='{$canomcel}', 
	canumcel='{$canumcel}', 
	facodbar='{$facodbar}', 
	facodcal='{$facodcal}', 
	calatcel='{$calatcel}', 
	calogcel='{$calogcel}'
    WHERE pacodcel='{$pacodcel}'";
    
    $stm = mysqli_query($conexion, $sql);
//}
if ($stm) {
    echo "modificado";
} else {
    //echo "noRegistra";
    die (mysqli_error($conexion));
}

mysqli_close($conexion);
?>