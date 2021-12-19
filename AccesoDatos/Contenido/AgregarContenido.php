<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $caestcon = true;
    $canommat = $_POST['canommat'];
    $pacodcon = $_POST['pacodcon'];
    $cadescon = $_POST['cadescon'];

    $sql = "INSERT INTO aconido(
        cadescon, 
        caestcon, 
        canommat, 
        pacodcon)
        VALUES (
        '{$cadescon}', 
        '{$caestcon}', 
        '{$canommat}', 
        '{$pacodcon}');";
    $stm = mysqli_query($conexion, $sql);
//}
if ($stm) {
    echo "registra";
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>