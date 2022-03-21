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
                                    <form class="row text-center">
                                        <div class="input-group mb-3 col-6">
                                            <input type="text" class="form-control" id="buscarCelula"
                                                placeholder="Buscar..."></input>
                                            <button type="button" class="btn btn-primary" id="btn_busFec"><i
                                                    class="fas fa-search" title="buscar"></i></button>
                                        </div>

                                    </form>

                                    <div class="table-responsive">
                                        <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th>NUMERO</th>
                                                    <th>DIRECCION</th>
                                                    <th ALIGN="CENTER" colspan="4">ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="bg-primary text-white">
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th>NUMERO</th>
                                                    <th>DIRECCION</th>
                                                    <th ALING="CENTER" colspan="4">ACCIONES</th>

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
                                        <div class="input-group border-bottom-danger" id="div_nomCelula">
                                            <input type="text" id="txt_nomCelula" placeholder="Nombre de Celula"
                                                class="form-control" maxlength="30" required
                                                onkeyup="this.value=soloTexto(this.value);" style="width: 80%;"></input>
                                            <span id="chk_nomCelula" class="input-group-text bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_nomCelula" class="text-danger">Completa este campo</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Numero de Celula</label>
                                        <div class="input-group border-bottom-danger" id="div_numCelula">
                                            <input type="number" id="txt_numCelula" placeholder="Numero"
                                                class="form-control" onkeyup="this.value=soloNumeros(this.value);"
                                                required style="width: 80%;"></input>
                                            <span id="chk_numCelula" class="input-group-text bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_numCelula" class="text-danger">Completa este campo</span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form id="form2" clas="p-2">
                                    <div class="form-group">
                                        <label>Barrio</label>
                                        <div class="input-group border-bottom-danger" id="div_barrio">
                                            <input type="text" id="inp_barrio" placeholder="Barrio" list="dat_barrio"
                                                class="form-control" maxlength="30"
                                                onkeyup="this.value=textoDireccion(this.value);" required
                                                style="width: 80%;" />
                                            <datalist id="dat_barrio">
                                            </datalist>
                                            <span id="chk_barrio" class="input-group-text bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_barrio" class="text-danger">Completa este campo</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Calle</label>
                                        <div class="input-group border-bottom-danger" id="div_calle">
                                            <input type="text" id="inp_calle" placeholder="Calle" list="dat_calle"
                                                class="form-control" maxlength="30"
                                                onkeyup="this.value=textoDireccion(this.value);" required
                                                style="width: 80%;" />
                                            <datalist id="dat_calle">
                                            </datalist>
                                            <span id="chk_calle" class="input-group-text bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_calle" class="text-danger">Completa este campo</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div id="div_mapa" class="col-md-8 border-bottom-danger">
                                <div id="map" class="mapas">

                                </div>
                            </div>
                            <span id="val_mapa" class="text-danger">Completa este campo</span>

                        </div>
                        <br>
                        <div class="modal-footer col-md-8">
                            <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center" title="Completa todos los campos requeridos">
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
                    <?php include 'includes/Celulas/LiderCelula.php' ?>
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
    <script src="/MRFSistem/Script/MiecelApp.js"></script>
    <script src="/MRFSistem/Script/Validacion.js"></script>
</body>