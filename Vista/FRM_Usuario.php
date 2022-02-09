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
                        <div class="col-md-4">
                            <div class="form-group">
                                <button id="btn_nuevo" class="btn btn-primary btn-block">
                                    <i class="fas fa-user-plus"></i> Agregar Usuario</button>
                            </div>
                        </div>
                        <div id="mensaje">
                        </div>
                    </div>
                    <div id="formulario">
                        <div class="row">
                            <div class="col-md-4">
                                <form id="form2" class="p-2">
                                    <div class="form-group">
                                        <label for="exampleSelect2">Buscar Miembro</label>
                                        <div class="input-group border-bottom-danger" id="div_miembro">
                                            <button type="button" id="btn_miembro" class="btn btn-primary btn-block"
                                                data-toggle="modal" data-target="#idModal">
                                                <i class="fas fa-search-plus"></i> Buscar Miembro
                                            </button>
                                        </div>
                                        <span id="val_miembro" class="text-danger">Selecciona un Miembro</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect2">Codigo de Miembro</label>
                                        <div class="input-group border-bottom-danger" id="div_codigo">
                                            <input type="text" id="txt_codigo" class="form-control" placeholder="Codigo"
                                                disabled style="width: 80%;"></input>
                                            <span id="chk_codigo" class="input-group-text bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect2">Miembro</label>
                                        <div class="input-group border-bottom-danger" id="div_nomMiembro">
                                            <input type="text" id="txt_miembro" class="form-control"
                                                placeholder="Miembro" disabled style="width: 80%;"></input>
                                            <span id="chk_nomMiembro" class="input-group-text bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 p-2">
                                <form id="form1">
                                    <div class="form-group">
                                        <label>ROL de Usuario</label>
                                        <div class="input-group border-bottom-danger" id="div_tipo">
                                            <select id="cbx_tipo" class="btn-default form-control" style="width: 80%;">
                                                <option value="0" class="form-control">ROL DE USUARIO</option>
                                                <option value="LIDER" class="form-control">LIDER</option>
                                                <option value="ADMINISTRADOR" class="form-control">ADMINISTRADOR
                                                </option>
                                                <option value="TESORERO" class="form-control">TESORERO</option>
                                                <option value="SECRETARIO" class="form-control">SECRETARIO</option>
                                                <option value="DIRECTOR" class="form-control">DIRECTOR</option>
                                            </select>
                                            <span id="chk_tipo" class="input-group-text bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                        <span id="val_tipo" class="text-danger">Selecciona un rol de Usuario</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <div class="input-group border-bottom-danger" id="div_usuario">
                                            <input type="text" id="txt_usuario" class="form-control"
                                                placeholder="Usuario" readonly style="width: 80%;"></input>
                                            <span id="chk_usuario" class="input-group-text bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <div class="input-group border-bottom-danger" id="div_contrasena">
                                            <input type="password" id="txt_contrasena" class="form-control"
                                                placeholder="Contraseña" readonly style="width: 80%;"></input>
                                            <span id="chk_contrasena" class="input-group-text bg-danger text-white">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                        <div class="modal fade" id="idModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Buscar Miembro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="search" id="txt_buscarMiembro" class="form-control mr-ms-2"
                                                placeholder="Buscar Miembro">
                                        </div>
                                        <div id="mensaje1">
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <td>NOMBRE</td>
                                                        <td>APELLIDO</td>
                                                        <td style="width:15%">SELECCIONAR</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="tb_miembro">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            <i class="fas fa-window-close "></i> Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="lista">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h5>
                                </div>
                                <div class="card-body">
                                    <form action=# class="row text-center">
                                        <div class="input-group mb-3 col-6">
                                            <input type="text" class="form-control" id="buscarUsuario"
                                                placeholder="Buscar.."></input>
                                            <button class="btn btn-primary" id="btn_busFec"><i
                                                    class="fas fa-search"></i></button>
                                        </div>

                                    </form>

                                    <div class="table-responsive">
                                        <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>MIEMBRO</th>
                                                    <th>FUNCION</th>
                                                    <th>USUARIO</th>
                                                    <th>BAJA</th>
                                                    <th style="width:15%">MODIFICAR</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="bg-primary text-white">
                                                <tr>
                                                    <th>MIEMBRO</th>
                                                    <th>FUNCION</th>
                                                    <th>USUARIO</th>
                                                    <th>BAJA</th>
                                                    <th style="width:15%">MODIFICAR</th>
                                                </tr>
                                            </tfoot>

                                            <tbody id="tb_usuario">

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
    <script src="/MRFSistem/Script/UsuarioApp.js"></script>
</body>