<?php

$host = "localhost";
$port = "5432";
$bdname = "mrfbermejobd";
$user = "root";
$password = "uajms1234";

$conexion = mysqli_connect($host, $user, $password, $bdname);
// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
