<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

//include '../../MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php';
$css = file_get_contents('CSS/Stylos.css');

$pacodusu = $_GET['pacodusu'];
//$buscar = "B";

$consulta ="SELECT usu.caconusu, 
catipusu, 
canomusu, 
pacodusu, 
facodmie, 
caestusu,
canommie,
capatmie,
camatmie,
cacelmie,
caurlfot
    FROM ausurio usu, 
         amiebro mbr 
    WHERE 
        mbr.pacodmie=usu.facodmie
    and usu.caestusu=true 
    and usu.pacodusu='{$pacodusu}'";
$resultado = mysqli_query($conexion, $consulta);
//$row = mysqli_fetch_array($resultado);

$row = mysqli_fetch_array($resultado);

$urlFoto = '';
if ($row['caurlfot'] != ''){
    $urlFoto = $row['caurlfot'];
}
else {
    $urlFoto = '/MRFSistem/img/user.svg';
}


$mpdf = new \Mpdf\Mpdf(['format' => 'letter']);

$html = '<table  width="100%">
<tr>
    <td ALIGN="left"><img src="/MRFSistem/img/Asambleas.svg" class="izquierdo"></td>
    <td ALIGN="center"><h3><b>ASAMBLEAS DE DIOS DE BOLIVIA
        <br>IGLESIA "BERMEJO"
        <br><u>FICHA DE DATOS DE USUARIO</u><b></h3></td>
    <td ALIGN="right"><img src="'.$urlFoto.'" class="derecho"></td>
<tr>
</table><br>';
$html.='<p class="interlineado"><b><u>DATOS DE USUARIO</u></b>
<BR>';
$html.='Nombre Completo: '.$row['canommie'].' '.$row['capatmie'].' '.$row['camatmie'].'<br>';
$html.='Telefonos de Contacto: '.$row['cacelmie'].'<br>';
$html.='Rol de Usuario: '.$row['catipusu'].'<br>';
$html.='Usuario: '.$row['canomusu'].'<p>';


$html.='<p align="right">BERMEJO,'.date("y-m-d").'&nbsp;&nbsp;&nbsp;&nbsp;</p><br><br><br><br>';


$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();

