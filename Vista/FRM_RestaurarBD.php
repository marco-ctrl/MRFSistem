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
                        <h1 class="h3 mb-0 text-gray-800">RESTAURAR BASE DE DATOS</h1>

                    </div>

                    <form enctype="multipart/form-data" id="formRestaurar" method="post" action="#">

                        <div class="mb-3">
                            <label for="formFile">Subir archivo ZIP o SQL:</label>
                            <input type="file" required class="form-control" name="zip_file" accept=".zip,.sql"
                                onchange="validarRestaurarBD()">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Subir y Restaurar" class="btn btn-primary" />
                        </div>

                    </form>

                    <div id="mensaje"></div>
                    <script>
                    function validarRestaurarBD() {
                        // Obtener nombre de archivo
                        let archivo = document.getElementById('archivo').value,
                            // Obtener extensión del archivo
                            extension = archivo.substring(archivo.lastIndexOf('.'), archivo.length);
                        // Si la extensión obtenida no está incluida en la lista de valores
                        // del atributo "accept", mostrar un error.
                        if (document.getElementById('archivo').getAttribute('accept').split(',').indexOf(extension) <
                            0) {
                            alert('Archivo inválido. No se permite la extensión ' + extension);
                        }
                    }
                    </script>

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