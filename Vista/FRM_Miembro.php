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
                            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                                    text-center"><i class="fas fa-plus-circle"></i> Agregar Miembro
                            </button>
                        </div>
                    </div>
                    <div id="App" class="row">
                        <div class="col-md-12">
                            <div id="mensaje">

                            </div>
                            <div class="" id="home">
                                <?php include 'Miembro/ListMiembro.php' ?>
                            </div>
                            <div class="" id="profile">
                                <?php include 'Miembro/RegMiembro.php' ?>
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
    <script src="/MRFSistem/Script/MiembroApp.js"></script>
    
    <script src="/MRFSistem/Script/Validacion.js"></script>
    
</body>