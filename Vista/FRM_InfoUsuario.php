<?php include 'Header.php' ?>

<body id="page-top">
    <!-- Div cargando -->
    <?php include 'Cargando.php' ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'SideBar.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Top Bar -->
                <?php include 'NavBar.php' ?>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button id="btn_reporte" class="btn btn-primary btn-block">
                                    <i class="fas fa-download"></i> Generar Reporte</button>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="lista">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h5>
                                </div>
                                <div class="card-body">
                                    <form action=# class="d-flex">
                                        <label for="">Rol de Usuario </label>
                                        <select name="" id="rolUsuario" class="btn-primary form-control">
                                            <option value="TODO">TODO</option>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="TESORERO">TESORERO</option>
                                            <option value="SECRETARIO">SECRETARIO</option>
                                            <option value="DIRECTOR">DIRECTOR</option>
                                            <option value="LIDER">LIDER</option>
                                        </select>
                                        <div class="input-group mb-3 col-8">

                                            <input type="search" class="form-control" id="buscarUsuario"
                                                placeholder="Buscar..." list="dat_buscar"></input>
                                            <datalist id="dat_buscar">

                                            </datalist>
                                            <button class="btn btn-primary" id="btn_busFec"><i
                                                    class="fas fa-search"></i></button>
                                        </div>

                                    </form>

                                    <div class="table-responsive">
                                        <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>MIEMBRO</th>
                                                    <th>ROL</th>
                                                    <th>USUARIO</th>
                                                    <th>VER INFORMACION</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="bg-primary text-white">
                                                <tr>
                                                    <th>MIEMBRO</th>
                                                    <th>ROL</th>
                                                    <th>USUARIO</th>
                                                    <th>VER INFORMACION</th>
                                                </tr>
                                            </tfoot>

                                            <tbody id="tb_infoUsuario">

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
    <script src="/MRFSistem/Script/CodigoApp.js"></script>
    <script src="/MRFSistem/Script/infoUsuarioApp .js"></script>
</body>