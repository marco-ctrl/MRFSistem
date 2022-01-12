<?php
//Verificación de los valores enviados
if ($_FILES["zip_file"]["name"]) {
    //obtenemos datos de nuestro ZIP
    $nombre = $_FILES["zip_file"]["name"];
    $ruta = $_FILES["zip_file"]["tmp_name"];
    $tipo = $_FILES["zip_file"]["type"];

    //datos de la base de datos
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'uajms1234';
    $dbName     = 'pruebabd';

    if ($tipo == "application/sql") {
        restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $ruta);
            //$mensaje = " La Base de Datos ha sido Restaurada correctamente";
            //echo $mensaje;
    } else {
        if ($tipo == "application/zip") {
            if (VerificarExtencionSql($ruta)) {
                $zip = new ZipArchive;
                if ($zip->open($ruta) === TRUE) {
                    $extraido = $zip->extractTo('temp/');
                    $nombreSQL = str_replace('.zip', '.sql', $nombre);

                    $filePath   = 'temp/' . $nombreSQL;

                    restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath);

                    $zip->close();
                    //$mensaje = " La Base de Datos ha sido Restaurada correctamente";
                    //echo $mensaje;
                } else {

                    echo "Ocurrió un error y el archivo no se pudo descomprimir y/o formato no es ZIP";
                }
            } else {
                echo "Ocurrió un error al archivo comprimido no es formato sql";
            }
        }
    }
}

function VerificarExtencionSql($ruta)
{
    $zip1 = zip_open($ruta);
    $zip_entry = zip_read($zip1);
    $nombreArchivoZip = zip_entry_name($zip_entry);

    $tamanoCadena = strlen($nombreArchivoZip);
    $posicionCoincidencia = strrpos($nombreArchivoZip, '.sql', ($tamanoCadena - 4));

    if ($posicionCoincidencia === false) {
        return false;
    } else {
        return true;
    }
    zip_close($zip1);
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
    //return !empty($error) ? $error : true;
    if (empty($error)){
        echo "Se restauro correctamente la base de datos";
    }
    else{
        echo $error;
    }
}
