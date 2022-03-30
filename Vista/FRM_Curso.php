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
                        <h1 class="h3 mb-0 text-gray-800">GESTIONAR CURSO</h1>
                        <a href="FRM_EscLideres" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-desktop fa-sm text-white-50"></i> Volver Escritorio</a>
                    </div>
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                                Registrar Curso
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
                                <div class="col-md-5">
                                    <form class="row p-1 text-center">
                                        <div class="input-group mb-3">
                                            <input type="text" id="txt_buscarCurso" class="form-control" placeholder="Buscar Curso..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-search fa-sm"></i></button>
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
                                                <td>DAR BAJA</td>
                                                <td>MODIFICAR</td>
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
                                                <td>DAR BAJA</td>
                                                <td>MODIFICAR</td>
                                            </tr>
                                        </tfoot>
                                        <tbody id="tb_curso">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="formulario">
                        <div class="col-md-5">
                            <form id="form1" clas="p-2">
                                <div class="form-group">
                                    <label>Materia</label>
                                    <div class="input-group border-bottom-danger" id="div_materia">
                                        <select id="cbx_materia" class="form-control">

                                        </select>
                                        <span id="chk_materia" class="input-group-text text-white bg-danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    </div>
                                    <span id="val_materia" class="text-danger">Completa este campo</span>
                                </div>
                                <div class="form-group">
                                    <label>Paralelo</label>
                                    <div class="input-group border-bottom-danger" id="div_paralelo">
                                        <select id="cbx_paralelo" class="form-control">
                                            <option value="0">Paralelo</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                        <span id="chk_paralelo" class="input-group-text text-white bg-danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    </div>
                                    <span id="val_paralelo" class="text-danger">Completa este campo</span>
                                </div>
                                <div class="form-group">
                                    <label>Gestion</label>
                                    <select id="txt_gestion" class="form-control">
                                        <?php
                                        $gestion = Date('Y');
                                        for ($i = 0; $i < 5; $i++) {
                                            echo '<option value="' . $gestion . '">' . $gestion . '</option>';
                                            $gestion = $gestion - 1;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fecha de Inicio</label>
                                    <input type="date" id="dat_fecini" min="<?php echo date('Y-m-d') ?>" placeholder="" class="form-control" value="<?php echo date('Y-m-d') ?>" onkeydown="return ValidarEscrituraFecha()"></input>
                                </div>
                                <br>

                                <div class="modal fade" id="idModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Seleccionar Maestro</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="search" id="txt_buscarMiembro" class="form-control mr-ms-2" placeholder="Buscar Maestro">
                                                </div>
                                                <div id="mensaje1">
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-sm">
                                                        <thead class="bg-primary text-white">
                                                            <tr>
                                                                <td>NOMBRE</td>
                                                                <td>APELLIDO</td>
                                                                <td style="width:15%">SELECCIONAR</td>
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
                            </form>
                        </div>
                        <div class="col-md-5">
                            <form id="form2" clas="p-2">
                                <div class="form-group">
                                    <label for="exampleSelect2">Seleccionar Maestro</label>
                                    <button type="button" id="btn_miembro" class="btn btn-primary btn-block" data-toggle="modal" data-target="#idModal">
                                        <i class="fas fa-search-plus"></i> Seleccionar Maestro
                                    </button>
                                </div>
                                <div class="form-group">
                                    <label>Maestro</label>
                                    <div class="input-group border-bottom-danger" id="div_maestro">
                                        <input type="text" id="txt_maestro" placeholder="Maestro" class="form-control" value="" disabled></input>
                                        <span id="chk_maestro" class="input-group-text text-white bg-danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    </div>
                                    <span id="val_maestro" class="text-danger">Selecciona un Maestro</span>
                                </div>
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <div class="input-group border-bottom-danger" id="div_descripcion">
                                        <textarea class="form-control" id="txt_descripcion" placeholder="Descripcion" rows="3"></textarea>
                                        <span id="chk_descripcion" class="input-group-text text-white bg-danger">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    </div>
                                    <span id="val_descripcion" class="text-danger">Completa este campo</span>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer col-md-10">
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
    <script src="/MRFSistem/Script/CursoApp.js"></script>
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