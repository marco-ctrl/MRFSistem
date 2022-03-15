<?php

include '../Conexion/Conexion.php';

$gestion = $_POST['gestion'];
$materia = $_POST['materia'];
$maestro = $_POST['maestro'];

$condicionGestion='';
$condicionMateria='';
$condicionMaestro='';

if($gestion != '0'){
    $condicionGestion = "and cagescur={$gestion}";
}
else{
    $condicionGestion="";
}
if($materia != '0'){
    $condicionMateria = " and facodcon='{$materia}'";
}
else{
    $condicionMateria="";
}
if($maestro != ''){
    $condicionMaestro = " and facodmae='{$maestro}'";
}
else{
    $condicionMaestro="";
}

$consulta = "SELECT 
cagescur, 
cadescur, 
caestcur, 
cafecini, 
pacodcur, 
facodcon, 
facodmae,
canommat,
canommie,
capatmie,
camatmie,
caparcur,
caestcon
	FROM acursom, 
		aconido, 
		amiebro,
		amaetro
	where facodcon=pacodcon
	and facodmae=pacodmae
    and facodmie=pacodmie
    and caestcur=true
    and caestcon=true
    {$condicionGestion}
    {$condicionMateria}
    {$condicionMaestro}";
        
$resultado = mysqli_query($conexion, $consulta);

$json=array();

while ($row = mysqli_fetch_array($resultado)) {
    $json[] = array('cagescur' => $row['cagescur'],
                    'cadescur' => $row['cadescur'],
                    'caestcur' => $row['caestcur'],
                    'cafecini' => $row['cafecini'],
                    'pacodcur' => $row['pacodcur'],
                    'facodcon' => $row['facodcon'],
                    'facodmae' => $row['facodmae'],
                    'canommat' => $row['canommat'],
                    'canommie' => $row['canommie'],
                    'capatmie' => $row['capatmie'],
                    'camatmie' => $row['camatmie'],
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