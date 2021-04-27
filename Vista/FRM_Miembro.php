<?php
session_start();
  
if(empty($_SESSION['active'])){
  header('location: ../');
}

?>
<head>
    <title>MRFIglesiaBermejo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <?php 
        include 'Estilos.php';
    ?>
    <?php 
        include 'Scripts.php';
    ?>
</head>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary justify-content-between">
    <a href="#" class="navbar-brand">Miembro</a>
    <!--<ul class="navbar-nav ml-auto">-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="FRM_principal.php"><i class="fas fa-home"></i> Inicio</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-sm-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Miembro">

        </form>
    </div>

    <!--</ul>-->
</nav>

<div class=" p-2 container">
    <div class="col-md-4 p-2">
        <div>
            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                                    text-center"><i class="fas fa-plus-circle"></i> Agregar Miembro
            </button>
        </div>
    </div>
    <div id="App" class="row">
        <div class="col-md-12">
            <div id="mensaje">

            </div>
            <div class="" id="home">
                <?php include 'Miembro/ListMiembro.php' ?>
            </div>
            <div class="" id="profile">
                <?php include 'Miembro/RegMiembro.php' ?>
            </div>

        </div>
    </div>
</div>

<br>
<script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>

<script src="/MRFIglesiaBermejo/Script/MiembroApp.js"></script>
<br>
<br>