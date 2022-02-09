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
                                        <label for="">Materia</label>
                                        <div class="input-group border-bottom-danger" id="div_contenido">
                                            <input type="text" id="txt_contenido" placeholder="Nombre de Materia"
                                                class="form-control" onkeyup="this.value=textoDireccion(this.value)"></input>
                                            <span id="chk_contenido" class="input-group-text text-white bg-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_contenido" class="text-danger">Completa este campo</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripcion</label>
                                        <div class="input-group border-bottom-danger" id="div_descripcion">
                                            <textarea class="form-control" id="txt_descripcion"
                                                placeholder="Descripcion" rows="3" onkeyup="this.value=textoDireccion(this.value)"></textarea>
                                            <span id="chk_descripcion" class="input-group-text text-white bg-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_descripcion" class="text-danger">Completa este campo</span>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
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