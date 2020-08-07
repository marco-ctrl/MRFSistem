<?php 
    include 'Conexion.php';

    if(isset($_POST['codigo']) && isset($_POST['correlativo'])){
        $codigo=$_POST['codigo'];
        $correlativo=$_POST['correlativo'];

        $sql="INSERT INTO num_correlativo(
            codigo, correlativo)
            VALUES ('{$codigo}', '{$correlativo}')";
        
        $stm= pg_query($conexion, $sql);

        if ($stm) {
            echo "registra codigo";
        } else {
            die ("noRegistra codigo ". pg_result_error($conexion));
        }

        pg_close($conexion);
    }

?>