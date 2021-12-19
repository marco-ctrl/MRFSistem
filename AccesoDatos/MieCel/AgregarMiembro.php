<?php

include '../Conexion/Conexion.php';

if (isset($_POST["pacodmie"]) && isset($_POST["canommie"]) && isset($_POST["cacidmie"])) {
    $pacodmie = $_POST['pacodmie'];
    $canommie = $_POST['canommie'];
    $cacidmie = $_POST['cacidmie'];
    $capatmie = $_POST['capatmie'];
    $camatmie = $_POST['camatmie'];
    $cadirmie = $_POST['cadirmie'];
    $cacelmie = $_POST['cacelmie'];
    $cafecnac = $_POST['cafecnac'];
    
    $sql = "INSERT INTO `mrfbermejobd`.`amiebro`
    (`camatmie`,
    `capatmie`,
    `cacelmie`,
    `cacidmie`,
    `cadirmie`,
    `caestmie`,
    `cafecnac`,
    `canommie`,
    `pacodmie`,
        `cabanmae`,
        `cabanalu`)
        VALUES (
        '{$camatmie}',
        '{$capatmie}',
        '{$cacelmie}',
        '{$cacidmie}',
        '{$cadirmie}',
        false,
        '{$cafecnac}',
        '{$canommie}',
        '{$pacodmie}',
        false,
        false);";
    $stm = mysqli_query($conexion, $sql);

    if ($stm) {
        echo "registra";
    } else {
        die(mysqli_error($conexion));
    }

    mysqli_close($conexion);

} else {
    echo $_POST['cafecnac'];
}
