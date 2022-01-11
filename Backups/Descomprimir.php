<?php
//Verificación de los valores enviados
if ($_FILES["zip_file"]["name"]) {
    //obtenemos datos de nuestro ZIP
    $nombre = $_FILES["zip_file"]["name"];
    $ruta = $_FILES["zip_file"]["tmp_name"];
    $tipo = $_FILES["zip_file"]["type"];

    // Función descomprimir 
    $zip = new ZipArchive;
    if ($zip->open($ruta) === TRUE) {
        //$zip_ready=zip_read($zip);
        //echo ''.zip_entry_name($zip);
        //función para extraer el ZIP
        $extraido = $zip->extractTo('temp/');
        //
        $nombreSQL = str_replace('.zip', '.sql', $nombre);
        //echo $extraido . ' ' . $nombreSQL;


        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = 'uajms1234';
        $dbName     = 'pruebabd';
        $filePath   = 'temp/' . $nombreSQL;

        //echo '<br>' . $filePath;

        restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath);



        $zip->close();
        // Fin de mostrar ficheros de carpetas
       // $mensaje= '<div class="alert alert-success" alert-dismissible fade show role="alert">';
        $mensaje= " La Base de Datos ha sido Restaurada correctamente";
        //$mensaje.= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        //$mensaje.= '</div>';
        echo $mensaje;
    } else {
        echo '<br><ul class="list-group">';
        echo '<li class="list-group-item">';
        echo "Ocurrió un error y el archivo no se pudo descomprimir y/o formato no es ZIP";
        echo '</li></ul>';
    }
}

function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath)
{
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    //echo 'restuarando';
    // Temporary variable, used to store current query
    $templine = '';

    // Read in entire file
    $lines = file($filePath);

    $error = '';

    // Loop through each line
    foreach ($lines as $line) {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '') {
            continue;
        }

        // Add this line to the current segment
        $templine .= $line;

        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';') {
            // Perform the query
            if (!$db->query($templine)) {
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }

            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error) ? $error : true;
}
