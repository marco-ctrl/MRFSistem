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
            <li class="nav-item active">
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
            <?php include_once('includes/EscuelaLideres/interfaces.php'); ?>


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
                        <h1 class="h3 mb-0 text-gray-800">INFORMACION CURSO</h1>
                        <a href="FRM_EscLideres" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-desktop fa-sm text-white-50"></i> Volver Escritorio</a>
                    </div>
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <button type="button" id="btn_reporte" class="btn btn-primary btn-block
                text-center"><i class="fas fa-download"></i>
                                Generar Reporte
                            </button>
                        </div>

                    </div>

                    <div id="lista">
                        <div id="mensaje">
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de cursos</h6>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <form class="d-flex">
                                        <label for="">Gestion</label>
                                        <select name="" id="cbx_gestion" class="form-control" style="width: 20%;">

                                        </select>
                                        <label for="">Materia</label>
                                        <select name="" id="cbx_materia" class="form-control" style="width: 30%;">

                                        </select>
                                        <label for="">Maestro</label>
                                        <div class="input-group mb-3">

                                            <input type="search" class="form-control" id="txt_maestro"
                                                placeholder="Buscar..." list="dat_maestro"></input>
                                            <datalist id="dat_maestro">

                                            </datalist>
                                            <button type="button" class="btn btn-primary" id="btn_busFec"><i
                                                    class="fas fa-search"></i></button>
                                        </div>

                                    </form>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <td>MATERIA</td>
                                                <td>PARALELO</td>
                                                <td>GESTION</td>
                                                <td>MAESTRO</td>
                                                <td>FECHA DE INICIO</td>
                                                <td>DESCRIPCION</td>
                                                <td>VER INFORMACION</td>
                                            </tr>
                                        </thead>
                                        <tfoot class="bg-primary text-white">
                                            <tr>
                                                <td>MATERIA</td>
                                                <td>PARALELO</td>
                                                <td>GESTION</td>
                                                <td>MAESTRO</td>
                                                <td>FECHA DE INICIO</td>
                                                <td>DESCRIPCION</td>
                                                <td>VER INFORMACION</td>
                                            </tr>
                                        </tfoot>
                                        <tbody id="tb_curso">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Footer -->
            <?php include 'Footer.php' ?>

        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include 'LogoutModal.php' ?>

    <?php include 'Scripts.php' ?>
    <script src="/MRFSistem/Script/CodigoApp.js"></script>
    <script src="/MRFSistem/Script/InfoCursoApp.js"></script>
    <script>
    function ValidarEscrituraFecha() {
        if (event.keyCode == 9) {
            // Código para la tecla TAB
            //console.log("Oprimiste la tecla TAB");

        } else {
            return false;
        }
    }
    </script>


</body>