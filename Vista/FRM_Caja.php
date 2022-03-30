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
            <!-- <div class="text-center d-none d-md-inline"> -->
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
                        <h1 class="h3 mb-0 text-gray-800">ARQUEO DE CAJA</h1>
                        <a href="FRM_Finanzas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-home fa-sm text-white-50"></i> Volver Escritorio</a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Aperturar Caja</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Fecha de Apertura</label>
                                        <input type="date" class="form-control" id="dat_caja"
                                            value="<?php echo date('Y-m-d'); ?>" disabled></input>
                                    </div>

                                    <div class="form-group">
                                        <label>Monto Inicial</label>
                                        <input type="text" id="txt_monini" min="0" placeholder="Monto Inicial en BS."
                                            class="form-control" readonly></input>
                                        <span id="val_monini" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btn_aperturar" class="btn btn-primary">Aperturar</button>
                                    <button type="button" id="btn_cancelarApe" class="btn btn-danger"
                                        data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--row content-->
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <button type="button" id="btn_nuevo" class="btn btn-primary text-center btn-block"><i
                                    class="fas fa-plus-circle"></i>
                                Aperturar Caja
                            </button>
                            <input type="text" id="txt_codCajero" value="<?php echo $_SESSION['pacodusu'] ?>"
                                hidden></input>
                        </div>

                    </div>
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
                                                value="<?php echo date('Y-m-d');?>"
                                                onkeydown="return ValidarEscrituraFecha()"></input>
                                        </div>
                                        <div class="form-group p-1">
                                            <label>Hasta</label>
                                        </div>
                                        <div class="form-group p-1">
                                            <input type="date" class="form-control" id="dat_maximo"
                                                value="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>"
                                                onkeydown="return ValidarEscrituraFecha()"></input>
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
                                                    <th>CERRAR</th>
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
                                                    <th>CERRAR</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="tb_caja">

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
                                        <label>Fecha de Apertura</label>
                                        <input type="date" class="form-control" id="dat_inicaja" disabled></input>
                                    </div>

                                    <div class="form-group">
                                        <label>Monto Inicial</label>
                                        <div class="input-group">
                                            <input type="text" id="txt_moninicial" min="0" class="form-control"
                                                aria-label="Dollar amount (with dot and two decimal places)" disabled>
                                            <span class="input-group-text">Bs.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Ingresos</label>
                                        <div class="input-group">
                                            <input type="text" id="txt_toting" min="0" class="form-control"
                                                aria-label="Dollar amount (with dot and two decimal places)" disabled>
                                            <span class="input-group-text">Bs.</span>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-5">
                                <form id="form1" clas="p-2">
                                    <div class="form-group">
                                        <label>Total Egresos</label>
                                        <div class="input-group">
                                            <input type="text" id="txt_totegr" min="0" class="form-control"
                                                aria-label="Dollar amount (with dot and two decimal places)" disabled>
                                            <span class="input-group-text">Bs.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Monto Final</label>
                                        <div class="input-group">
                                            <input type="text" id="txt_monfin" min="0" class="form-control"
                                                aria-label="Dollar amount (with dot and two decimal places)" disabled>
                                            <span class="input-group-text">Bs.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Cierre</label>
                                        <input type="date" class="form-control" id="dat_fincaja"
                                            value="<?php echo date('Y-m-d');?>" disabled></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-11">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary">Detalles de Ingresos y Egresos</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Detalle Ingresos</h5>
                                            <div class="table-responsive">
                                                <table class="table table-light" id="tb_ingresos" width="100%"
                                                    cellspacing="0">
                                                    <thead class="bg-primary text-white">
                                                        <tr>
                                                            <th>ITEMS</th>
                                                            <th>MONTO Bs.</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot class="bg-primary text-white" id="tf_ingresos">

                                                    </tfoot>
                                                    <tbody id="tb_detIngresos">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Detalle Egresos</h5>
                                            <div class="table-responsive">
                                                <table class="table table-light" id="tb_egresos" width="100%"
                                                    cellspacing="0">
                                                    <thead class="bg-primary text-white">
                                                        <tr>
                                                            <th>ITEMS</th>
                                                            <th>MONTO Bs.</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot class="bg-primary text-white" id="tf_egresos">

                                                    </tfoot>
                                                    <tbody id="tb_detEgresos">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div>


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
    <script src="/MRFSistem/Script/Caja.js"></script>
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