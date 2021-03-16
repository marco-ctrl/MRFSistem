<?php

include '../Conexion/Conexion.php';


//if (isset($_POST["pacodusu"]) && isset($_POST["facodmie"]) && isset($_POST["canomusu"])) {
    $facodcur=$_POST['facodcur'];
    $facodalu=$_POST['facodalu'];
    $pacodmat=$_POST['pacodmat'];
    $cahormat=$_POST['cahormat'];
    $cafecmat=$_POST['cafecmat'];
    //$caestmat=$_POST['caestmat'];
    $facodusu=$_POST['facodusu'];
    
    $sql = "UPDATE amatula
	SET cafecmat='{$cafecmat}', 
        cahormat='{$cahormat}', 
        facodalu='{$facodalu}', 
        facodcur='{$facodcur}', 
        facodusu='{$facodusu}'
	WHERE pacodmat='{$pacodmat}'";
    $stm = pg_query($conexion, $sql);
//}
if ($stm) {
    echo "modificado";
} else {
    echo "noRegistra";
}

pg_close($conexion);
?>