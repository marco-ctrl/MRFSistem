<html>

<head>
    <title>MRFIglesiaBermejo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MRFIglesiaBermejo/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="/MRFIglesiaBermejo/CSS/all.min.css">
    <link rel="stylesheet" href="/MRFIglesiaBermejo/CSS/EstilosPersonalisados.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
    <script src="/MRFIglesiaBermejo/Script/jquery-3.5.1.min.js"></script>
    <script src="/MRFIglesiaBermejo/js/popper.min.js"></script>
    <script src="/MRFIglesiaBermejo//Script/bootstrap.min.js"></script>
    <script src="/MRFIglesiaBermejo/Script/App.js"></script>
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
                    <a class="navbar-brand" href="#">Inicio</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-archive text-white"></i> Archivos</a>
                    <div class="dropdown-menu" style="">
                        <a id="mn_miembro" class="dropdown-item" href="#"><i class="fas fa-users"></i>  Miembros</a>
                        <a id="mn_usuario" class="dropdown-item" href="#"><i class="fas fa-user"></i>  Usuario</a>
                        <a id="mn_celula" class="dropdown-item" href="#"><i class="fas fa-home"></i>  Celula</a>
                        <a id="mn_aportes" class="dropdown-item" href="#"><i class="fas fa-file-invoice-dollar"></i>  Aportes</a>
                        <a id="mn_alumnos" class="dropdown-item" href="#"><i class="fas fa-school"></i>  Escuela de Lideres</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false"><i class="far fa-file-pdf text-white"></i> Reportes</a>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Informacion de Miembro</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Informacion de Usuario</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Informacion de Celula</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Reporte de Aportes</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf "></i> Reporte Escuela de Lideres</a>

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
        </div>


    </nav>