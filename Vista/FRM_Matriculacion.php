<?php
session_start();
  
if(empty($_SESSION['active'])){
  header('location: ../');
}

?>
<h3>GESTIONAR MATRICULACION DE ALUMNOS</h3>
<div class="row">
    <div class="col-md-4 p-3">
        <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
            Registrar Matricula
        </button>
    </div>
    <div id="mensaje">
    </div>

</div>
<div id="lista" class="row col-md-12">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Alumnos Matriculados</h6>
        </div>
        <div class="card-body">
            <div class="col-md-5">
                <form class="row p-1 text-center">
                    <div class="input-group mb-3">
                        <input type="text" id="txt_buscarMatricula" class="form-control" placeholder="Buscar Alumno..."
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2"><i
                                class="fas fa-search fa-sm"></i></button>
                    </div>
                </form>

            </div>
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>ALUMNO</td>
                            <td>CURSO</td>
                            <td>GESTION</td>
                            <td>FECHA Y HORA DE REGISTRO</td>
                            <td>MODIFICAR</td>
                        </tr>
                    </thead>
                    <tfoot class="bg-primary text-white">
                        <tr>
                            <td>ALUMNO</td>
                            <td>CURSO</td>
                            <td>GESTION</td>
                            <td>FECHA Y HORA DE REGISTRO</td>
                            <td>MODIFICAR</td>
                        </tr>
                    </tfoot>
                    <tbody id="tb_matricula">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<div class="row" id="formulario">
    <div class="col-md-5">
        <form id="form1" clas="p-2">
            <div class="form-group">
                <label for="exampleSelect2">Seleccionar Curso</label>
                <button type="button" id="btn_curso" class="btn btn-primary btn-block" data-toggle="modal"
                    data-target="#idModalCurso">
                    <i class="fas fa-search-plus"></i> Seleccionar Curso
                </button>
            </div>
            <div class="form-group">
                <label>Codigo Curso</label>
                <input type="text" id="txt_codCurso" placeholder="Codigo Curso" class="form-control" value=""
                    disabled></input>
            </div>
            <div class="form-group">
                <label>Gestion</label>
                <input type="text" id="txt_gestion" placeholder="Gestion" class="form-control" value=""
                    disabled></input>
            </div>
            <div class="form-group">
                <label>Materia</label>
                <input type="text" id="txt_materia" placeholder="Materia" class="form-control" value=""
                    disabled></input>
            </div>
            <div class="form-group">
                <label>Maestro</label>
                <input type="text" id="txt_maestro" placeholder="Maestro" class="form-control" value=""
                    disabled></input>
            </div>
            <div class="form-group">
                <label>Fecha de Inicio</label>
                <input type="date" id="dat_fecini" min="2020-01-01" placeholder="" class="form-control"
                    disabled></input>
            </div>
            <br>

            <div class="modal fade" id="idModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Seleccionar Alumno</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="search" id="txt_buscarMiembro" class="form-control mr-ms-2"
                                    placeholder="Buscar Alumno">
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
                                            <td>SELECCIONAR</td>
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
            <div class="modal fade" id="idModalCurso" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Seleccionar Curso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="search" id="txt_buscarMiembro" class="form-control mr-ms-2"
                                    placeholder="Buscar Curso">
                            </div>
                            <div id="mensaje2">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <td>MATERIA</td>
                                            <td>PARALELO</td>
                                            <td>GESTION</td>
                                            <td>MAESTRO</td>
                                            <td>SELECCIONAR</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tb_curso">
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
        </form>
    </div>
    <div class="col-md-5">
        <form id="form2" clas="p-2">
            <div class="form-group">
                <label for="exampleSelect2">Seleccionar Alumno</label>
                <button type="button" id="btn_miembro" class="btn btn-primary btn-block" data-toggle="modal"
                    data-target="#idModal">
                    <i class="fas fa-search-plus"></i> Seleccionar Alumno
                </button>
            </div>
            <div class="form-group">
                <label>Alumno</label>
                <input type="text" id="txt_alumno" placeholder="Alumno" class="form-control" value="" disabled></input>
            </div>
            <div class="form-group">
                <label>Fecha de Matriculacion</label>
                <input type="datetime" class="form-control" id="dat_matriculacion" disabled></input>
            </div>
            <div class="form-group">
                <label>Hora de Matriculacion</label>
                <input type="datetime" class="form-control" id="hor_matriculacion" value="" disabled></input>
            </div>
            <div class="form-group">
                <label>Codigo Usuario</label>
                <input type="text" class="form-control" id="txt_codUsuario" value="<?php echo $_SESSION['pacodusu']; ?>"
                    disabled></input>
            </div>
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" class="form-control" id="txt_usuario"
                    value="<?php echo $_SESSION['canommie']." ".$_SESSION['capatmie']." ".$_SESSION['camatmie']; ?>"
                    disabled></input>
            </div>

        </form>
    </div>
    <div class="modal-footer col-md-10">
        <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center">
            <i class="far fa-save "></i>
            Guardar
        </button>
        <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close "></i>
            Cancelar
        </button>
    </div>
</div>



<script src="/MRFSistem/Script/CodigoApp.js"></script>
<script src="/MRFSistem/Script/MatriculacionApp.js"></script>