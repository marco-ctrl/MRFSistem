<?php include 'Header.php' ?>

<body id="page-top">
    <!-- Div cargando -->
    <?php include 'Cargando.php'; 
    if ($_SESSION['catipusu'] == 'DIRECTOR') {
        header('location: FRM_EscLideres.php');
    }
    if ($_SESSION['catipusu'] == 'SECRETARIO') {
        header('location: FRM_EscLideres.php');
    }
    if ($_SESSION['catipusu'] == 'TESORERO') {
        header('location: FRM_Finanzas.php');
    }
    if ($_SESSION['catipusu'] == 'LIDER') {
        header('location: FRM_LiderCelula.php');
    }
    ?>
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
                        <div class="col-md-4 p-3">
                            <button type="button" id="btn_reporte" class="btn btn-primary btn-block
                text-center" title="Registrar Celula"><i class="fas fa-download"></i>
                                Generar Reporte
                            </button>
                        </div>

                    </div>
                    <div id="lista" class="row">
                        <div class="col-md-12">
                            <div id="mensaje">
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary">Lista de Celulas</h5>
                                </div>
                                <div class="card-body">
                                    <form action=# class="row text-center">
                                        <div class="input-group mb-3 col-6">
                                            <input type="text" class="form-control" id="buscarCelula"
                                                placeholder="Buscar..."></input>
                                            <button class="btn btn-primary" id="btn_busFec"><i class="fas fa-search"
                                                    tittle="buscar"></i></button>
                                        </div>

                                    </form>

                                    <div class="table-responsive">
                                        <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th>NUMERO</th>
                                                    <th>DIRECCION</th>
                                                    <th>LIDER</th>
                                                    <th>NUMERO CONT.</th>
                                                    <th>VER INFORMACION</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="bg-primary text-white">
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th>NUMERO</th>
                                                    <th>DIRECCION</th>
                                                    <th>LIDER</th>
                                                    <th>NUMERO CONT.</th>
                                                    <th>VER INFORMACION</th>
                                                </tr>
                                            </tfoot>

                                            <tbody id="tb_infoCelula">

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
    <script src="/MRFSistem/Script/InfoCelulaApp.js"></script>
    <script src="/MRFSistem/Script/MiecelApp.js"></script>
    <script src="/MRFSistem/Script/Validacion.js"></script>
</body>