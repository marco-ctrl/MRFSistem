<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

$buscar = $_GET['buscar'];
$condicion = $_GET['condicion'];
$where = '';

if ($buscar=='' and $condicion==''){
    $where='';
}
else{
    $where="and {$condicion} like '%{$buscar}%'";
    //echo ($where);
}
//$buscar = "DISCIPULO/A";
//$condicion = "cafunmie";

$filtrar = "";

if($condicion=="cafunmie"){
    $filtrar = "Filtrado por FUNCION EN LA CELULA"; 
}

if($condicion=="pacodpro"){
    $filtrar = "Filtrado por PROFESION"; 
}

if($condicion=="pacodcel"){
    $filtrar = "Filtrado por CELULA"; 
}

$css = file_get_contents('CSS/Stylos.css');


$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
$html = '<div><img src="/MRFSistem/img/Asambleas.svg" class="derecho">
<aside><h3>ASAMBLEAS DE DIOS DE BOLIVIA <br>
            IGLESIA "BERMEJO"<br>
<u>INFORMACION DE MIEMBROS DE LA IGLESIA</u><br>
    '.$filtrar.'</h3></aside></div>';

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie,
cacidext, 
cadirmie, 
caestmie, 
ceestciv, 
cafecnac, 
cafotmie, 
canommie, 
pacodmie, 
facodciu, 
facodpro,
pacodpro,
canompro,
pacodciu,
canomciu,
canomcel,
cafunmie,
pacodcel
FROM amiebro m, aproion p, aciudad c, amiecel, acelula
where m.facodpro=p.pacodpro
and m.caestmie=true 
and m.facodciu=c.pacodciu
and facodcel=pacodcel
and facodmie=pacodmie
{$where}
order by pacodmie desc ";
$resultado = mysqli_query($conexion, $consulta);

$html .= '<table class="table">
            <tr>
                <td class="td">N°</td>
                <td class="td">CARNET IDENTIDAD</td>
                <td class="td">NOMBRE</td>
                <td class="td">APELLIDOS</td>
                <td class="td">NUMERO CONTACTO</td>
                <td class="td">PROFESION</td>
                <td class="td">CELULA</td>
                <td class="td">FUNCION</td>
            </tr>';
$cont=1;

while ($row = mysqli_fetch_array($resultado)) {
    $html.='<tr>
    <td class="td">'.$cont.' </td>
    <td class="td">'.$row['cacidmie'].$row['cacidext'].'</td>
    <td class="td">'.$row['canommie'].'</td>
    <td class="td">'.$row['capatmie'].' '.$row['camatmie'].'</td>
    <td class="td">'.$row['cacelmie'].'</td>
    <td class="td">'.$row['canompro'].'</td>
    <td class="td">'.$row['canomcel'].'</td>
    <td class="td">'.$row['cafunmie'].'</td>
</tr>';
   $cont+=1;
}

//$row = mysqli_fetch_array($resultado);
$html .= '</table>';

$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();
