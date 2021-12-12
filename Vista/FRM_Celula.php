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
                        <div class="col-md-4 p-3">
                            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center" title="Registrar Celula"><i class="fas fa-plus-circle"></i>
                                Registrar Celula
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
                                                    <th>DAR_BAJA</th>
                                                    <th>MODIFICAR</th>
                                                    <th>MIEMBROS</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="bg-primary text-white">
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th>NUMERO</th>
                                                    <th>DIRECCION</th>
                                                    <th>DAR_BAJA</th>
                                                    <th>MODIFICAR</th>
                                                    <th>MIEMBROS</th>
                                                </tr>
                                            </tfoot>

                                            <tbody id="tb_celula">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="formulario">
                        <div class="row">
                            <div class="col-md-4">
                                <form id="form1" clas="p-2">
                                    <div class="form-group">
                                        <label>Nombre de Celula</label>
                                        <input type="text" id="txt_nomCelula" placeholder="Nombre" class="form-control"
                                            maxlength="30" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Numero de Celula</label>
                                        <input type="number" id="txt_numCelula" placeholder="Numero"
                                            class="form-control" onkeypress="return soloNumeros(event)"
                                            required></input>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form id="form2" clas="p-2">
                                    <div class="form-group">
                                        <label>Barrio</label>
                                        <input type="text" id="inp_barrio" placeholder="Barrio" list="dat_barrio"
                                            class="form-control" maxlength="30" onkeypress="return Direccion(event)"
                                            required />
                                        <datalist id="dat_barrio">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label>Calle</label>
                                        <input type="text" id="inp_calle" placeholder="Calle" list="dat_calle"
                                            class="form-control" maxlength="30" onkeypress="return Direccion(event)"
                                            required />
                                        <datalist id="dat_calle">
                                        </datalist>
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
                    <?php include 'includes/Celulas/MiembroCelula.php' ?>
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
    <script src="/MRFSistem/Script/CelulaApp.js"></script>
</body>