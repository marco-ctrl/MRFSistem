<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once "../AccesoDatos/Conexion/Conexion.php";

$pacodcel = $_GET['pacodcel'];

?>
<header>
    <link href="/MRFSistem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/MRFSistem/ReportesPDF/CSS/Stylos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />


</header>

<?php
$consulta = "SELECT camatmie, 
    capatmie, 
    cacelmie, 
    cacidmie,
    cacidmie, 
    cadirmie, 
    cafecnac, 
    canommie, 
    pacodmie, 
    canomcel,
    canumcel,
    cafunmie,
    pacodmcl,
    canombar,
    canomcal
    FROM amiebro m, acelula, amiecel, abardir, acaldir 
    where pacodmie=facodmie
    and pacodcel=facodcel
    and amiecel.caestmcl=1
    and facodcal=pacodcal
    and facodbar=pacodbar
    and pacodcel='{$pacodcel}'
    order by cafunmie asc";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_array($resultado);
$nomCelula = $row['canomcel'];
?>

<body>
    <button id="btn_generar"><i class="fas fa-download"></i> Generar</button>
    <hr>
    <div id="imprimir">
        <DIv>
            <img src="/MRFSistem/img/Asambleas.svg" class="derecho">
            <aside>
                <h3>ASAMBLEAS DE DIOS DE BOLIVIA <br>
                    IGLESIA "BERMEJO"<br>
                    <u>INFORME DE CELULAS</u>
                </h3>
            </aside>
        </DIv>
        <p class="interlineado"><b><u>DATOS DE CELULA</u></b>
            <BR>
            Nombre Celula: <?php echo $row['canomcel'] ?><br>
            Numero Celula: <?php echo $row['canumcel'] ?><br>
            Direccion: <?php echo 'B/' . $row['canombar'] . ' C/' . $row['canomcal'] ?><br>
            <?php
            $consulta = "SELECT camatmie, 
                capatmie, 
                cacelmie, 
                cacidmie,
                cacidmie, 
                cadirmie, 
                cafecnac, 
                canommie, 
                pacodmie, 
                canomcel,
                cafunmie,
                pacodmcl,
                canombar,
                canomcal
                FROM amiebro m, acelula, amiecel, abardir, acaldir 
                where pacodmie=facodmie
                and pacodcel=facodcel
                and amiecel.caestmcl=1
                and facodcal=pacodcal
                and facodbar=pacodbar
                and pacodcel='{$pacodcel}'
                order by cafunmie desc";
            $resultado1 = mysqli_query($conexion, $consulta);

            $lider = '';
            $asistente = '';
            $anfitrion = '';
            $discipulo = '';
            $numContacto = '';

            while ($row = mysqli_fetch_array($resultado1)) {
                if ($row['cafunmie'] == "LIDER") {
                    $lider = $row['canommie'] . ' ' . $row['capatmie'] . ' ' . $row['camatmie'];
                    $numContacto = $row['cacelmie'];
                } else {
                    if ($row['cafunmie'] == "ASISTENTE") {
                        $asistente = $row['canommie'] . ' ' . $row['capatmie'] . ' ' . $row['camatmie'];
                    } else {
                        if ($row['cafunmie'] == "ANFITRION") {
                            $anfitrion = $row['canommie'] . ' ' . $row['capatmie'] . ' ' . $row['camatmie'];
                        }
                    }
                }
            }

            ?>
            Lider: <?php echo $lider ?><br>
            Numero Contacto: <?php echo $numContacto ?><br>
            Asistente: <?php echo $asistente ?><br>
            Anfitrion: <?php echo $anfitrion ?><br>
        <p>
        <p><b>Discipulo</b></p>
        <Table class="table" width="100%">
            <TR>
                <TH class="th">N°</TH>
                <TH class="th">Nombre y Apellido</TH>
                <th class="th">Domicilio</th>
                <th class="th">Num. Contacto</th>
            </TR>
            <?php
            $consulta = "SELECT camatmie, 
                capatmie, 
                cacelmie, 
                cacidmie,
                cacidmie, 
                cadirmie, 
                cafecnac, 
                canommie, 
                pacodmie, 
                canomcel,
                cafunmie,
                pacodmcl,
                canombar,
                canomcal
                FROM amiebro m, acelula, amiecel, abardir, acaldir 
                where pacodmie=facodmie
                and pacodcel=facodcel
                and amiecel.caestmcl=1
                and facodcal=pacodcal
                and facodbar=pacodbar
                and pacodcel='{$pacodcel}'
                order by cafunmie desc";
            $resultado1 = mysqli_query($conexion, $consulta);

            $cont = 1;
            $html = '';

            while ($row = mysqli_fetch_array($resultado1)) {
                if ($row['cafunmie'] == "DISCIPULO/A"){
                    $html .= '<tr>
                    <td class="td">' . $cont . ' </td>
                    <td class="td">' . $row['canommie'] . ' ' . $row['capatmie'] . ' ' . $row['camatmie'] . '</td>
                    <td class="td">' . $row['cadirmie'] . '</td>
                    <td class="td">' . $row['cacelmie'] . '</td>
                    </tr>';
                $cont += 1;
                }
                
            }
            echo $html;
            ?>
        </Table>
        <?php
        $consulta = "SELECT calatcel, calogcel
                FROM acelula, amiecel 
                where pacodcel='{$pacodcel}'";
        $resultadoPunto = mysqli_query($conexion, $consulta);
        $punto = mysqli_fetch_array($resultadoPunto);
        ?>
        <div class="html2pdf__page-break"></div>
        <p><b>Ubicacion</b></p>
        <div id="here-appear-theimages">

        </div>
    </div>
    <div id="my-node">
        <div id="map" class="mapas">

        </div>
    </div>
    <input type="button" id="btn" value="Create" />

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>

    <script src="Script/html2pdf.bundle.min.js"></script>
    <script type="text/javascript" src="Script/qrcode.js"></script>
    <script src="JSPdf/DatosCelula.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", () => {

        const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var mymap = L.map('map').setView([<?php echo $punto['calatcel'] ?>, <?php echo $punto['calogcel'] ?>],
            17);
        L.tileLayer(tilesProvider, {
            maxZoom: 20,
        }).addTo(mymap);
        //Marcador en el mapa//
        var marker = L.marker([<?php echo $punto['calatcel'] ?>, <?php echo $punto['calogcel'] ?>]).addTo(
            mymap);


        const boton = document.querySelector("#btn_generar");
        boton.addEventListener("click", () => {

            var node = document.getElementById('my-node');
            /*var options = {
                quality: 0.95
            };*/

            domtoimage.toPng(node)
                .then(function(dataUrl) {
                    console.log(dataUrl);
                    //window.open(dataUrl);
                    var img = new Image();
                    img.src = dataUrl;
                    document.getElementById("here-appear-theimages").appendChild(img);
                    const $elementoParaConvertir = document.querySelector(
                        "#imprimir"); // <-- Aquí puedes elegir cualquier elemento del DOM
                    html2pdf()
                        .set({
                            margin: 1,
                            filename: "DatosCelula <?php echo $nomCelula ?>",
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
                                orientation: 'portrait' // landscape o portrait
                            }
                        })
                        .from($elementoParaConvertir)
                        .save()
                        .catch(err => console.log(err))
                        .finally(()=>{
                            //console.log('generado');
                            //window.close();
                        })
                        .then(()=>{
                            //window.close();
                            //console.log('generado')
                        });
                        
                })
                .catch(function(error) {
                    console.error('oops, something went wrong!', error);
                });




        });

    });
    </script>

</body>