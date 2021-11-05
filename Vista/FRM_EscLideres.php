<?php include 'Header.php' ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MRFSistem</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="FRM_principal.php">
            <i class="fas fa-home"></i>
            <span>Inicio</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-user"></i>
            <span>Perfil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-archive"></i>
            <span>Archivos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Archivos:</h6>
                <a class="collapse-item" href="#" id="mn_alumno"><i class="fas fa-user-graduate"></i> Alumnos</a>
                <a class="collapse-item" href="#" id="mn_maestro"><i class="fas fa-chalkboard-teacher"></i> Maestros</a>
                <a class="collapse-item" href="#" id="mn_contenido"><i class="fas fa-book"></i> Materias</a>
                <a class="collapse-item" href="#" id="mn_curso"><i class="fas fa-chalkboard"></i>
                    Cursos</a>
                <a class="collapse-item" href="#" id="mn_matricula"><i class="fas fa-server"></i> Matriculacion</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="far fa-file-pdf"></i>
            <span>Reportes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Reportes:</h6>
                <a class="collapse-item" id="mn_infAlumno" href="#"><i class="far fa-file-pdf"></i> Informacion Alumno</a>
                <a class="collapse-item" id="mn_controlPago" href="#"><i class="far fa-file-pdf"></i> Control de Pago</a>
                <a class="collapse-item" id="mn_controlAsistencia" href="#"><i class="far fa-file-pdf"></i> Control de Asistencia</a>
                
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sistema
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-server"></i>
            <span>Base de Datos</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Base de Datos</h6>
                <a class="collapse-item" href="login.html"><i class="fas fa-server"></i> Respaldar BD</a>
                <a class="collapse-item" href="register.html"><i class="fas fa-server"></i> Restaurar BD</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->

    <!-- Nav Item - Tables -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <!--<div class="text-center d-none d-md-inline">-->
    <div class="text-center d-sm-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Top Bar -->
                <?php include 'NavBar.php' ?>

                <div class="container-fluid" id="escuela">


                </div>

            </div>



            <!-- Footer -->
            <?php include 'Footer.php'?>

        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'LogoutModal.php'?>

    <?php include 'Scripts.php'?>
    <script src="/MRFSistem/Script/App.js"></script>


</body>

<?php
