<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

$nombre=$_GET['nombre'];
$rol=$_GET['rol'];
$codigo=$_GET['codigo'];
$usuario=$_GET['usuario'];
$pass=$_GET['pass'];

?>
<header>
    <link href="/MRFSistem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</header>

<body>
    <button id="btn_generar"><i class="fas fa-download"></i> Generar</button>
    <hr>
    <div id="imprimir">
        <h1>MRFSISTEM</h1>
        <div>
            <table style="font-size:15px">
                <tr>
                    <td>Miembro:</td>
                    <td><?php echo $nombre ?></td>
                    <td rowspan="5">
                        <div id="qrcode"></div>
                    </td>
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
    </div>
    <script src="Script/html2pdf.bundle.min.js"></script>
    <script src="JSPdf/ControlAsistencia.js"></script>
    <script type="text/javascript" src="Script/qrcode.js"></script>
    <script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: "<?php echo $codigo ?>|<?php echo $usuario ?>|<?php echo $pass ?>",
        width: 128,
        height: 128,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", () => {

        const boton = document.querySelector("#btn_generar");
        boton.addEventListener("click", () => {

            const $elementoParaConvertir = document.querySelector(
                "#imprimir"); // <-- Aquí puedes elegir cualquier elemento del DOM
            html2pdf()
                .set({
                    margin: 1,
                    filename: 'documento.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 3, // A mayor escala, mejores gráficos, pero más peso
                        letterRendering: true,
                    },
                    jsPDF: {
                        unit: "in",
                        format: "letter",
                        orientation: 'landscape' // landscape o portrait
                    }
                })
                .from($elementoParaConvertir)
                .save()
                .catch(err => console.log(err));


        });

    });
    </script>
</body>