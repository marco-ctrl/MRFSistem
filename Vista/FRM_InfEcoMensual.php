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
    <?php include 'Cargando.php'?>

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
                <?php include 'NavBar.php'?>

                <div class="container-fluid" id="finanzas">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">INFORME ECONOMICO MENSUAL</h1>
                        <a href="FRM_Finanzas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-home fa-sm text-white-50"></i> Volver Escritorio</a>
                    </div>

                    <!--row content-->
                    <div id="lista" class="row">
                        <div class="col-md-12">
                            <div id="mensaje">
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary">Lista Arqueo de Caja</h5>
                                </div>
                                <div class="card-body">
                                    <form action=# class="row justify-content-center p-1 text-center">
                                        <div class="form-group p-1">
                                            <label>Buscar Desde </label>
                                        </div>
                                        <div class="form-group p-1">
                                            <input type="date" class="form-control" id="dat_inicio"
                                                value="<?php echo date('Y-m-d');?>"></input>
                                        </div>
                                        <div class="form-group p-1">
                                            <label>Hasta</label>
                                        </div>
                                        <div class="form-group p-1">
                                            <input type="date" class="form-control" id="dat_maximo"
                                                value="<?php echo date('Y-m-d');?>"
                                                max="<?php echo date('Y-m-d');?>"></input>
                                            <!--value="<?php //echo date('Y-m-d');?>"-->
                                        </div>
                                        <div class="form-group p-1">
                                            <button class="form-control btn-primary" id="btn_busFec"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </form>

                                    <div class="table-responsive">
                                        <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>CODIGO</th>
                                                    <th>FEC. APERTURA</th>
                                                    <th>MON. INICIAL</th>
                                                    <th>TOT. INGRESOS</th>
                                                    <th>TOT. EGRESOS</th>
                                                    <th>FEC. CIERRE</th>
                                                    <th>MON. FINAL</th>
                                                    <th>ESTADO</th>
                                                    <th>GERERAR</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="bg-primary text-white">
                                                <tr>
                                                    <th>CODIGO</th>
                                                    <th>FEC. APERTURA</th>
                                                    <th>MON. INICIAL</th>
                                                    <th>TOT. INGRESOS</th>
                                                    <th>TOT. EGRESOS</th>
                                                    <th>FEC. CIERRE</th>
                                                    <th>MON. FINAL</th>
                                                    <th>ESTADO</th>
                                                    <th>GERERAR</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="tb_informe">

                                            </tbody>
                                        </table>
                                    </div>
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
    <script src="/MRFSistem/ReportesPDF/Script/InformeEconomicoMensual.js"></script>

</body>