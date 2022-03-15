<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

$pacodcaj=$_GET['pacodcaj'];
$mes='';

$consulta = "SELECT DATE_FORMAT(`cafincaj`, '%m') as mes, DATE_FORMAT(`cafincaj`, '%Y') as anio
FROM aarqcaj WHERE `pacodcaj`='{$pacodcaj}'";

$resultado = mysqli_query($conexion, $consulta);
$row=mysqli_fetch_array($resultado);
$anio=$row['anio'];
//$mes=$row[]

$mes1=asignarMes($row, $mes);



$css = file_get_contents('CSS/Stylos.css');

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
$mpdf->SetTitle('Informe Economico Mensual');

$html='<P CLASS="western" ALIGN=CENTER>
<FONT FACE="Calibri, serif"><B>LAS ASAMBLEAS DE DIOS DE BOLIVIA</B></FONT></P>
<P CLASS="western" ALIGN=CENTER>
<FONT FACE="Calibri, serif">R.S. 101452/62 P.J.21565/95</FONT></P>
<P CLASS="western" ALIGN=CENTER>
<FONT FACE="Calibri, serif">Filial Distrital Tarija- Región 2
Provincia Arce</FONT></P>
<P CLASS="western" ALIGN=CENTER>
<FONT FACE="Calibri, serif"><U><B>INFORME ECONOMICO DEL MES DE </B></U></FONT><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><U><B>
'.$mes1.' '.$anio.'</B></U></FONT></FONT></P>
<P CLASS="western" ALIGN=CENTER>
 <FONT FACE="Calibri, serif">(Expresado en bolivianos)</FONT></P>
<P CLASS="western" STYLE="margin-bottom: 0in">
</P>';

$totIngresos=0;
//LISTAR TOTAL INGRESOS
$html.='<P CLASS="western" ALIGN=left>
<FONT FACE="Calibri, serif"><B>INGRESOS</B></FONT></P>';


$consulta = "SELECT catiping, SUM(`camoning`) as catoting 
FROM `aconing`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconing.pacodeco
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
GROUP BY catiping";

$resultado = mysqli_query($conexion, $consulta);

$htmlItem='';
$htmlIngreso='';
$htmlTotalIngresos='';

while ($row = mysqli_fetch_array($resultado)) {
    $htmlItem.='<br>'.$row['catiping'];
    $htmlIngreso.='<br>'.$row['catoting'];
    $totIngresos=$totIngresos+$row['catoting'];
    $htmlTotalIngresos.='<br>';
    
}
$html.='<table class="Informe">
        <tr>
            <td style="width:50%">'.$htmlItem.'</td>
            <td ALIGN="right" style="width:20%">'.$htmlIngreso.'</td>
            <td class="total" style="width:20%"><u>'.number_format($totIngresos, 2).'</u></td>
        </tr></table>';


$html.='<P CLASS="western" ALIGN=left>
<FONT FACE="Calibri, serif"><B>EGRESOS</B></FONT></P><BR>';

$totEgresos=0;
//LISTAR TOTAL DE EGRESOS PORCENTUAL
$consulta1 = "SELECT cadesefe, 
round(cacanefe, 0) as cacanefe, 
(SUM(camoning)/100)*cacanefe as total
FROM aegrefij, aconing, aconfin, aarqcaj
WHERE catipcan='PORCENTUAL'
and aconing.pacodeco=aconfin.pacodapo
AND aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
and aegrefij.caestefe=1
GROUP BY cadesefe, cacanefe";

$resultado1 = mysqli_query($conexion, $consulta1);

$htmlEgresos='';
$htmlTotalEgresos='';

//$html.='<TABLE>';
while ($row = mysqli_fetch_array($resultado1)) {
    $htmlEgresos.=$row['cadesefe'].'('.$row['cacanefe'].'%)'.'<br>';
    $htmlTotalEgresos.=number_format($row['total'], 2).'<br>';
    $totEgresos=$totEgresos+$row['total'];
}

//LISTAR TOTAL DE EGRESOS EFECTIVO
$consulta = "SELECT cadesegr, SUM(`camonegr`) as catotegr 
FROM `aconegr`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconegr.pacodegr
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
and aconegr.cadesegr NOT LIKE '%)'
GROUP BY cadesegr
order by cadesegr desc";

$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $htmlEgresos.=$row['cadesegr'].'<br>';
    $detalleEgresos=number_format($row['catotegr'], 2);
    $htmlTotalEgresos.=$detalleEgresos.'<br>';
    $totEgresos=$totEgresos+$row['catotegr'];
}

$html.='<TABLE class="Informe">
            <tr>
                <td style="width:50%">'.$htmlEgresos.'</td>
                <td ALIGN="right" style="width:20%">'.$htmlTotalEgresos.'</td>
                <td class="total" style="width:20%"><u>'.number_format($totEgresos, 2).'</u></td>
            </tr>
        </TABLE>';

$consulta = "SELECT `pacodcaj`, 
cainicaj, 
cafincaj, 
camonini as SaldoIni, 
camonfin as SaldoFin,
caestcaj,
catoting as totIngresos,
catotegr as totEgresos
FROM `aarqcaj`
where pacodcaj='{$pacodcaj}'
ORDER BY pacodcaj DESC";

$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_array($resultado);

$html.='<P CLASS="western" ALIGN=left>
<FONT FACE="Calibri, serif"><B>RESUMEN GENERAL</B></FONT></P><BR>';

$totalSaldoEntrante=$row['SaldoIni']+$totIngresos;
$totalSaldoSaliente=$row['SaldoFin']+$totEgresos;
$totIngresos=number_format($totIngresos, 2);
$totEgresos=number_format($totEgresos, 2);
$totalSaldoEntrante=number_format($totalSaldoEntrante, 2);
$totalSaldoSaliente=number_format($totalSaldoSaliente, 2);

$html.="<TABLE class='Informe'>
            <TR>
                <TD style='width:50%'>*Saldo mes Anterior</TD>
                <td ALIGN='right' style='width:20%'>".number_format($row['SaldoIni'], 2)."</td>
                <td></td>
            </TR>
            <TR>
                <TD style='width:50%'>(+)Ingresos del mes</TD>
                <td ALIGN='right' style='width:20%'>{$totIngresos}</td>
                <td></td>
            </TR>
            <TR>
                <TD style='width:50%'>(-)Egresos del mes</TD>
                <td></td>
                <td ALIGN='right' style='width:20%'>{$totEgresos}</td>
            </TR>
            <TR>
                <TD style='width:50%'>*Saldo para Sgt. mes</TD>
                <td></td>
                <td ALIGN='right' style='width:20%'>".number_format($row['SaldoFin'], 2)."</td>
            </TR>
            <TR>
                <TD style='width:50%'>Sumas Iguales</TD>
                <td ALIGN='right' style='width:20%'>{$totalSaldoEntrante}</td>
                <td ALIGN='right' style='width:20%'>{$totalSaldoSaliente}</td>
            </TR>
        </TABLE>";
        //$numero=1,250.56+1,358.00;
        //$html.='<p>'.$numero.'</p>';

$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();

function asignarMes($row, $mes){
    switch ($row['mes']) {
        case '1':
                $mes = 'ENERO';
                return $mes;
            break;
        case '2':
            $mes = 'FEBRERO';
            return $mes;
            break;
        case '3':
            $mes = 'MARZO';
            return $mes;
            break;
        case '4':
            $mes = 'ABRIL';
            return $mes;
            break;
        case '5':
            $mes = 'MAYO';
            return $mes;
            break;
        case '6':
            $mes = 'JUNIO';
            return $mes;
            break;
        case '7':
            $mes = 'JULIO';
            return $mes;
            break;
        case '8':
            $mes = 'AGOSTO';
            return $mes;
            break;
        case '9':
            $mes = 'SEPTIEMBRE';
            return $mes;
            break;
        case '10':
            $mes = 'OCTUBRE';
            return $mes;
            break;
        case '11':
            $mes = 'NOVIEMBRE';
            return $mes;
            break;
        case '12':
            $mes = 'DICIEMBRE';
            return $mes;
            break;
        default:
            # code...
            return $mes;
            break;
    }
}

?>