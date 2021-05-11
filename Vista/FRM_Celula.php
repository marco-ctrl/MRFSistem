<?php include 'Header.php' ?>

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

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-4 p-3">
                            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                                Registrar Celula
                            </button>
                        </div>

                    </div>
                    <div id="lista" class="row">
                        <div class="col-md-10">
                            <div id="mensaje">
                            </div>
                            <h5 for="">Lista de Celulas</h5>
                            <div class="table-responsive" id="tb_buscar">
                                <table class="table table-hover table-sm">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <td>NOMBRE</td>
                                            <td>NUMERO</td>
                                            <td>DIRECCION</td>
                                            <td>Baja</td>
                                            <td>Modificar</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tb_celula">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div id="formulario">
                        <div class="row">
                            <div class="col-md-4">
                                <form id="form1" clas="p-2">
                                    <div class="form-group">
                                        <label>Nombre de Celula</label>
                                        <input type="text" id="txt_nomCelula" placeholder="Nombre"
                                            class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Numero de Celula</label>
                                        <input type="number" id="txt_numCelula" placeholder="Numero"
                                            class="form-control"></input>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form id="form2" clas="p-2">
                                    <div class="form-group">
                                        <label>Barrio</label>
                                        <select id="cbx_barrio" class="form-control">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Calle</label>
                                        <select id="cbx_calle" class="form-control">

                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div id="map" class="mapas">

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer col-md-8">
                            <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center">
                                <i class="far fa-save"></i>
                                Guardar
                            </button>
                            <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close"></i>
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
    <script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>
    <script src="/MRFIglesiaBermejo/Script/CelulaApp.js"></script>
</body>

