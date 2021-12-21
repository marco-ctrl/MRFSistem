<?php include 'Header.php'; 
    
    if($_SESSION['catipusu']=='SECRETARIO'){
        header('location: FRM_EscLideres.php');
      }
      if($_SESSION['catipusu']=='TESORERO'){
        header('location: FRM_Finanzas.php');
      }
?>

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

                <div class="container-fluid" id="trabajo">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">MRFSISTEM</h1>

                    </div>

                    <!--row content-->
                    <div class="row">
                        <!--  Acceso directo a las Actividades -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Miembro" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Modulos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">MIEMBROS</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Usuario" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Modulos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">USUARIOS</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Celula" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Modulos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">CELULAS</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-home fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Finanzas" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Modulos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">CONTROL DE FINANZAS
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-invoice-dollar fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_EscLideres" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Modulos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">ESCUELA DE LIDERES
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-school fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="FRM_Mapa" class="collapse-item" style="text-decoration:none">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Modulos:</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">MAPA CELULAS
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-map-marked fa-2x text-gray-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
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

</body>