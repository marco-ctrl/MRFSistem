<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

//include '../../MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php';
$css = file_get_contents('CSS/Stylos.css');



$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
$html = '<div><img src="/MRFSistem/img/Asambleas.svg" class="derecho">
<aside><h3>ASAMBLEAS DE DIOS DE BOLIVIA <br>
            IGLESIA "BERMEJO"<br>
            <u>INFORME CELULAS ACTIVAS</u></h3></aside></div>
<br><br>';

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie,
cacidmie, 
cadirmie, 
cafecnac, 
canommie, 
pacodmie, 
canomcel,
canumcel,
canombar,
canomcal,
cafunmie,
caestcel,
pacodmcl
FROM amiebro m, acelula, amiecel, abardir, acaldir 
where pacodmie=facodmie
and pacodcel=facodcel
and pacodbar=facodbar
and pacodcal=facodcal
and caestcel=true
and cafunmie='LIDER'
order by cafunmie desc";
$resultado = mysqli_query($conexion, $consulta);



$html .= '<table class="table">
            <tr>
                <td class="td">N°</td>
                <td class="td"><b>NOMBRE</b></td>
                <td class="td">NUMERO</td>
                <td class="td">DIRECCION</td>
                <td class="td">LIDER</td>
                <td class="td">NUMERO CONT.</td>
            </tr>';
$cont=1;

while ($row = mysqli_fetch_array($resultado)) {
    $html.='<tr>
    <td class="td">'.$cont.' </td>
    <td class="td">'.$row['canomcel'].'</td>
    <td class="td">'.$row['canumcel'].'</td>
    <td class="td">/B'.$row['canombar'].' C/'.$row['canomcal'].'</td>
    <td class="td">'.$row['canommie'].' '.$row['capatmie'].' '.$row['camatmie'].'</td>
    <td class="td">'.$row['cacelmie'].'</td>
</tr>';
   $cont+=1;
}

$html.='</table>';

$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();
//echo $html;
