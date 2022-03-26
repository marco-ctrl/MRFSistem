<?php include 'Header.php' ?>

<body id="page-top">
    <!-- Div cargando -->
    <?php include 'Cargando.php' ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="/MRFSistem/logo.jpg" alt="" width="70%" class="img-profile rounded-circle">
                </div>
                <div class="sidebar-brand-text mx-3">MRFSistem</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="FRM_principal.php">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php //include_once('includes/EscuelaLideres/interfaces.php'); ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Opciones</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="#" id="mn_agregarMiembro"><i class="fas fa-user-plus"></i>
                            Agregar Miembro</a>
                        <a class="collapse-item" href="#" id="mn_listarMiembro"><i class="fas fa-list"></i>
                            Listar Miembro</a>
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
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> Reportes:</h6>
                        <a class="collapse-item" href="INF_Alumno"><i class="far fa-file-pdf"></i> Informacion
                            Alumno</a>
                        <a class="collapse-item" href="InfoCursos" href="#"><i class="far fa-file-pdf"></i>
                            Informacion Maestros</a>
                        <a class="collapse-item" href="ControlPago" href="#"><i class="far fa-file-pdf"></i> Control de
                            Pago</a>
                        <a class="collapse-item" href="ControlAsistencia" href="#"><i class="far fa-file-pdf"></i>
                            Control de Asistencia</a>
                        <a class="collapse-item" href="INF_Materias" href="#"><i class="far fa-file-pdf"></i>
                            Informacion de Materias</a>
                        <a class="collapse-item" href="INF_Cursos" href="#"><i class="far fa-file-pdf"></i>
                            Informacion de Curso</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="FRM_principal.php">
                    <i class="fas fa-info-circle"></i>
                    <span>Informacion Celula</span></a>
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">CELULA </h1>
                        <a href="FRM_LiderCelula" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-desktop fa-sm text-white-50"></i> Volver Escritorio</a>
                    </div>
                    <!--<div id="div_contenedor">

                    </div>-->
                    <div id="formulario">
                        <?php include 'includes/Celulas/AgregarMiembro.php'?>
                    </div>

                    <div id="lista">
                        <?php include 'includes/Celulas/ListarMiembro.php'?>
                    </div>

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
    <script src="/MRFSistem/Script/CodigoApp.js"></script>
    <script src="/MRFSistem/Script/LiderApp.js"></script>


</body>