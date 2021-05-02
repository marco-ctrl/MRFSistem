<?php

include '../Conexion/Conexion.php';

$buscar=$_POST['buscar'];

$consulta = "SELECT caestmat, 
                    cafecmat, 
                    cahormat, 
                    pacodmat, 
                    facodalu, 
                    facodcur, 
                    facodusu, 
                    canommie, 
                    capatmie, 
                    camatmie, 
                    canommat,
                    cagescur
            FROM amatula a, 
                 alumno b, 
                 amaetro c, 
                 acursom d, 
                 amiebro e, 
                 aconido f
            where a.facodalu=b.pacodalu
            and d.facodmae=c.pacodmae
            and b.facodmie=e.pacodmie
            and d.facodcon=f.pacodcon
            and a.caestmat='true'
            and e.canommie like '%{$buscar}%'
            order by a.pacodmat desc
            limit 15";

$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('cafecmat' => $row['cafecmat'],
                    'cahormat' => $row['cahormat'],
                    'pacodmat' => $row['pacodmat'],
                    'facodalu' => $row['facodalu'],
                    'facodcur' => $row['facodcur'],
                    'facodusu' => $row['facodusu'],
                    'canommat' => $row['canommat'],
                    'canommie' => $row['canommie'],
                    'capatmie' => $row['capatmie'],
                    'camatmie' => $row['camatmie'],
                    'cagescur' => $row['cagescur']
                    );
}
if($json!=null){
    echo json_encode($json);
}
else {
    echo "no encontrado";
}
?>