<?php include 'Header.php' ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MRFSistem</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="FRM_principal.php">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i>
                    <span>Perfil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-archive"></i>
                    <span>Archivos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Archivos:</h6>
                        <a class="collapse-item" href="FRM_Alumno"><i class="fas fa-user-graduate"></i>
                            Alumnos</a>
                        <a class="collapse-item" href="FRM_Maestro"><i class="fas fa-chalkboard-teacher"></i>
                            Maestros</a>
                        <a class="collapse-item" href="FRM_Contenido"><i class="fas fa-book"></i> Materias</a>
                        <a class="collapse-item" href="FRM_Curso"><i class="fas fa-chalkboard"></i>
                            Cursos</a>
                        <a class="collapse-item" href="FRM_Matriculacion"><i class="fas fa-server"></i>
                            Matriculacion</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="far fa-file-pdf"></i>
                    <span>Reportes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> Reportes:</h6>
                        <a class="collapse-item" href="INF_Alumno"><i class="far fa-file-pdf"></i> Informacion
                            Alumno</a>
                        <a class="collapse-item" href="ControlPago" href="#"><i class="far fa-file-pdf"></i> Control de
                            Pago</a>
                        <a class="collapse-item" href="ControlAsistencia" href="#"><i class="far fa-file-pdf"></i>
                            Control de Asistencia</a>

                    </div>
                </div>
            </li>


            <!-- Nav Item - Charts -->

            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <!--<div class="text-center d-none d-md-inline">-->
            <div class="text-center d-sm-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Top Bar -->
                <?php include 'NavBar.php' ?>

                <div class="container-fluid" id="escuela">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">GESTIONAR ALUMNOS</h1>
                        <a href="FRM_EscLideres" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-desktop fa-sm text-white-50"></i> Volver Escritorio</a>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button id="btn_nuevoAlu" class="btn btn-primary btn-block">
                                    <i class="fas fa-user-plus"></i> Agregar Alumno</button>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="button" id="btn_miembro" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#idModal">
                                <i class="fas fa-search-plus"></i> Buscar Miembro
                            </button>
                        </div>
                        <div id="mensaje">
                        </div>
                    </div>
                    <div id="profile">
                        <div class="row col-md-12">
                            <div class="col-md-4">
                                <form id="form1">
                                    <div class="form-group">
                                        <input type="hidden" id="txt_codMiembro" placeholder="Codigo"
                                            class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Carnet de Identidad</label>
                                        <input type="number" id="txt_ci" placeholder="Carnet de Identidad"
                                            class="form-control" min="0"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" id="txt_nombre" placeholder="Nombre"
                                            class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input type="text" id="txt_paterno" placeholder="Apellido Paterno"
                                            class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input type="text" id="txt_materno" placeholder="Apellido Materno"
                                            class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Numero de Contacto</label>
                                        <input type="number" id="txt_numcontacto" placeholder="Numero de Contacto"
                                            class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento</label>
                                        <input type="date" id="txt_fecnac" min="1920-01-01" max="2020-01-01"
                                            placeholder="Fecha de Nacimiento" class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Lugar de Nacimiento</label>
                                        <select id="cbx_ciudad" class="form-control">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Estado Civil</label>
                                        <select id="cbx_estadoCivil" class="form-control">
                                            <option value="0" class="form-control">Estado Civil</option>
                                            <option value="SOLTERO/A" class="form-control">SOLTERO/A</option>
                                            <option value="CASADO/A" class="form-control">CASADO/A</option>
                                            <option value="VIUDO/A" class="form-control">VIUDO/A</option>
                                            <option value="DIVORCIADO/A" class="form-control">DIVORCIADO/A</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Profesion</label>
                                        <select id="cbx_profesion" class="form-control">

                                        </select>
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-4 p-2">
                                <form id="form2">
                                    <div class="form-group">
                                        <label>Direccion</label>
                                        <textarea id="txt_direccion" rows="3" placeholder="Direccion de Domicilio"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <label>Crecimiento Espiritual</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Conversion</label>
                                        <input type="date" id="dat_feccon" min="1994-01-01" max="2020-01-01"
                                            placeholder="" class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Bautismo</label>
                                        <input type="date" id="dat_fecbau" min="1994-01-01" max="2020-01-01"
                                            placeholder="" class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Entrada a la Iglesia</label>
                                        <input type="date" id="dat_fecigl" min="1994-01-01" max="2020-01-01"
                                            placeholder="" class="form-control"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Encuentro Con Dios</label>
                                        <input type="date" id="dat_fecenc" min="1994-01-01" max="2020-01-01"
                                            placeholder="" class="form-control"></input>
                                    </div>
                                    <div class="form-group text-center">
                                        <label>Asignar Celula</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Celula</label>
                                        <select id="cbx_celula" class="form-control">Celula

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Funcion en la Celula</label>
                                        <select id="cbx_funcion" class="form-control btn-primary">
                                            <option value="0">Funcion en la celula</option>
                                            <option value="DISCIPULO/A">DISCIPULO/A</option>
                                            <option value="ASISTENTE">ASISTENTE</option>
                                            <option value="ANFITRION">ANFITRION</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 p-3">
                                <div class="d-block d-sm-block d-md-none">
                                    <button class="btn btn-secondary btn-block"
                                        onclick="document.getElementById('file-upload').click();">
                                        <i class="fas fa-camera"></i> Tomar Foto</button>
                                </div>

                                <br>
                                <div class="row ">
                                    <div class="col-md-6 d-none d-sm-none d-md-block">
                                        <form>
                                            <button type="button" id="encender" class="btn btn-secondary btn-block
                            text-center"><i class="fas fa-video"></i> Encender</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6 d-none d-sm-none d-md-block">
                                        <form>
                                            <button type="button" id="apagar" class="btn btn-secondary btn-block
                            text-center"><i class="fas fa-video-slash "></i> Apagar</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 p-2 d-none d-sm-none d-md-block">
                                        <div class="video-wrap">
                                            <video id="video" width="140" height="120"
                                                poster="/MRFSistem/img/photo.svg">
                                            </video>
                                            <!--<canvas id="canvas" width="140" height="120"></canvas>-->
                                        </div>

                                    </div>
                                    <div class="col-md-6 p-2">
                                        <img id="imagen" width="140" height="120">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 p-2 d-none d-sm-none d-md-block">
                                        <!-- Trigger canvas web API -->
                                        <div class="controller ">
                                            <button id="snap" class="btn btn-secondary btn-block
                            text-center"><i class="fas fa-camera"></i> Capturar</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2 d-none d-sm-none d-md-block">
                                        <div class="controller">
                                            <button class="btn btn-secondary btn-block" id="btn_buscar"
                                                onclick="document.getElementById('file-upload').click();">
                                                <i class="fas fa-search-plus "></i> Buscar Foto</button>
                                            <input type="file" style="display:none;" id="file-upload"
                                                aria-describedby="fileHelp">
                                        </div>
                                    </div>
                                </div>
                                <canvas id="canvas" width="140" height="120" style="display: none;"></canvas>
                            </div>
                        </div>
                        <div class="modal-footer col-md-12">

                            <button type="button" id="btn_guardarAlu" class="btn btn-primary btn-lg
                                    text-center">
                                <i class="far fa-save "></i>
                                Guardar
                            </button>
                            <button type="button" id="btn_modificarAlu" class="btn btn-secondary btn-lg
                                    text-center">
                                <i class="far fa-edit "></i>
                                Modificar
                            </button>
                            <button type="button" id="btn_cancelarAlu" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close "></i>
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
                                                        <td>CELULA</td>
                                                        <td>FUNCION</td>
                                                        <td style="width:15%">SELECCIONAR</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="tb_miembro1">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="btn_nuevo" type="button" class="btn btn-primary"
                                            data-dismiss="modal">
                                            <i class="fas fa-user-plus "></i> Nuevo</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            <i class="fas fa-window-close "></i> Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="home">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de Alumnos</h6>
                            </div>
                            <div class="card-body">
                                <div class="col-md-5">
                                    <form class="row p-1 text-center">
                                        <div class="input-group mb-3">
                                            <input type="text" id="txt_buscarAlumno" class="form-control"
                                                placeholder="Buscar Alumno..." aria-label="Recipient's username"
                                                aria-describedby="button-addon2">
                                            <button class="btn btn-primary" type="button" id="button-addon2"><i
                                                    class="fas fa-search fa-sm"></i></button>
                                        </div>
                                    </form>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>CI</th>
                                                <th>NOMBRE</th>
                                                <th>APELLIDO</th>
                                                <th>DIRECION</th>
                                                <th>NUM CONTACTO</th>
                                                <th>CELULA</th>
                                                <th>FUNCION</th>
                                                <th>BAJA</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="bg-primary text-white">
                                            <tr>
                                                <th>CI</th>
                                                <th>NOMBRE</th>
                                                <th>APELLIDO</th>
                                                <th>DIRECION</th>
                                                <th>NUM CONTACTO</th>
                                                <th>CELULA</th>
                                                <th>FUNCION</th>
                                                <th>BAJA</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="tb_alumnos">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- DataTales Example -->


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
    <script src="/MRFSistem/Script/App.js"></script>
    <script src="/MRFSistem/Script/CodigoApp.js"></script>
    <script src="/MRFSistem/Script/AlumnoApp.js"></script>

    <script>
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var imagen = document.getElementById('imagen');
            const canvas = document.getElementById('canvas');
            let context = canvas.getContext('2d');
            reader.onload = function(e) {
                imagen.src = e.target.result
                imagen.onload = function() {
                    context.drawImage(imagen, 0, 0, 140, 120);
                }
            }
            reader.readAsDataURL(input.files[0]);

        }
    }

    var fileUpload = document.getElementById('file-upload');
    fileUpload.onchange = function(e) {
        readFile(e.srcElement);
    }
    </script>
    <script src="/MRFSistem/Script/CrecimientoApp.js"></script>


</body>

<?php