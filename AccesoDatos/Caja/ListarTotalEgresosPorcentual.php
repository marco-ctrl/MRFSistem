<?php

include '../Conexion/Conexion.php';

$pacodcaj = $_POST['codCaja'];
//$pacodcaj="CAJ-000001";

$consulta = "SELECT cadesefe, 
round(cacanefe, 0) as cacanefe, 
format((SUM(camoning)/100)*cacanefe, 2) as total
FROM aegrefij, aconing, aconfin, aarqcaj
WHERE catipcan='PORCENTUAL'
and aconing.pacodeco=aconfin.pacodapo
AND aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
and aegrefij.caestefe=1
GROUP BY cadesefe";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('cadesefe' => $row['cadesefe'],
                    'cacanefe' => $row['cacanefe'],
                    'total' => $row['total']
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