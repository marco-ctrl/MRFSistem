<?php

include '../Conexion/Conexion.php';

$pacodcaj = $_POST['codCaja'];

$consulta = "SELECT `catiping`, format(SUM(`camoning`), 2) as catoting 
FROM `aconing`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconing.pacodeco
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
GROUP BY aconing.catiping";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('catiping' => $row['catiping'],
                    'catoting' => $row['catoting']
                    );
}
if ($json==null){
    echo 'false';
}
else{
    echo json_encode($json);
}
mysqli_close($conexion);
?>