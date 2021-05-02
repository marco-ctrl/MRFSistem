<?php
session_start();
  
if(empty($_SESSION['active'])){
  header('location: ../');
}

?>

<head>
    <title>MRFSistem</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <?php 
        include 'Estilos.php';
    ?>
    <?php 
        include 'Scripts.php';
    ?>
</head>
<?php include 'NavBar.php' ?>

<div class="d-flex toggled" id="wrapper">

    <!-- Sidebar -->
    <?php include 'SideBar.php' ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" class="">
        <div class="p-2 container container-fluid">
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
    <!-- /#page-content-wrapper -->

</div>
<div class=" p-2 container">

</div>

<br>
<script src="/MRFSistem/Script/CodigoApp.js"></script>

<script src="/MRFSistem/Script/MiembroApp.js"></script>
<br>
<br>