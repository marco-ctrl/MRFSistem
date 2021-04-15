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
    <a class="navbar-brand" href="#">ESCUELA DE LIDEREZ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="FRM_principal.php"><i class="fas fa-home"></i>Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="FRM_Maestro.php" id="mn_maestro"><i class="fas fa-chalkboard-teacher"></i>
                        Maestro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FRM_Alumno.php" id="mn_alumno"><i class="fas fa-user-graduate"></i>
                        Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FRM_Contenido.php" id="mn_contenido"><i class="fas fa-book"></i> Materia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FRM_Curso.php" id="mn_curso"><i class="fas fa-chalkboard"></i> Curso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FRM_Matriculacion.php" id="mn_matriculacion"><i class="fas fa-server text-white"></i> Matriculacion</a>
                </li>

            </ul>

            <form class="form-inline my-2 my-sm-0">
                <a href="Salir.php" class="navbar-brand">Cerrar Sesion <i class="fas fa-sign-out-alt"></i></a>

            </form>
        </div>


    </nav>

    <div id="trabajoEscuela">
           <!--<img id="imagen" alt="" src="http://localhost/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-000017ANTONIO250820071327.jpg">1</img>
           <img id="imagen" alt="" src="/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-000017ANTONIO250820071327.jpg">2</img>-->
        
         </div>
</body>

</html>