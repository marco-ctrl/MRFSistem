<?php

$host = "localhost";
$port = "5432";
$bdname = "mrfbermejobd";
$user = "root";
$password = "uajms";

$conexion = mysqli_connect($host, $user, $password, $bdname);
// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
//mysqli_close($conn);

//$conexion = ("$host $port $bdname $user $password");

//if(!$conexion){
  //  echo 'erro al conectar base de datos postgres';
//}

