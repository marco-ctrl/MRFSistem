<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

//include '../../MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php';
$css = file_get_contents('CSS/Stylos.css');


$pacodcur = $_GET['pacodcur'];

$sql = "SELECT 
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
caparcur
	FROM acursom, 
		aconido, 
		amiebro,
		amaetro
	where facodcon=pacodcon
	and facodmae=pacodmae
    and facodmie=pacodmie
    and caestcur=true
    and pacodcur='{$pacodcur}'";
$resultado = mysqli_query($conexion, $sql);

$curso = mysqli_fetch_array($resultado);


$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
$html = '<div><img src="/MRFSistem/img/Asambleas.png" class="derecho">
<aside><h3>ASAMBLEAS DE DIOS DE BOLIVIA <br>
            IGLESIA "BERMEJO"<br>
            <u>ESCUELA DE LIDERES</u><br>
<u>CONTROL PAGO DE MENSUALIDADES</u> (gestión '.$curso['cagescur'].' )</h3></aside></div>
<br><br>';

$html.='<p><b>NOMBRE DEL MAESTRO</b>: '.$curso['canommie'].' '.$curso['capatmie'].' '.$curso['camatmie'].'<br>';
$html.='<b>'.$curso['canommat'].' '.$curso['caparcur'].'</b><br>';
$html.='<b>Fecha de Inicio: </b>'.$curso['cafecini'].'</p>';

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
and pacodcur='{$pacodcur}'
and a.caestmat= true
order by a.pacodmat desc";
$resultado = mysqli_query($conexion, $consulta);



$html .= '<table class="table">
            <tr>
                <td class="td">N°</td>
                <td class="td"><b>NOMBRES</b></td>
                <td class="td">ENERO</td>
                <td class="td">FEBRE</td>
                <td class="td">MARZO</td>
                <td class="td">ABRIL</td>
                <td class="td">MAYO</td>
                <td class="td">JUNIO</td>
                <td class="td">JULIO</td>
                <td class="td">AGOST</td>
                <td class="td">SEPTI</td>
                <td class="td">OCTUB</td>
                <td class="td">NOVIE</td>
                <td class="td">DICIE</td>
                <td class="td">&nbsp;Obs.&nbsp;</td>
            </tr>';
$cont=1;

while ($row = mysqli_fetch_array($resultado)) {
    $html.='<tr>
    <td class="td">'.$cont.' </td>
    <td class="td">'.$row['canommie'].' '.$row['capatmie'].' '.$row['camatmie'].'</td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
    <td class="td"></td>
</tr>';
   $cont+=1;
}

//$row = mysqli_fetch_array($resultado);
$html .= '</table>';
$html.='<p>EL PAGO DE LA MENSUALIDAD DEBE REALIZARSE AL INICIO DE CADA MES.
        <BR>
        LA NO CANCELACION IMPEDIRA SU PASO AL SIGUIENTE MODULO.</P><br>';
$html.='<P align="center"><b>"Y TODO LO QUE HAGAIS, HACEDLO COMO PARA EL SEÑOR"</b></P>';

$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();
