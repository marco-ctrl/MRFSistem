<?php

include '../Conexion/Conexion.php';

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
                    cagescur,
                    caparcur
            FROM amatula a, 
                 aalumno b, 
                 amaetro c, 
                 acursom d, 
                 amiebro e, 
                 aconido f
            where a.facodalu=b.pacodalu
            and d.facodmae=c.pacodmae
            and b.facodmie=e.pacodmie
            and d.facodcon=f.pacodcon
			and e.pacodmie=b.facodmie
			and d.pacodcur=a.facodcur
            and a.caestmat= true
            order by a.pacodmat desc
            limit 15;";

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
                    'cagescur' => $row['cagescur'],
                    'caparcur' => $row['caparcur']
                    );
}
if($json!=null){
    echo json_encode($json);
}
else {
    echo "no encontrado";
}
?>