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
<P CLASS="western" STYLE="margin-bottom: 0in"><BR>
</P>';

$totIngresos=0;
//LISTAR TOTAL INGRESOS
$html.='<P CLASS="western" ALIGN=left STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>INGRESOS</B></FONT></P><BR>';


$consulta = "SELECT `catiping`, format(SUM(`camoning`), 2) as catoting 
FROM `aconing`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconing.pacodeco
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
GROUP BY aconing.catiping";

$resultado = mysqli_query($conexion, $consulta);

$html.='<TABLE>';
while ($row = mysqli_fetch_array($resultado)) {
    $html.='<TR><TD>'.$row['catiping'].'</TD><TD ALIGN="right">'.$row['catoting'].'</TD></TR>';
    $totIngresos=$totIngresos+$row['catoting'];
    
}

$html.='<tr><td>Total</td><td ALIGN="right">'.$totIngresos.'</td></tr></TABLE><br>';


$html.='<P CLASS="western" ALIGN=left STYLE="margin-bottom: 0in; line-height: 100%">
<FONT FACE="Calibri, serif"><B>EGRESOS</B></FONT></P><BR>';

$totEgresos=0;
//LISTAR TOTAL DE EGRESOS
$consulta = "SELECT `cadesegr`, format(SUM(`camonegr`), 2) as catotegr 
FROM `aconegr`, `aconfin`, `aarqcaj` 
WHERE aconfin.pacodapo=aconegr.pacodegr
and aconfin.facodcaj=aarqcaj.pacodcaj
and aconfin.facodcaj='{$pacodcaj}'
GROUP BY aconegr.cadesegr
order by aconfin.pacodapo desc";

$resultado = mysqli_query($conexion, $consulta);

$html.='<TABLE>';
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

$html.="<TABLE>
            <TR>
                <TD>*Saldo mes Anterior</TD>
                <td ALIGN='right'>{$row['SaldoIni']}</td>
            </TR>
            <TR>
                <TD>(+)Ingresos del mes</TD>
                <td ALIGN='right'>{$totIngresos}</td>
            </TR>
            <TR>
                <TD>(-)Egresos del mes</TD>
                <td ALIGN='right'>{$totEgresos}</td>
            </TR>
            <TR>
                <TD>*Saldo para Sgt. mes</TD>
                <td ALIGN='right'>{$row['SaldoFin']}</td>
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