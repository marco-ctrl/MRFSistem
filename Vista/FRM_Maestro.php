<?php include 'Header.php'; 
if ($_SESSION['catipusu'] == 'TESORERO') {
    header('location: FRM_Finanzas.php');
}
if ($_SESSION['catipusu'] == 'LIDER') {
    header('location: FRM_LiderCelula.php');
}
?>

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

            <!-- Divider -->


            <!-- Heading -->
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
                        <h1 class="h3 mb-0 text-gray-800">GESTIONAR MAESTROS</h1>
                        <a href="FRM_EscLideres" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-desktop fa-sm text-white-50"></i> Volver Escritorio</a>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button id="btn_nuevo" class="btn btn-primary btn-block">
                                    <i class="fas fa-user-plus"></i> Agregar Maestro</button>
                            </div>
                        </div>


                    </div>
                    <div id="mensaje">
                    </div>

                    <div id="formulario">

                        <div class="row">
                            <div class="col-md-4">
                                <form id="form2" class="p-2">
                                    <div class="form-group">
                                        <div class="input-group border-bottom-danger" id="div_miembro">
                                            <label for="exampleSelect2">Buscar Miembro</label>
                                            <button type="button" id="btn_miembro" class="btn btn-primary btn-block"
                                                data-toggle="modal" data-target="#idModal">
                                                <i class="fas fa-search-plus"></i> Buscar Miembro
                                            </button>
                                        </div>
                                        <span id="val_miembro" class="text-danger">Seleccione un Miembro</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect2">Codigo de Miembro</label>
                                        <input type="text" id="txt_codigo" class="form-control" placeholder="Codigo"
                                            disabled></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect2">Miembro</label>
                                        <input type="text" id="txt_miembro" class="form-control" placeholder="Miembro"
                                            disabled>
                                        </input>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 p-2">
                                <form id="form1">
                                    <div class="form-group">
                                        <label>Carnet de Identidad</label>
                                        <input type="text" id="txt_ci" class="form-control"
                                            placeholder="Carnet de Identidad" disabled>
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <label>Direccion</label>
                                        <input type="text" id="txt_direccion" placeholder="Direccion"
                                            class="form-control" disabled></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Numero de Contacto</label>
                                        <input type="text" id="txt_numContacto" placeholder="Numero de Contacto"
                                            class="form-control" disabled></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer col-md-8">
                            <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center" title="Llene todos los campos requeridos">
                                <i class="far fa-save "></i>
                                Guardar
                            </button>
                            <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close "></i>
                                Cancelar
                            </button>

                        </div>
                        <div class="modal fade" id="idModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Buscar Miembro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="search" id="txt_buscarMiembro" class="form-control mr-ms-2"
                                                placeholder="Buscar Miembro">
                                        </div>
                                        <div id="mensaje1">
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <td>NOMBRE</td>
                                                        <td>APELLIDO</td>
                                                        <td>FUNCION</td>
                                                        <td>SELECCIONAR</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="tb_miembro">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            <i class="fas fa-window-close "></i> Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="lista">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de Maestros</h6>
                            </div>
                            <div class="card-body">
                                <div class="col-md-5">
                                    <form class="row p-1 text-center">
                                        <div class="input-group mb-3">
                                            <input type="text" id="txt_buscarMaestro" class="form-control"
                                                placeholder="Buscar Maestro..." aria-label="Recipient's username"
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
                                                <td>CI</td>
                                                <td>NOMBRE</td>
                                                <td>APELLIDO</td>
                                                <td>DIRECCION</td>
                                                <td>NUM CONTACTO</td>
                                                <td>BAJA</td>
                                            </tr>
                                        </thead>
                                        <tfoot class="bg-primary text-white">
                                            <tr>
                                                <td>CI</td>
                                                <td>NOMBRE</td>
                                                <td>APELLIDO</td>
                                                <td>DIRECCION</td>
                                                <td>NUM CONTACTO</td>
                                                <td>BAJA</td>
                                            </tr>
                                        </tfoot>
                                        <tbody id="tb_maestro">

                                        </tbody>
                                    </table>
                                </div>
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
    <script src="/MRFSistem/Script/MaestroApp.js"></script>


</body>