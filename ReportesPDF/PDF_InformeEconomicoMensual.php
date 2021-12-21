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



$css = file_get_contents('css/Stylos.css');

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
$mpdf->SetTitle('Informe Economico Mensual');

$html='<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>LAS ASAMBLEAS DE DIOS DE BOLIVIA</B></FONT></P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">R.S. 101452/62 P.J.21565/95</FONT></P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif">Filial Distrital Tarija- Región 2
Provincia Arce</FONT></P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><U><B>INFORME ECONOMICO DEL MES DE </B></U></FONT><FONT FACE="Calibri, serif"><FONT SIZE=2 STYLE="font-size: 11pt"><U><B>
'.$mes1.' '.$anio.'</B></U></FONT></FONT></P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 100%">
 <FONT FACE="Calibri, serif">(Expresado en bolivianos)</FONT></P>
<P CLASS="western" STYLE="margin-bottom: 0in">
</P>';

$totIngresos=0;
//LISTAR TOTAL INGRESOS
$html.='<P CLASS="western" ALIGN=left STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>INGRESOS</B></FONT></P><br>';


$consulta = "SELECT `catiping`, format(SUM(`camoning`), 2) as catoting 
FROM `aconing`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconing.pacodeco
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
GROUP BY aconing.catiping";

$resultado = mysqli_query($conexion, $consulta);

$htmlItem='';
$htmlIngreso='';

//$html.='<div>';
while ($row = mysqli_fetch_array($resultado)) {
    $htmlItem.=$row['catiping'].'<br>';
    $htmlIngreso.=$row['catoting'].'<br>';
    //<div class="columna" ALIGN="right">'.$totIngresos.'</div>';
    $totIngresos=$totIngresos+$row['catoting'];
    
}
//$htmlItem.='</p>';
//$htmlIngreso.='</p>';
$html.='<table style="width:100%">
        <tr>
            <td>'.$htmlItem.'</td>
            <td ALIGN="right">'.$htmlIngreso.'</td>
            <td ALIGN="right" style="vertical-align:bottom;"><u>'.$totIngresos.'</u></td>
        </tr></table>';
/*$html.="<div class='columna'>".
            $htmlItem
        ."</div>
        <div class='columna'>".
            $htmlIngreso
        ."</div>
        </div><br>";*/


$html.='<P CLASS="western" ALIGN=left STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>EGRESOS</B></FONT></P><BR>';

$totEgresos=0;
//LISTAR TOTAL DE EGRESOS PORCENTUAL
$consulta1 = "SELECT cadesefe, 
round(cacanefe, 0) as cacanefe, 
format((SUM(camoning)/100)*cacanefe, 2) as total
FROM aegrefij, aconing, aconfin, aarqcaj
WHERE catipcan='PORCENTUAL'
and aconing.pacodeco=aconfin.pacodapo
AND aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
and aegrefij.caestefe=1
GROUP BY cadesefe";

$resultado1 = mysqli_query($conexion, $consulta1);

$html.='<TABLE>';
while ($row = mysqli_fetch_array($resultado1)) {
    $html.='<TR><TD>'.$row['cadesefe'].'('.$row['cacanefe'].'%)'.'</TD><TD ALIGN="right">'.$row['total'].'</TD></TR>';
    $totEgresos=$totEgresos+$row['total'];
}

//LISTAR TOTAL DE EGRESOS EFECTIVO
$consulta = "SELECT `cadesegr`, format(SUM(`camonegr`), 2) as catotegr 
FROM `aconegr`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconegr.pacodegr
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
and aconegr.cadesegr NOT LIKE '%)'
GROUP BY aconegr.cadesegr
order by aconfin.pacodapo desc";

$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($resultado)) {
    $html.='<TR><TD>'.$row['cadesegr'].'</TD><TD ALIGN="right">'.$row['catotegr'].'</TD></TR>';
    $totEgresos=$totEgresos+$row['catotegr'];
}

$html.='<tr><td>Total</td><td ALIGN="right">'.$totEgresos.'</td></tr></TABLE>';

$consulta = "SELECT `pacodcaj`, 
cainicaj, 
cafincaj, 
format(camonini, 2) as SaldoIni, 
format(camonfin, 2) as SaldoFin,
caestcaj,
format(catoting, 2) as totIngresos,
format(catotegr, 2) as totEgresos
FROM `aarqcaj`
where pacodcaj='{$pacodcaj}'
ORDER BY pacodcaj DESC";

$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_array($resultado);

$html.='<P CLASS="western" ALIGN=left STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>RESUMEN GENERAL</B></FONT></P><BR>';

$totalSaldoEntrante=$row['SaldoIni']+$totIngresos;
$totalSaldoSaliente=$row['SaldoFin']+$totEgresos;

$html.="<TABLE style='width:100%'>
            <TR>
                <TD>*Saldo mes Anterior</TD>
                <td ALIGN='right'>{$row['SaldoIni']}</td>
                <td></td>
            </TR>
            <TR>
                <TD>(+)Ingresos del mes</TD>
                <td ALIGN='right'>{$totIngresos}</td>
                <td></td>
            </TR>
            <TR>
                <TD>(-)Egresos del mes</TD>
                <td></td>
                <td ALIGN='right'>{$totEgresos}</td>
            </TR>
            <TR>
                <TD>*Saldo para Sgt. mes</TD>
                <td></td>
                <td ALIGN='right'>{$row['SaldoFin']}</td>
            </TR>
            <TR>
                <TD>Sumas Iguales</TD>
                <td ALIGN='right'>{$totalSaldoEntrante}</td>
                <td ALIGN='right'>{$totalSaldoSaliente}</td>
            </TR>
        </TABLE>";

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