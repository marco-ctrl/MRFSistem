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
                        <a class="collapse-item" href="ControlPago" href="#"><i class="far fa-file-pdf"></i> Control de
                            Pago</a>
                        <a class="collapse-item" href="ControlAsistencia" href="#"><i class="far fa-file-pdf"></i>
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
                        <h1 class="h3 mb-0 text-gray-800">GESTIONAR MATERIA</h1>
                        <a href="FRM_EscLideres" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-desktop fa-sm text-white-50"></i> Volver Escritorio</a>
                    </div>
                    <div class="row">
                        <div class="col-md-4 p-2">
                            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                                Agregar Materia
                            </button>
                        </div>

                    </div>
                    <div id="lista">
                        <div class="">
                            <div id="mensaje" class="col-6">
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Lista de Materias</h6>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-5">
                                        <form class="row p-1 text-center">
                                            <div class="input-group mb-3">
                                                <input type="text" id="txt_buscarMat" class="form-control"
                                                    placeholder="Buscar Materia..." aria-label="Recipient's username"
                                                    aria-describedby="button-addon2">
                                                <button class="btn btn-primary" type="button" id="button-addon2"><i
                                                        class="fas fa-search fa-sm"></i></button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <td>CODIGO</td>
                                                    <td>MATERIA</td>
                                                    <td>DESCRIPCION</td>
                                                    <td>DAR BAJA</td>
                                                    <td>MODIFICAR</td>
                                                </tr>
                                            </thead>
                                            <tfoot class="bg-primary text-white">
                                                <tr>
                                                    <td>CODIGO</td>
                                                    <td>MATERIA</td>
                                                    <td>DESCRIPCION</td>
                                                    <td>DAR BAJA</td>
                                                    <td>MODIFICAR</td>
                                                </tr>
                                            </tfoot>
                                            <tbody id="tb_contenido">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="formulario">
                        <div class="row">
                            <div class="col-md-5">
                                <form id="form" clas="p-2">
                                    <div class="form-group">
                                        <input type="text" id="txt_contenido" placeholder="Nombre de Contenido"
                                            class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="txt_descripcion" placeholder="Descripcion"
                                            rows="3"></textarea>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center">
                                            <i class="far fa-save "></i>
                                            Guardar
                                        </button>
                                        <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close "></i>
                                            Cancelar
                                        </button>
                                    </div>
                                </form>
                            </div>

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
    <script src="/MRFSistem/Script/CodigoApp.js"></script>
    <script src="/MRFSistem/Script/ContenidoApp.js"></script>


</body>

<?php