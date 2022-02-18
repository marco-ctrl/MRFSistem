<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

//include '../../MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php';
$css = file_get_contents('CSS/Stylos.css');

$pacodmie=$_GET['pacodmie'];

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie, 
cadirmie, 
caestmie, 
ceestciv, 
cafecnac, 
caurlfot, 
canommie, 
pacodmie, 
facodciu, 
facodpro,
pacodpro,
canompro,
pacodciu,
canomciu,
canomcel,
canumcel,
cafunmie,
pacodcel,
cafecenc, 
cafecbau, 
cafecigl, 
cafeccon
FROM amiebro m, aproion p, aciudad c, acelula e, amiecel f 
where m.facodpro=p.pacodpro 
and m.facodciu=c.pacodciu
and m.pacodmie=f.facodmie
and e.pacodcel=f.facodcel
and m.pacodmie='{$pacodmie}'
order by pacodmie desc LIMIT 15";
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
        <br><u>FICHA DE DATOS DE MIEMBRO</u><b></h3></td>
    <td ALIGN="right"><img src="'.$urlFoto.'" class="derecho"></td>
<tr>
</table><br>';
$html.='<p class="interlineado"><b><u>DATOS PERSONALES</u></b>
<BR>';
$html.='Nombre Completo: '.$row['canommie'].' '.$row['capatmie'].' '.$row['camatmie'].'<br>';
$html.='Direccion: '.$row['cadirmie'].'<br>';
$html.='Telefonos de Contacto: '.$row['cacelmie'].'<br>';
$html.='Fecha y lugar de Nacimiento: '.$row['cafecnac'].'-'.$row['canomciu'].'<br>';
$html.='Estado Civil: '.$row['ceestciv'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Carnet de Identidad N. '.$row['cacidmie'].'<br>';
$html.='Profesion: '.$row['canompro'].'</p>';

$html.='<p class="interlineado"><b><u>DATOS DE LA CELULA</u></b><br>';
$html.='Nombre de su Celula: '.$row['canomcel'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N. '.$row['canumcel'].'<br>';

$lid=$row['pacodcel'];
//echo $lid;

$sql="SELECT cafunmie, 
             pacodmcl, 
             facodcel, 
             facodmie, 
             caestmcl, 
             canommie, 
             capatmie, 
             camatmie, 
             pacodmie, 
             canomcel, 
             pacodcel
FROM amiecel, amiebro, acelula 
where cafunmie='LIDER' 
AND facodcel='{$lid}'
and pacodcel=facodcel
and pacodmie=facodmie";

$lider = mysqli_query($conexion, $sql);

$lid = mysqli_fetch_array($lider);

$html.='Nombre del/la Lider: '.$lid['canommie'].' '.$lid['capatmie'].' '.$lid['camatmie'].'<br>';
$html.='Funcion en la Celula: '.$row['cafunmie'].'<br><br>';

$html.='<b><u>CRECIMIENTO ESPIRITUAL</u></b><br>';
$html.='Fecha de Conversion: '.$row['cafeccon'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fecha de Bautismo: '.$row['cafecbau'].'<br>';
$html.='Entrada a la Iglesia: '.$row['cafecigl'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Encuentro con DIOS: '.$row['cafecenc'].'<p><br><BR><br>';
$html.='<p align="right">BERMEJO,'.date("y-m-d").'&nbsp;&nbsp;&nbsp;&nbsp;</p><br><br><br><br>';


$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();

