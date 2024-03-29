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

<?php
require_once "../AccesoDatos/Conexion/Conexion.php";
$caja = "";
$fecha;
$consulta = "SELECT *
    FROM `aarqcaj`
    where caestcaj=true";

$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $data = mysqli_fetch_array($resultado);

    $caja = $data['pacodcaj'];
    $fecha=$data['cainicaj'];
}
//echo $caja;
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
                        <h1 class="h3 mb-0 text-gray-800">GESTIONAR INGRESOS</h1>
                        <a href="FRM_Finanzas" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-desktop fa-sm text-white-50"></i> Volver Escritorio</a>
                    </div>
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                                Nuevo Ingreso
                            </button>
                        </div>

                    </div>
                    <div id="lista" class="row">
                        <div class="col-md-12">
                            <div id="dialog" style="display: none;" title="Mensaje">
                                <div style="width: 460px; height: 190px;" id="int_dialog">
                                    <div style="text-align: justify; font-size: 13px; width: 450px;">
                                        <div id="mensaje">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary">Lista de Ingreso Economicos</h5>
                                </div>
                                <div class="card-body">
                                    <form action=# class="row justify-content-center p-1 text-center">
                                        <div class="form-group p-1">
                                            <label>Buscar Desde </label>
                                        </div>
                                        <div class="form-group p-1">
                                            <input type="date" class="form-control" id="dat_inicio"
                                                min="<?php echo $fecha ?>" max="<?php echo date('Y-m-d') ?>"
                                                value="<?php echo $fecha ?>"></input>
                                        </div>
                                        <div class="form-group p-1">
                                            <label>Hasta</label>
                                        </div>
                                        <div class="form-group p-1">
                                            <input type="date" class="form-control" id="dat_maximo"
                                                min="<?php echo $fecha ?>" max="<?php echo date('Y-m-d') ?>"
                                                value="<?php echo date('Y-m-d') ?>"></input>
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
                                                    <th>ITEMS</th>
                                                    <th>CONT. BS</th>
                                                    <th>FECHA</th>
                                                    <th>USUARIO</th>
                                                    <th>MODIFICAR</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="bg-primary text-white">
                                                <tr>
                                                    <th>ITEMS</th>
                                                    <th>CONT. BS</th>
                                                    <th>FECHA</th>
                                                    <th>USUARIO</th>
                                                    <th>MODIFICAR</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="tb_economico">

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
                                        <label>Item</label>
                                        <div class="input-group border-bottom-danger" id="div_tipIng">
                                            <select id="cbx_tipIng" class="form-control">
                                                <option value="0">Seleccionar Item</option>
                                                <option value="DIEZMOS">DIEZMOS</option>
                                                <option value="OFRENDAS">OFRENDAS</option>
                                                <option value="OFRENDA DE CELULAS">OFRENDA DE CELULAS</option>
                                                <option value="OFRENDA DE JOVENES">OFRENDA DE JOVENES</option>
                                                <option value="OFRENDA AYUNO">OFRENDA AYUNO</option>
                                                <option value="OTROS INGRESOS">OTROS INGRESOS</option>
                                            </select>
                                            <span id="chk_tipIng" class="input-group-text text-white bg-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_tipIng" class="text-danger">Completa este campo</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Cantidad de Ingreso</label>
                                        <div class="input-group border-bottom-danger" id="div_cantidad">
                                            <input type="number" id="txt_cantidad" min="0" class="form-control"
                                                aria-label="Dollar amount (with dot and two decimal places)"
                                                placeholder="Cantidad en Bs">
                                            <span class="input-group-text">Bs.</span>
                                            <span id="chk_cantidad" class="input-group-text text-white bg-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_cantidad" class="text-danger">Completa este campo</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Fecha de Ingreso</label>
                                        <input type="date" class="form-control" id="dat_ingreso"
                                            max="<?php echo date('Y-m-d'); ?>"
                                            onkeydown="return ValidarEscrituraFecha()"></input>

                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Registro</label>
                                        <input type="date" class="form-control" id="dat_aporte" disabled></input>
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-5">
                                <form id="form2" clas="p-2">
                                    <div class="form-group">
                                        <label>Hora de Registro</label>
                                        <input type="datetime" class="form-control" id="hor_aporte" disabled></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Codigo Usuario</label>
                                        <input type="text" class="form-control" id="txt_codUsuario"
                                            value="<?php echo $_SESSION['pacodusu']; ?>" disabled></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input type="text" class="form-control" id="txt_usuario"
                                            value="<?php echo $_SESSION['canommie'] . " " . $_SESSION['capatmie'] . " " . $_SESSION['camatmie']; ?>"
                                            disabled></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Codigo Caja</label>
                                        <input type="text" class="form-control" id="txt_codCaja"
                                            value="<?php echo $caja; ?>" disabled></input>
                                    </div>
                                </form>
                            </div>


                        </div>

                        <div class="modal-footer col-md-10">
                            <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center" title="Llene los campos requeridos">
                                <i class="far fa-save ListarIngresos"></i>
                                Guardar
                            </button>
                            <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close ListarIngresos"></i>
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
    <script src="/MRFSistem/Script/Ingresos.js"></script>
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