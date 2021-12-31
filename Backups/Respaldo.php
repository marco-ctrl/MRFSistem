<?php
date_default_timezone_set('UTC');
date_default_timezone_set('America/La_Paz'); 
//Introduzca aquí la información de su base de datos y el nombre del archivo de copia de seguridad.
$mysqlDatabaseName ='mrfbermejobd';
$mysqlUserName ='root';
$mysqlPassword ='uajms1234';
$mysqlHostName ='localhost';
$fecha=date('jmyhis');
$mysqlExportPath =$mysqlDatabaseName.'_'.$fecha.'.sql';


//Por favor, no haga ningún cambio en los siguientes puntos
//Exportación de la base de datos y salida del status
$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p'.$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;

//$command='mysqldump -v --opt -h localhost -P 3306 --compress --events --routines --triggers --default-character-set=utf8 -u root -puajms1234 mrfbermejobd > respaldo.sql';

exec($command,$output,$worked);
//system($command,$output);

/*$zip = new ZipArchive(); //Objeto de Libreria ZipArchive
	
	    //Construimos el nombre del archivo ZIP Ejemplo: mibase_20160101-081120.zip
	    $salida_zip = 'Respaldo.zip';
	
	    if($zip->open($salida_zip,ZIPARCHIVE::CREATE)===true) { //Creamos y abrimos el archivo ZIP
		    $zip->addFile($mysqlExportPath); //Agregamos el archivo SQL a ZIP
		    $zip->close(); //Cerramos el ZIP
		    unlink($mysqlExportPath); //Eliminamos el archivo temporal SQL
		    header ("Location: $salida_zip"); // Redireccionamos para descargar el Arcivo ZIP
			//header ("Location: /MRFSistem/Vista/FRM_principal");
		} else {
		    echo 'Error'; //Enviamos el mensaje de error
	    }*/
        
echo $worked;
switch($worked){
    case 0:
        $zip = new ZipArchive(); //Objeto de Libreria ZipArchive
	
	    //Construimos el nombre del archivo ZIP Ejemplo: mibase_20160101-081120.zip
	    $salida_zip = $mysqlDatabaseName.'_'.$fecha.'.zip';
	
	    if($zip->open($salida_zip,ZIPARCHIVE::CREATE)===true) { //Creamos y abrimos el archivo ZIP
		    $zip->addFile($mysqlExportPath); //Agregamos el archivo SQL a ZIP
		    $zip->close(); //Cerramos el ZIP
		    unlink($mysqlExportPath); //Eliminamos el archivo temporal SQL
		    header ("Location: $salida_zip"); // Redireccionamos para descargar el Arcivo ZIP
		} else {
		    echo 'Error'; //Enviamos el mensaje de error
	    }
        echo 'La base de datos <b>' .$mysqlDatabaseName .'</b> se ha almacenado correctamente en la siguiente ruta '.getcwd().'/' .$mysqlExportPath .'</b>';
        break;
    case 1:
        echo 'Se ha producido un error al exportar <b>' .$mysqlDatabaseName .'</b> a '.getcwd().'/' .$mysqlExportPath .'</b>';
        break;
    case 2:
        echo 'Se ha producido un error de exportación, compruebe la siguiente información: <br/><br/><table><tr><td>Nombre de la base de datos:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>Nombre de usuario MySQL:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>Contraseña MySQL:</td><td><b>NOTSHOWN</b></td></tr><tr><td>Nombre de host MySQL:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
        break;
}
?>