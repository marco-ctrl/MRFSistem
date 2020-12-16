<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Matriculacion</a>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Alumno">
            <button class="btn btn-success my-2 my-sm-0" type="submit">
                Buscar
            </button>

        </form>
    </ul>
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 p-3">
            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                Registrar Matricula
            </button>
        </div>

    </div>
    <div id="lista" class="row">
        <div class="col-md-12">
            <div id="mensaje">
            </div>
            <h5 for="">Lista de Cursos</h5>
            <div class="table-responsive" id="tb_buscar">
                <table class="table table-hover table-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>CODIGO</td>
                            <td>MATERIA</td>
                            <td>GESTION</td>
                            <td>MAESTRO</td>
                            <td>FECHA DE INICIO</td>
                            <td>DESCRIPCION</td>
                            <td>DAR BAJA</td>
                            <td>MODIFICAR</td>
                        </tr>
                    </thead>
                    <tbody id="tb_curso">

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="row" id="formulario">
        <div class="col-md-5">
            <form id="form1" clas="p-2">
                <div class="form-group">
                    <label>Materia</label>
                    <select id="cbx_materia" class="form-control">

                    </select>
                </div>
                <div class="form-group">
                    <label>Gestion</label>
                    <input type="number" id="txt_gestion" placeholder="Gestion" class="form-control" value=""></input>
                </div>
                <div class="form-group">
                    <label>Fecha de Inicio</label>
                    <input type="date" id="dat_fecini" min="2020-01-01" placeholder="" class="form-control"></input>
                </div>
                <br>

                <div class="modal fade" id="idModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Seleccionar Maestro</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="search" id="txt_buscarMiembro" class="form-control mr-ms-2"
                                        placeholder="Buscar Maestro">
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
                                    <i class="fas fa-window-close gi-2x"></i> Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5">
            <form id="form2" clas="p-2">
                <div class="form-group">
                    <label for="exampleSelect2">Seleccionar Maestro</label>
                    <button type="button" id="btn_miembro" class="btn btn-primary btn-block" data-toggle="modal"
                        data-target="#idModal">
                        <i class="fas fa-search-plus"></i> Seleccionar Maestro
                    </button>
                </div>
                <div class="form-group">
                    <label>Maestro</label>
                    <input type="text" id="txt_maestro" placeholder="Maestro" class="form-control" value="" disabled></input>
                </div>
                <div class="form-group">
                    <label>Descripcion</label>
                    <textarea class="form-control" id="txt_descripcion" placeholder="Descripcion" rows="3"></textarea>
                </div>

            </form>
        </div>
        <div class="modal-footer col-md-10">
            <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center">
                <i class="far fa-save gi-2x"></i>
                Guardar
            </button>
            <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close gi-2x"></i>
                Cancelar
            </button>
        </div>
    </div>

</div>

<script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>
<script src="/MRFIglesiaBermejo/Script/CursoApp.js"></script>