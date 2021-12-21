<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

//include '../../MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php';

$css = file_get_contents('CSS/Stylos.css');

$pacodcur = $_GET['pacodcur'];
//$pacodcur = 'CUR-000001';

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

/*<!--<link href="/MRFSistem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="CSS/Stylos.css" rel="stylesheet">

<button type="button" id="btn_generar" class="">
<i class="fas fa-download"></i>
    Generar Reporte
</button>

<hr>-->*/




$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
$html = '<div id="imprimir">
        <h3>ESCUELA DE LIDERES - IGLESIA "BERMEJO"</h3>
        <H4>Bermejo - Bolivia</H4>';
$html .= '<table class="table">
        <tr>
            <td colspan="2" class="td">'.$curso['canommat'].''.$curso['caparcur'].'<br>Gestion: '.$curso['cagescur'].'</td>
            <td colspan="8" class="td">Docente: '.$curso['canommie'].' '.$curso['capatmie'].' '.$curso['camatmie'].'</td>
            <td colspan="7" class="td">Fecha: '.$curso['cafecini'].'</td>
            <td colspan="5" class="td" align="center">Nota de Examenes</td>
            <td colspan="5" class="td" align="center">Actividades Evaluativas</td>
        </tr>
        <tr>
            <td>N°</td>
            <td align="center" class="td">Nombres y Apellidos</td>
            <td colspan="15" align="center" class="td">Control de Asistencia</td>
            <td WIDTH="35" class="td">1.E.</td>
            <td WIDTH="35" class="td">2.E.</td>
            <td WIDTH="35" class="td">3.E.</td>
            <td WIDTH="35" class="td">4.E.</td>
            <td WIDTH="35" class="td">5.E.</td>
            <td WIDTH="35" class="td">P.E.</td>
            <td WIDTH="35" class="td">Dev.</td>
            <td WIDTH="35" class="td">E.F.</td>
            <td WIDTH="35" class="td">A.P.</td>
            <td WIDTH="35" class="td">N.F.</td>
        </tr>';



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



$cont=1;

while ($row = mysqli_fetch_array($resultado)) {
    $html.='<tr>
    <td class="td">'.$cont.' </td>
    <td class="td">'.$row['canommie'].' '.$row['capatmie'].' '.$row['camatmie'].'</td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
    <td WIDTH="35" class="td"></td>
</tr>';
   $cont+=1;
}

//$row = mysqli_fetch_array($resultado);
$html .= '</table>';
$html.='<p>P.E.=Promedio Examen &nbsp;&nbsp; Dev.=Devocional 20pts. &nbsp;&nbsp; 
            E.F.=Ejercicios de Formacion 20pts. &nbsp;&nbsp; A.P.=Asistencia y Participacion 10pts. &nbsp;&nbsp;
            N.F.=Nota Final</p>';
$html.='<P align="center"><b>"Y TODO LO QUE HAGAIS, HACEDLO COMO PARA EL SEÑOR"</b></P>
        </div>';
$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();
//echo $html;
?>

<!--<script src="Script/html2pdf.bundle.min.js"></script>
<script src="JSPdf/ControlAsistencia.js"></script>-->