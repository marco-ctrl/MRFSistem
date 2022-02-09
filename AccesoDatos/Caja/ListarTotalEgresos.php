<?php

include '../Conexion/Conexion.php';

$pacodcaj = $_POST['codCaja'];
//$pacodcaj="CAJ-000001";

$consulta = "SELECT `cadesegr`, format(SUM(`camonegr`), 2) as catotegr 
FROM `aconegr`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconegr.pacodegr
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
GROUP BY cadesegr
order by cadesegr desc";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('cadesegr' => $row['cadesegr'],
                    'catotegr' => $row['catotegr']
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