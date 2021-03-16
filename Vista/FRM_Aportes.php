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
    <a class="navbar-brand" href="#">APORTES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="FRM_principal.php"><i class="fas fa-home"></i> Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" id="mn_economico"><i class="fas fa-money-bill-wave"></i>
                        Aportes Economicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="mn_objetos"><i class="fas fa-toolbox"></i>
                        Aportes Objetos</a>
                </li>
                

            </ul>

            <form class="form-inline my-2 my-sm-0">
                <a href="Salir.php" class="navbar-brand">Cerrar Sesion <i class="fas fa-sign-out-alt"></i></a>

            </form>
        </div>


    </nav>

    <div id="trabajoAportes">
           <!--<img id="imagen" alt="" src="http://localhost/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-000017ANTONIO250820071327.jpg">1</img>
           <img id="imagen" alt="" src="/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-000017ANTONIO250820071327.jpg">2</img>-->
        
         </div>
</body>

</html>