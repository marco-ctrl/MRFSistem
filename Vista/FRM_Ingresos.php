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
                        <a class="collapse-item" href="FRM_Ingresos"><i class="fas fa-donate"></i>
                            Ingresos</a>
                        <a class="collapse-item" href="FRM_Egresos"><i class="fas fa-hand-holding-usd"></i> Egresos</a>
                        <a class="collapse-item" href="FRM_EgresosFijo"><i class="fas fa-columns"></i> Items de Egresos</a>

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
                        <a class="collapse-item" href="#"><i class="far fa-file-pdf"></i> Informacion Alumno</a>
                        <a class="collapse-item" href="#"><i class="far fa-file-pdf"></i> Control de Pago</a>
                        <a class="collapse-item" href="#"><i class="far fa-file-pdf"></i> Control de Asistencia</a>

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
                            <div id="mensaje">
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
                                                value="2010-12-12"></input>
                                        </div>
                                        <div class="form-group p-1">
                                            <label>Hasta</label>
                                        </div>
                                        <div class="form-group p-1">
                                            <input type="date" class="form-control" id="dat_maximo"></input>
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
                                        <select id="cbx_tipIng" class="form-control">
                                            <option value="0">Seleccionar Item</option>
                                            <option value="DIEZMOS">DIEZMOS</option>
                                            <option value="OFRENDAS">OFRENDAS</option>
                                            <option value="OFRENDA DE CELULAS">OFRENDA DE CELULAS</option>
                                            <option value="OFRENDA DE JOVENES">OFRENDA DE JOVENES</option>
                                            <option value="OFRENDA AYUNO">OFRENDA AYUNO</option>
                                            <option value="OTROS INGRESOS">OTROS INGRESOS</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Cantidad de Ingreso</label>
                                        <div class="input-group">
                                            <input type="number" id="txt_cantidad" min="0" class="form-control"
                                                aria-label="Dollar amount (with dot and two decimal places)">
                                            <span class="input-group-text">Bs.</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Fecha de Ingreso</label>
                                        <input type="date" class="form-control" id="dat_ingreso"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Registro</label>
                                        <input type="date" class="form-control" id="dat_aporte" disabled></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Hora de Registro</label>
                                        <input type="datetime" class="form-control" id="hor_aporte" disabled></input>
                                    </div>

                                    <br>

                                </form>
                            </div>
                            <div class="col-md-5">
                                <form id="form2" clas="p-2">
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
                                </form>
                            </div>


                        </div>

                        <div class="modal-footer col-md-10">
                            <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center">
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


</body>