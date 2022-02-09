<?php

include '../Conexion/Conexion.php';

if (isset($_POST["pacodmie"]) && isset($_POST["canommie"]) && isset($_POST["cacidmie"])) {
    $pacodmie = $_POST['pacodmie'];
    $canommie = $_POST['canommie'];
    $cacidmie = $_POST['cacidmie'];
    $cacidext = $_POST['cacidext'];
    $capatmie = $_POST['capatmie'];
    $camatmie = $_POST['camatmie'];
    $cadirmie = $_POST['cadirmie'];
    $cacelmie = $_POST['cacelmie'];
    $cafecnac = $_POST['cafecnac'];
    //datos de tabla Miembro-Celula
    $cafunmie = $_POST['cafunmie'];
    $pacodmcl = $_POST['pacodmcl'];
    $facodcel = $_POST['facodcel'];
    $facodmie = $_POST['facodmie'];
    $caestmcl = $_POST['caestmcl'];
    
    $sql = "UPDATE amiebro set
    camatmie='{$camatmie}',
    capatmie='{$capatmie}',
    cacelmie='{$cacelmie}',
    cacidmie='{$cacidmie}',
    cacidext='{$cacidext}',
    cadirmie='{$cadirmie}',
    caestmie=false,
    cafecnac='{$cafecnac}',
    canommie='{$canommie}',
    cabanmae=false,
    cabanalu=false
        WHERE pacodmie='{$pacodmie}'";
    $stm = mysqli_query($conexion, $sql);

    if ($stm) {
        $sql = "UPDATE amiecel set 
            cafunmie='{$cafunmie}', 
            facodcel='{$facodcel}', 
            facodmie='{$facodmie}', 
            caestmcl=TRUE
            WHERE pacodmcl='{$pacodmcl}'";
        $stm1 = mysqli_query($conexion, $sql);
        if($stm1){
            echo "modificado";
        }
        else{
            die(mysqli_error($conexion));
        }
        
    } else {
        die(mysqli_error($conexion));
    }

    mysqli_close($conexion);

} else {
    echo $_POST['cafecnac'];
}
