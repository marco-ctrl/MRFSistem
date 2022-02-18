<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

$buscar = $_GET['buscar'];

$filtrar = '';

$css = file_get_contents('CSS/Stylos.css');


$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
$html = '<div><img src="/MRFSistem/img/Asambleas.svg" class="derecho">
<aside><h3>ASAMBLEAS DE DIOS DE BOLIVIA <br>
            IGLESIA "BERMEJO"<br>
<u>INFORMACION DE USUARIOS DEL SISTEMA</u><br>
    ' . $filtrar . '</h3></aside></div>';

$consulta = "SELECT usu.caconusu, 
    usu.catipusu, 
    usu.canomusu, 
    usu.pacodusu, 
    usu.facodmie, 
    usu.caestusu,
    mbr.canommie,
    mbr.capatmie,
    mbr.camatmie,
    mbr.caurlfot
        FROM ausurio usu, 
             amiebro mbr 
        WHERE 
            mbr.pacodmie=usu.facodmie
        and usu.caestusu=true 
        and usu.catipusu like '%{$buscar}%'";
$resultado = mysqli_query($conexion, $consulta);

$html .= '<table width="100%" class="table">
            <tr>
                <th class="td">N°</th>
                <th class="td">MIEMBRO</th>
                <th class="td">ROL</th>
                <th class="td">USUARIO</th>
                <th class="td">FOTO</th>
            </tr>';
$cont = 1;

while ($row = mysqli_fetch_array($resultado)) {
    $urlFoto = '';
    if ($row['caurlfot'] != '') {
        $urlFoto = $row['caurlfot'];
    } else {
        $urlFoto = '/MRFSistem/img/user.svg';
    }
    $html .= '<tr>
    <td class="td">' . $cont . ' </td>
    <td class="td">' . $row['canommie'] . ' ' . $row['capatmie'] . ' ' . $row['camatmie'] . '</td>
    <td class="td">' . $row['catipusu'] . '</td>
    <td class="td">' . $row['canomusu'] . '</td>
    <td class="td"><img src="' . $urlFoto . '" class="foto"></td>
    </tr>';
    $cont += 1;
}

//$row = mysqli_fetch_array($resultado);
$html .= '</table>';

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();
//echo $html;