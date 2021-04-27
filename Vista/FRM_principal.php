<?php include 'Header.php' ?>
<div id="trabajo">
    <!--<img id="imagen" alt="" src="http://localhost/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-000017ANTONIO250820071327.jpg">1</img>
           <img id="imagen" alt="" src="/MRFIglesiaBermejo/AccesoDatos/Miembro/Imagenes/MBR-000017ANTONIO250820071327.jpg">2</img>-->

</div>
<div class="d-flex toggled" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-primary border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-white">MRFSystem </div>
        <div class="list-group list-group-flush">
            <a href="#" class="navbar-brand list-group-item list-group-item-action bg-primary text-white"><i
                    class="fas fa-home"></i> Inicio</a>
            <a href="#" class="navbar-brand list-group-item list-group-item-action bg-primary text-white"><i
                    class="fas fa-user"></i> Perfil</a>
            <a id="mn_archivos" href="#"
                class="navbar-brand list-group-item list-group-item-action bg-primary text-white"><i
                    class="fas fa-archive text-white"></i> Archivos <i class="fas fa-caret-down"></i></a>
            <div id="div_archivos">
                <a id="mn_miembro" class="list-group-item list-group-item-action" href="FRM_Miembro.php"><i
                        class="fas fa-users"></i>
                    Miembros</a>
                <a id="mn_usuario" class="list-group-item list-group-item-action" href="FRM_Usuario.php"><i
                        class="fas fa-user"></i> Usuario</a>
                <a id="mn_celula" class="list-group-item list-group-item-action" href="FRM_Celula.php"><i
                        class="fas fa-home"></i> Celula</a>
                <a id="mn_aportes" class="list-group-item list-group-item-action" href="FRM_Aportes.php"><i
                        class="fas fa-file-invoice-dollar"></i>
                    Aportes</a>

                <a id="mn_alumnos" class="list-group-item list-group-item-action" href="FRM_EscLideres.php"><i
                        class="fas fa-school"></i>
                    Escuela de
                    Lideres</a>
            </div>
            <a id="mn_reportes" href="#" class="navbar-brand list-group-item list-group-item-action bg-primary text-white"><i
                    class="far fa-file-pdf text-white"></i> Reportes <i class="fas fa-caret-down"></i></a>
            <div id="div_reportes">
                <a class="list-group-item list-group-item-action" href="#"><i class="far fa-file-pdf "></i> Informacion
                    de Miembro</a>
                <a class="list-group-item list-group-item-action" href="#"><i class="far fa-file-pdf "></i> Informacion
                    de Usuario</a>
                <a class="list-group-item list-group-item-action" href="#"><i class="far fa-file-pdf "></i> Informacion
                    de Celula</a>
                <a class="list-group-item list-group-item-action" href="#"><i class="far fa-file-pdf "></i> Reporte de
                    Aportes</a>
                <a class="list-group-item list-group-item-action" href="#"><i class="far fa-file-pdf "></i> Reporte
                    Escuela de Lideres</a>
            </div>

            <a id="mn_sistema" href="#" class="navbar-brand list-group-item list-group-item-action bg-primary text-white"><i
                    class="fas fa-server text-white"></i> Base de Datos <i class="fas fa-caret-down"></i></a>
            <div id="div_sistema" style="">
                <a class="list-group-item list-group-item-action" href="#"><i class="fas fa-database"></i> Respaldar BD</a>
                <a class="list-group-item list-group-item-action" href="#"><i class="fas fa-database"></i> Restaurar BD</a>
            </div>
            <a href="#" class="navbar-brand list-group-item list-group-item-action bg-primary text-white"><i
                    class="fas fa-sign-out-alt"></i> Salir</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary border-bottom">
            <button class="btn btn-primary" id="menu-toggle"><i class="navbar-toggler-icon gi-1.5x"></i></button>

            <form class="form-inline position-relative my-2 my-lg-0 p-2">
                <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar">
                <button class="btn btn-search position-absolute " type="submit"><i
                        class="fas fa-search gi-2x"></i></button>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-user"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Nombre de Usuario
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Mi Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <h1 class="mt-4">Simple Sidebar</h1>
            <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on
                larger screens. When toggled using the button below, the menu will change.</p>
            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is
                optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which
                will toggle the menu when clicked.</p>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>

<?php include 'Footer.php'?>