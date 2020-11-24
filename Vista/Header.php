<?php
session_start();
  
if(empty($_SESSION['active'])){
  header('location: ../');
}
?>

<html>

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

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Sistema</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="FRM_principal.php">Inicio</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-archive text-white"></i>
                        Archivos</a>
                    <div class="dropdown-menu" style="">
                        <a id="mn_miembro" class="dropdown-item" href="#"><i class="fas fa-users"></i> Miembros</a>
                        <a id="mn_usuario" class="dropdown-item" href="#"><i class="fas fa-user"></i> Usuario</a>
                        <a id="mn_celula" class="dropdown-item" href="#"><i class="fas fa-home"></i> Celula</a>
                        <a id="mn_aportes" class="dropdown-item" href="#"><i class="fas fa-file-invoice-dollar"></i>
                            Aportes</a>
                        
                        <a id="mn_alumnos" class="dropdown-item" href="FRM_EscLideres.php"><i class="fas fa-school"></i> Escuela de
                            Lideres</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false"><i class="far fa-file-pdf text-white"></i>
                        Reportes</a>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Informacion de Miembro</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Informacion de Usuario</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Informacion de Celula</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Reporte de Aportes</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Reporte Escuela de
                            Lideres</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-server text-white"></i> Sistema</a>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" href="#"><i class="fas fa-database"></i> Respaldar BD</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-database"></i> Restaurar BD</a>
                    </div>
                </li>

            </ul>

            <form class="form-inline my-2 my-sm-0">
                <a href="Salir.php" class="navbar-brand">Cerrar Sesion <i class="fas fa-sign-out-alt"></i></a>

            </form>
        </div>


    </nav>