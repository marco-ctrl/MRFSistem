<?php include 'Header.php';
if ($_SESSION['catipusu'] == 'DIRECTOR') {
    header('location: FRM_EscLideres.php');
}
if ($_SESSION['catipusu'] == 'SECRETARIO') {
    header('location: FRM_EscLideres.php');
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
            <?php include_once 'includes/ControlFinanzas/interfaces.php' ?>

            
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

                <div class="container-fluid" id="finanzas">
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                                Nuevo Item
                            </button>
                        </div>

                    </div>
                    <div id="lista" class="row">
                        <div class="col-md-12">
                            <div id="mensaje">
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary">Lista de Items de Egresos</h5>
                                </div>
                                <div class="card-body">
                                    <form action=# class="row text-center">
                                        <div class="input-group mb-3 col-6">
                                            <input type="text" class="form-control" id="buscarItem"
                                                placeholder="Buscar.."></input>
                                            <button class="btn btn-primary" id="btn_busFec"><i
                                                    class="fas fa-search"></i></button>
                                        </div>

                                    </form>

                                    <div class="table-responsive">
                                        <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>CODIGO</th>
                                                    <th>DESCRIPCION</th>
                                                    <th>CANTIDA Bs.</th>
                                                    <th>TIPO</th>
                                                    <th>BAJA</th>
                                                    <th>MODIFICAR</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="bg-primary text-white">
                                                <tr>
                                                    <th>CODIGO</th>
                                                    <th>DESCRIPCION</th>
                                                    <th>CANTIDA Bs.</th>
                                                    <th>TIPO</th>
                                                    <th>BAJA</th>
                                                    <th>MODIFICAR</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="tb_items">

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
                                <form id="form1" clas="p-2">
                                    <div class="form-group">
                                        <label>Tipo de Item</label>
                                        <div class="input-group border-bottom-danger" id="div_tipItem">
                                            <select id="cbx_tipItem" class="form-control">
                                                <option value="0">Seleccionar Tipo de Item</option>
                                                <option value="EFECTIVO">EFECTIVO</option>
                                                <option value="PORCENTUAL">PORCENTUAL</option>
                                            </select>
                                            <span id="chk_tipItem" class="input-group-text text-white bg-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_tipItem" class="text-danger">Completa este campo</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Cantidad</label>
                                        <div class="input-group border-bottom-danger" id="div_cantidad">
                                            <input type="number" id="txt_cantidad" min="0" class="form-control"
                                                aria-label="Dollar amount (with dot and two decimal places)"
                                                placeholder="Cantidad">

                                            <span id="chk_cantidad" class="input-group-text text-white bg-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_cantidad" class="text-danger">Completa este campo</span>

                                    </div>

                                    <div class="form-group">
                                        <label>Descripcion</label>
                                        <div class="input-group border-bottom-danger" id="div_descripcion">
                                            <textarea type="text" class="form-control" id="txt_descripcion"
                                                placeholder="Descripcion"></textarea>
                                            <span id="chk_descripcion" class="input-group-text text-white bg-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_descripcion" class="text-danger">Completa este campo</span>
                                    </div>
                                    <br>

                                </form>
                            </div>



                        </div>

                        <div class="modal-footer col-md-10">
                            <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center">
                                <i class="far fa-save"></i>
                                Guardar
                            </button>
                            <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close"></i>
                                Cancelar
                            </button>
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
    <script src="/MRFSistem/Script/EgresosFijos.js"></script>


</body>