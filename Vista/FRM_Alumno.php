<?php
session_start();
  
if(empty($_SESSION['active'])){
  header('location: ../');
}

?>
<head>
    <title>MRFIglesiaBermejo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <?php 
        include 'Estilos.php';
    ?>
    <?php 
        include 'Scripts.php';
    ?>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between">
    <a href="#" class="navbar-brand">Alumnos</a>
    <!--<ul class="navbar-nav ml-auto">-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="FRM_principal.php"><i class="fas fa-home"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" href="FRM_EscLideres.php"><i class="fas fa-school"></i> Escuela Lideres</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-sm-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Alumnos">

        </form>
    </div>

    <!--</ul>-->
</nav>

<div class="container p-4">
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
        <div class="row">
            <div class="col-md-4">
                <form id="form1">
                    <div class="form-group">
                        <input type="hidden" id="txt_codMiembro" placeholder="Codigo" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Carnet de Identidad</label>
                        <input type="number" id="txt_ci" placeholder="Carnet de Identidad" class="form-control"
                            min="0"></input>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="txt_nombre" placeholder="Nombre" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Apellido Paterno</label>
                        <input type="text" id="txt_paterno" placeholder="Apellido Paterno" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Apellido Materno</label>
                        <input type="text" id="txt_materno" placeholder="Apellido Materno" class="form-control"></input>
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
                        <input type="date" id="dat_feccon" min="1994-01-01" max="2020-01-01" placeholder=""
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Bautismo</label>
                        <input type="date" id="dat_fecbau" min="1994-01-01" max="2020-01-01" placeholder=""
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Entrada a la Iglesia</label>
                        <input type="date" id="dat_fecigl" min="1994-01-01" max="2020-01-01" placeholder=""
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Encuentro Con Dios</label>
                        <input type="date" id="dat_fecenc" min="1994-01-01" max="2020-01-01" placeholder=""
                            class="form-control"></input>
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
                            <option value="LIDER">LIDER</option>
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
                            text-center"><i class="fas fa-video gi-2x"></i> Encender</button>
                        </form>
                    </div>
                    <div class="col-md-6 d-none d-sm-none d-md-block">
                        <form>
                            <button type="button" id="apagar" class="btn btn-secondary btn-block
                            text-center"><i class="fas fa-video-slash gi-2x"></i> Apagar</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 p-2 d-none d-sm-none d-md-block">
                        <div class="video-wrap">
                            <video id="video" width="140" height="120" poster="/MRFIglesiaBermejo/img/photo.svg">
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
                            text-center"><i class="fas fa-camera gi-2x"></i> Capturar</button>
                        </div>
                    </div>
                    <div class="col-md-6 p-2 d-none d-sm-none d-md-block">
                        <div class="controller">
                            <button class="btn btn-secondary btn-block" id="btn_buscar"
                                onclick="document.getElementById('file-upload').click();">
                                <i class="fas fa-search-plus gi-2x"></i> Buscar Foto</button>
                            <input type="file" style="display:none;" id="file-upload" aria-describedby="fileHelp">
                        </div>
                    </div>
                </div>
                <canvas id="canvas" width="140" height="120" style="display: none;"></canvas>
            </div>
        </div>
        <div class="modal-footer col-md-12">
        
            <button type="button" id="btn_guardarAlu" class="btn btn-primary btn-lg
                                    text-center">
                <i class="far fa-save gi-2x"></i>
                Guardar
            </button>
            <button type="button" id="btn_modificarAlu" class="btn btn-secondary btn-lg
                                    text-center">
                <i class="far fa-edit gi-2x"></i>
                Modificar
            </button>
            <button type="button" id="btn_cancelarAlu" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close gi-2x"></i>
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
                        <button id="btn_nuevo" type="button" class="btn btn-primary" data-dismiss="modal">
                            <i class="fas fa-user-plus gi-2x"></i> Nuevo</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-window-close gi-2x"></i> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="home">
        <div class="col-md-12">
            <label for="">Lista De Alumnos</label>
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>CI</td>
                            <td>NOMBRE</td>
                            <td>APELLIDO</td>
                            <td>DIRECCION</td>
                            <td>NUM CONTACTO</td>
                            <td>CELULA</td>
                            <td>FUNCION</td>
                            <td>BAJA</td>
                            
                        </tr>
                    </thead>
                    <tbody id="tb_alumnos">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>
<script src="/MRFIglesiaBermejo/Script/AlumnoApp.js"></script>

<script>
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var imagen = document.getElementById('imagen');
        const canvas = document.getElementById('canvas');
        let context = canvas.getContext('2d');
        reader.onload = function(e) {
            imagen.src = e.target.result
            imagen.onload=function(){
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
<script src="/MRFIglesiaBermejo/Script/CrecimientoApp.js"></script>