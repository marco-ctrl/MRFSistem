<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $cafunmie = $_POST['cafunmie'];
    $pacodmcl = $_POST['pacodmcl'];
    $facodcel = $_POST['facodcel'];
    $facodmie = $_POST['facodmie'];
    $caestmcl = $_POST['caestmcl'];
    $cacidext = $_POST['cacidext'];

    $sql = "INSERT INTO amiecel(
        cafunmie, 
        pacodmcl, 
        facodcel, 
        facodmie, 
        caestmcl)
        VALUES (
        '{$cafunmie}', 
        '{$pacodmcl}',
        '{$facodcel}', 
        '{$facodmie}', 
        TRUE)";
    $stm = mysqli_query($conexion, $sql);
//}
if ($stm) {
    echo "registra";
} else {
    echo "noRegistra";
}

mysqli_close($conexion);
?>