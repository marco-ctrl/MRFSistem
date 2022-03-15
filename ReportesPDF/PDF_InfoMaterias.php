<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

$css = file_get_contents('CSS/Stylos.css');


$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
$html = '<div><img src="/MRFSistem/img/Asambleas.svg" class="derecho">
<aside><h3>ASAMBLEAS DE DIOS DE BOLIVIA <br>
            IGLESIA "BERMEJO"<br>
<u>ESCUELA DE LIDERES</u><br>
INFORMACION DE MATERIAS<br>
</h3></aside></div>';

$consulta = "SELECT 
            cadescon, 
            caestcon, 
            canommat, 
            pacodcon
            FROM 
            aconido
            WHERE caestcon= true";
$resultado = mysqli_query($conexion, $consulta);

$html .= '<table width="100%" class="table">
            <tr>
                <th class="td">N°</th>
                <th class="td">CODIGO</th>
                <th class="td">MATERIA</th>
                <th class="td">DESCRIPCION</th>
            </tr>';
$cont = 1;

while ($row = mysqli_fetch_array($resultado)) {
    $html .= '<tr>
    <td class="td">' . $cont . ' </td>
    <td class="td">' . $row['pacodcon'] .'</td>
    <td class="td">' . $row['canommat'] . '</td>
    <td class="td">' . $row['cadescon'] . '</td>
    </tr>';
    $cont += 1;
}

//$row = mysqli_fetch_array($resultado);
$html .= '</table>';

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();
//echo $html;