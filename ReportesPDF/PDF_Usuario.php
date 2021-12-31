<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

$nombre=$_GET['nombre'];
$rol=$_GET['rol'];
$codigo=$_GET['codigo'];
$usuario=$_GET['usuario'];
$pass=$_GET['pass'];

?>

<h1>MRFSISTEM</h1>
        <div>
            <table style="font-size:15px">
                <tr>
                    <td>Miembro:</td>
                    <td><?php echo $nombre ?></td>
                    <td rowspan="5"><div id="qrcode"></div></td>
                </tr>
                <tr>
                    <td>Codigo:</td>
                    <td><?php echo $codigo ?></td>
                </tr>
                <tr>
                    <td>Rol:</td>
                    <td><?php echo $rol ?></td>
                </tr>
                <tr>
                    <td>Usuario:</td>
                    <td><?php echo $usuario ?></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><?php echo $pass ?></td>
                </tr>
            </table>
        </div>


<script type="text/javascript" src="Script/qrcode.js"></script>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
    text: "<?php echo $codigo ?>|<?php echo $usuario ?>|<?php echo $pass ?>",
    width: 128,
    height: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});
</script>