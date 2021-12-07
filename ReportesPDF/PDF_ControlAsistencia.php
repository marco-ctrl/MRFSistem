<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

//include '../../MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php';

$css = file_get_contents('css/Stylos.css');

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


$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
$html = '<h3>ESCUELA DE LIDERES - IGLESIA "BERMEJO"</h3>
        <H4>Bermejo - Bolivia</H4>';
$html .= '<table>
        <tr>
            <td colspan="2">'.$curso['canommat'].''.$curso['caparcur'].'<br>Gestion: '.$curso['cagescur'].'</td>
            <td colspan="8">Docente: '.$curso['canommie'].' '.$curso['capatmie'].' '.$curso['camatmie'].'</td>
            <td colspan="7">Fecha: '.$curso['cafecini'].'</td>
            <td colspan="5" align="center">Nota de Examenes</td>
            <td colspan="5" align="center">Actividades Evaluativas</td>
        </tr>
        <tr>
            <td>N°</td>
            <td align="center">Nombres y Apellidos</td>
            <td colspan="15" align="center">Control de Asistencia</td>
            <td WIDTH="35">1.E.</td>
            <td WIDTH="35">2.E.</td>
            <td WIDTH="35">3.E.</td>
            <td WIDTH="35">4.E.</td>
            <td WIDTH="35">5.E.</td>
            <td WIDTH="35">P.E.</td>
            <td WIDTH="35">Dev.</td>
            <td WIDTH="35">E.F.</td>
            <td WIDTH="35">A.P.</td>
            <td WIDTH="35">N.F.</td>
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
    <td>'.$cont.' </td>
    <td>'.$row['canommie'].' '.$row['capatmie'].' '.$row['camatmie'].'</td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
    <td WIDTH="35"></td>
</tr>';
   $cont+=1;
}

//$row = mysqli_fetch_array($resultado);
$html .= '</table>';
$html.='<p>P.E.=Promedio Examen &nbsp;&nbsp; Dev.=Devocional 20pts. &nbsp;&nbsp; 
            E.F.=Ejercicios de Formacion 20pts. &nbsp;&nbsp; A.P.=Asistencia y Participacion 10pts. &nbsp;&nbsp;
            N.F.=Nota Final</p>';
$html.='<P align="center"><b>"Y TODO LO QUE HAGAIS, HACEDLO COMO PARA EL SEÑOR"</b></P>';
$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();
