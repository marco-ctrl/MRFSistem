<?php

include '../Conexion/Conexion.php';

$pacodmcl=$_POST['pacodmcl'];
$facodcel=$_POST['facodcel'];

//if (isset($_POST["pacodmie"]) && isset($_POST["canommie"]) && isset($_POST["cacidmie"])) {

$sql = "UPDATE amiecel set 
            cafunmie='LIDER',
            facodcel='{$facodcel}'
            WHERE pacodmcl='{$pacodmcl}'";
$stm1 = mysqli_query($conexion, $sql);
if ($stm1) {
    echo "modificado";
} else {
    die(mysqli_error($conexion));
}



mysqli_close($conexion);

//} else {
    //echo $_POST['cafecnac'];
//}
