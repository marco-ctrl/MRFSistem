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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-archive"></i>
                    <span>Archivos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Archivos:</h6>
                        <a class="collapse-item" href="FRM_Alumno"><i class="fas fa-user-graduate"></i>
                            Alumnos</a>
                        <a class="collapse-item" href="FRM_Maestro"><i class="fas fa-chalkboard-teacher"></i>
                            Maestros</a>
                        <a class="collapse-item" href="FRM_Contenido"><i class="fas fa-book"></i> Materias</a>
                        <a class="collapse-item" href="FRM_Curso"><i class="fas fa-chalkboard"></i>
                            Cursos</a>
                        <a class="collapse-item" href="FRM_Matriculacion"><i class="fas fa-server"></i>
                            Matriculacion</a>
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
                        <a class="collapse-item" href="ControlPago"><i class="far fa-file-pdf"></i> Control de
                            Pago</a>
                        <a class="collapse-item" href="ControlAsistencia"><i class="far fa-file-pdf"></i>
                            Control de Asistencia</a>

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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ESCUELA DE LIDERES</h1>
                        <a href="FRM_principal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-home fa-sm text-white-50"></i> Volver Inicio</a>
                    </div>

                    <!--row content-->
                    <div class="row">
                        <!--  Acceso directo a las Actividades -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Alumno" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Archivos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">ALUMNOS</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-graduate fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Maestro" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Archivos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">MAESTRO</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chalkboard-teacher fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Curso" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Archivos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">CURSO</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chalkboard fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Contenido" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Archivos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">MATERIA</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <!--row content-->
                    <div class="row">
                        <!--  Acceso directo a las Actividades -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Matriculacion" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Archivos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">MATRICULAS</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-server fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="INF_Alumno" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Reportes:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">INFORMACION ALUMNO</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-pdf fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="ControlPago" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Reportes:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">CONTROL PAGO</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-pdf fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="ControlAsistencia" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Reportes:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">CONTROL ASISTENCIA</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-pdf fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

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
    

</body>

