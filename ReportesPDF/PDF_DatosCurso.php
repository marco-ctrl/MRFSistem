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


$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter-P']);
$html = '<div id="imprimir">
        <h3>ESCUELA DE LIDERES - IGLESIA "BERMEJO"</h3>
        <H4>Bermejo - Bolivia</H4>';
$html .= '<p class="interlineado">'.$curso['canommat'].''.$curso['caparcur'].'<br>
            Maestro: '.$curso['canommie'].' '.$curso['capatmie'].' '.$curso['camatmie'].'<br>
            Fecha Inicio: '.$curso['cafecini'].'<br>
            Alumnos:</p>
        <table class="table" width="100%">
        <tr>
            <th class="th">N°</th>
            <th class="th">Nombres y Apellidos</th>
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
            $html .= '<tr>
            <td class="td">'.$cont.'</td>
            <td class="td">'.$row['canommie'].' '.$row['capatmie'].' '.$row['camatmie'].'</td>
        </tr>';
        $cont+=1;
        }
        $html .='</table>';

//$row = mysqli_fetch_array($resultado);
$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();
//echo $html;
?>

<!--<script src="Script/html2pdf.bundle.min.js"></script>
<script src="JSPdf/ControlAsistencia.js"></script>-->