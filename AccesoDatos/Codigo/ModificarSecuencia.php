<?php
    
    include '../Conexion/Conexion.php';

    //echo "hola mundo" ;
    if(isset($_POST['codigo']) && isset($_POST['correlativo'])){
        $codigo=$_POST['codigo'];
        $correlativo=$_POST['correlativo'];

        //$codigo="MBR";
        //$correlativo="26";

        $sql="UPDATE num_correlativo
                SET correlativo='{$correlativo}'
                WHERE codigo='{$codigo}'";
        
        $stm= mysqli_query($conexion, $sql);

        if ($stm) {
            echo "registra codigo";
        } else {
            echo "noModifica codigo ". mysqli_result_error($conexion);
        }

        mysqli_close($conexion);
    }

?>