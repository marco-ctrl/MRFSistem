<?php
session_start();
  
if(empty($_SESSION['active'])){
  header('location: ../');
}

//establecier zona horaria
date_default_timezone_set('UTC');
date_default_timezone_set('America/La_Paz'); 
?>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MRFSistem</title>
    <link rel="shortcut icon" href="/MRFSistem/logo.jpg">
    <!-- Custom fonts for this template-->
    <link href="/MRFSistem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/MRFSistem/CSS/sb-admin-2.min.css" rel="stylesheet">
    <link href="/MRFSistem/alertifyjs/css/alertify.css" rel="stylesheet">
    <link href="/MRFSistem/alertifyjs/css/themes/bootstrap.css" rel="stylesheet">
    <link href="/MRFSistem/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
        <link rel="stylesheet" type="text/css" href="/MRFSistem/CSS/jquery.maxlength.css"> 
    <link href="/MRFSistem/CSS/EstilosPersonalisados.css" rel="stylesheet">
    <link href="/MRFSistem/ReportesPDF/CSS/Stylos1.css" rel="stylesheet">

</head>