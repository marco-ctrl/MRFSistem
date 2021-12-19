<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $caestcon = true;
    $canommat = $_POST['canommat'];
    $pacodcon = $_POST['pacodcon'];
    $cadescon = $_POST['cadescon'];

    $sql = "UPDATE aconido SET 
	    cadescon='{$cadescon}', 
        caestcon= true, 
        canommat='{$canommat}'
    WHERE pacodcon='{$pacodcon}'";
    
    $stm = mysqli_query($conexion, $sql);
//}
if ($stm) {
    echo "modificado";
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>