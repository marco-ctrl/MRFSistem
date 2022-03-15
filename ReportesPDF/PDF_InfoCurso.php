<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

//include '../../MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php';
$css = file_get_contents('CSS/Stylos.css');



$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'letter-L']);
$mpdf -> SetTitle("Informacion de Cursos");
$html = '<div><img src="/MRFSistem/img/Asambleas.svg" class="derecho">
<aside><h3>ASAMBLEAS DE DIOS DE BOLIVIA <br>
            IGLESIA "BERMEJO"<br>
            <u>ESCUELA DE LIDERES</u><BR>
            INFORMACION DE CURSOS</h3></aside></div>
<br><br>';

$gestion = $_GET['gestion'];
$materia = $_GET['materia'];
$maestro = $_GET['maestro'];

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



$html .= '<table class="table" width="100%">
            <tr>
                <th class="td">N°</th>
                <th class="td">MATERIA</th>
                <th class="td">PARALELO</th>
                <th class="td">GESTION</th>
                <th class="td">MAESTRO</th>
                <th class="td">FEC INICIO</th>
                <th class="td">DESCRIPCION</th>
            </tr>';
$cont=1;

while ($row = mysqli_fetch_array($resultado)) {
    $html.='<tr>
    <td class="td">'.$cont.' </td>
    <td class="td">'.$row['canommat'].'</td>
    <td class="td" ALIGN="center">'.$row['caparcur'].'</td>
    <td class="td">'.$row['cagescur'].'</td>
    <td class="td">'.$row['canommie'].' '.$row['capatmie'].' '.$row['camatmie'].'</td>
    <td class="td" ALIGN="right">'.$row['cafecini'].'</td>
    <td class="td">'.$row['cadescur'].'</td>
</tr>';
   $cont+=1;
}

$html.='</table>';

$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();
//echo $html;
