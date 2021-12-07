<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

//include '../../MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php';
$nombre=$_GET['nombre'];
$rol=$_GET['rol'];
$codigo=$_GET['codigo'];
$usuario=$_GET['usuario'];
$pass=$_GET['pass'];

/*$nombre="Marco Antonio Mamani Villena";
$rol="Administrador";
$codigo="usu-000001";
$usuario="marck45";
$pass="123";*/

$css = file_get_contents('css/Stylos.css');

//Agregamos la libreria para genera códigos QR
require "phpqrcode/qrlib.php";    
	
//Declaramos una carpeta temporal para guardar la imagenes generadas
$dir = 'temp/';

//Si no existe la carpeta la creamos
if (!file_exists($dir))
    mkdir($dir);

    //Declaramos la ruta y nombre del archivo a generar
$filename = $dir.$usuario.'.png';

    //Parametros de Condiguración

$tamaño = 4; //Tamaño de Pixel
$level = 'M'; //Precisión Baja
$framSize = 3; //Tamaño en blanco
$contenido = $codigo."|".$rol."|".$usuario."|".$pass; //Texto

    //Enviamos los parametros a la Función para generar código QR 
QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 

    //Mostramos la imagen generada
//echo '<img src="'.$dir.basename($filename).'" /><hr/>';  
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
$mpdf->SetTitle('Datos de Usuario '.$usuario);

$html='<h1>MRFSISTEM</h1><BR>
        <div>
            <table style="font-size:15px">
                <tr>
                    <td>Miembro:</td>
                    <td>'.$nombre.'</td>
                    <td rowspan="5"><img src="'.$dir.basename($filename).'"></td>
                </tr>
                <tr>
                    <td>Codigo:</td>
                    <td>'.$codigo.'</td>
                </tr>
                <tr>
                    <td>Rol:</td>
                    <td>'.$rol.'</td>
                </tr>
                <tr>
                    <td>Usuario:</td>
                    <td>'. $usuario.'</td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td>'.$pass.'</td>
                </tr>
            </table>
        </div>';
$html.='<hr/>';

$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);
$mpdf->Output();

?>