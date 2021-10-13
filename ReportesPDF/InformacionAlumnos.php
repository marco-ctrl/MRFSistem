<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../../MRFIglesiaBermejo/AccesoDatos/Conexion/Conexion.php";

//include '../../MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php';

//$pacodalu=$_POST['pacodalu'];

$consulta = "SELECT camatmie, 
capatmie, 
cacelmie, 
cacidmie, 
cadirmie, 
caestmie, 
caestciv, 
cafecnac, 
caurlfot, 
canommie, 
pacodmie, 
facodciu, 
facodpro,
pacodpro,
canompro,
pacodciu,
canomciu,
canomcel,
canumcel,
cafunmie,
pacodalu,
pacodcel,
cafecenc, 
cafecbau, 
cafecigl, 
cafeccon,
pacodcre
FROM amiebro m, aproion p, aciudad c, acelula e, amiecel f, alumno a, acreesp b  
where m.facodpro=p.pacodpro 
and a.caestalu=true
and m.facodciu=c.pacodciu
and m.pacodmie=f.facodmie
and e.pacodcel=f.facodcel
and a.facodmie=m.pacodmie
and a.pacodalu='ALU-000004'
and m.pacodmie=b.pacodcre
order by pacodmie desc LIMIT 15";
$resultado = pg_query($conexion, $consulta);


$mpdf = new \Mpdf\Mpdf();
$html = '<h3 style="text-align:center">ASAMBLEAS DE DIOS DE BOLIVIA</h3>
<h3 style="text-align:center">IGLESIA "BERMEJO"</h3>
<h3 style="text-align:center">ESCUELA DE LIDERES</h3>
<h3 style="text-align:center"><u>FICHA DE DATOS DEL ALUMNO</u></h3>';

$row = pg_fetch_array($resultado);
$html.='<img width="140" height="120" src="'.$row['caurlfot'].'" align="right"><br><br>';
$html.='<LABEL><u>DATOS PERSONALES</u></LABEL>
<BR><br>';
$html.='<LABEL>Nombre Completo: '.$row['canommie'].' '.$row['capatmie'].' '.$row['camatmie'].'</label><br>';
$html.='<label>Direccion: '.$row['cadirmie'].'</label><br>';
$html.='<label>Telefonos de Contacto: '.$row['cacelmie'].'</label><br>';
$html.='<label>Fecha y lugar de Nacimiento: '.$row['cafecnac'].'-'.$row['canomciu'].'</label><br>';
$html.='<label>Estado Civil: '.$row['caestciv'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Carnet de Identidad N. '.$row['cacidmie'].'</label><br>';
$html.='<label>Profesion: '.$row['canompro'].'</label><br><br>';

$html.='<label><u>DATOS DE LA CELULA</u></label><br><br>';
$html.='<label>Nombre de su Celula: '.$row['pacodcel'].' '.$row['canomcel'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N. '.$row['canumcel'].'</label><br>';

$lid=$row['pacodcel'];
//echo $lid;

$sql="SELECT cafunmie, 
             pacodmcl, 
             facodcel, 
             facodmie, 
             caestmcl, 
             canommie, 
             capatmie, 
             camatmie, 
             pacodmie, 
             canomcel, 
             pacodcel
FROM amiecel, amiebro, acelula 
where cafunmie='LIDER' 
AND facodcel='{$lid}'
and pacodcel=facodcel
and pacodmie=facodmie";

$lider = pg_query($conexion, $sql);

$lid = pg_fetch_array($lider);

$html.='<label>Nombre del/la Lider: '.$lid['canommie'].' '.$lid['capatmie'].' '.$lid['camatmie'].'</label><br>';
$html.='<label>Funcion en la Celula: '.$row['cafunmie'].'</label><br><br>';

$html.='<label><u>CRECIMIENTO ESPIRITUAL</u></label><br><br>';
$html.='<label>Fecha de Conversion: '.$row['cafeccon'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fecha de Bautismo: '.$row['cafecbau'].'</label><br>';
$html.='<label>Entrada a la Iglesia: '.$row['cafecigl'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Encuentro con DIOS: '.$row['cafecenc'].'</label><br><BR><br>';
$html.='<p align="right">BERMEJO,'.date("y-m-d").'&nbsp;&nbsp;&nbsp;&nbsp;</p><br><br><br><br>';
$html.='<label align="left">&nbsp;&nbsp;&nbsp;&nbsp;FIRMA DEL ALUMNO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FIRMA DEL LIDER</label>';

$mpdf->WriteHTML($html);
$mpdf->Output();