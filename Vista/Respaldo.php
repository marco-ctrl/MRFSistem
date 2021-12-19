<?php
//Introduzca aquí la información de su base de datos y el nombre del archivo de copia de seguridad.
$mysqlDatabaseName ='mrfbermejobd';
$mysqlUserName ='root';
$mysqlPassword ='uajms';
$mysqlHostName ='localhost';
$mysqlExportPath ='respaldo.sql';

//Por favor, no haga ningún cambio en los siguientes puntos
//Exportación de la base de datos y salida del status
//$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p'.$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;

$command='mysqldump -v --opt -h localhost -P 3306 --compress --events --routines --triggers --default-character-set=utf8 -u root -puajms mrfbermejobd > respaldo.sql';

exec($command,$output,$worked);
//system($command,$output);
echo $worked;
switch($worked){
case 0:
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