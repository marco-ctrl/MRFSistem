<?php 
    include '../Conexion/Conexion.php';

    if(isset($_POST['codigo']) && isset($_POST['correlativo'])){
        $codigo=$_POST['codigo'];
        $correlativo=$_POST['correlativo'];

        $sql="INSERT INTO num_correlativo(
            codigo, correlativo)
            VALUES ('{$codigo}', '{$correlativo}')";
        
        $stm= mysqli_query($conexion, $sql);

        if ($stm) {
            echo "registra codigo";
        } else {
            die ("noRegistra codigo ". mysqli_result_error($conexion));
        }

        mysqli_close($conexion);
    }

?>