<?php include 'Header.php'; 
    
    if($_SESSION['catipusu']=='SECRETARIO'){
        header('location: FRM_EscLideres.php');
      }
      if($_SESSION['catipusu']=='TESORERO'){
        header('location: FRM_Finanzas.php');
      }
?>

<body id="page-top">

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
    <script src="/MRFSistem/Script/App.js"></script>
</body>