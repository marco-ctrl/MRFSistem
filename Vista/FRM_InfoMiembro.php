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
                    <div class="col-md-4 p-2">
                        <div>
                            <button type="button" id="btn_reporte" class="btn btn-primary btn-block
                                    text-center"><i class="fas fa-download"></i> Generar Reporte
                            </button>
                        </div>
                    </div>
                    <div id="App" class="row">
                        <div class="col-md-12">
                            <div id="mensaje">

                            </div>
                            <div class="" id="home">
                                <div class="row">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h5 class="m-0 font-weight-bold text-primary">Lista de Miembros</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form action=# class="d-flex">
                                                        <label for="">Buscar por </label>
                                                        <select name="" id="tipoBusqueda"
                                                            class="btn-primary form-control">
                                                            <option value="TODO">TODO</option>
                                                            <option value="NOMBRE">NOMBRE</option>
                                                            <option value="APELLIDO PATERNO">APELLIDO PATERNO</option>
                                                            <option value="APELLIDO MATERNO">APELLIDO MATERNO</option>
                                                            <option value="PROFESION">PROFESION</option>
                                                            <option value="CELULA">CELULA</option>
                                                            <option value="FUNCION">FUNCION</option>
                                                        </select>
                                                        <div class="input-group mb-3 col-8">

                                                            <input type="search" class="form-control" id="buscarMiembro"
                                                                placeholder="Buscar..." list="dat_buscar"></input>
                                                            <datalist id="dat_buscar">

                                                            </datalist>
                                                            <button class="btn btn-primary" id="btn_busFec"><i
                                                                    class="fas fa-search"></i></button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>


                                            <div class="table-responsive">
                                                <table class="table table-light" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead class="bg-primary text-white">
                                                        <tr>
                                                            <th>CARNET IDENTIDAD</th>
                                                            <th>NOMBRE</th>
                                                            <th>APELLIDO</th>
                                                            <th>NUMERO DE CONTACTO</th>
                                                            <th>PROFESION</th>
                                                            <th>CELULA</th>
                                                            <th>FUNCION</th>
                                                            <th>VER INFORMACION</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot class="bg-primary text-white">
                                                        <tr>
                                                        <th>CARNET IDENTIDAD</th>
                                                            <th>NOMBRE</th>
                                                            <th>APELLIDO</th>
                                                            <th>NUMERO DE CONTACTO</th>
                                                            <th>PROFESION</th>
                                                            <th>CELULA</th>
                                                            <th>FUNCION</th>
                                                            <th>VER INFORMACION</th>
                                                        </tr>
                                                    </tfoot>

                                                    <tbody id="tb_infoMiembro">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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

    <!-- Page level custom scripts -->
    <script src="/MRFSistem/Script/CodigoApp.js"></script>
    <script src="/MRFSistem/Script/infoMiembroApp.js"></script>

    <script src="/MRFSistem/Script/Validacion.js"></script>

</body>