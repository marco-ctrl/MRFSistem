<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Curso</a>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Curso">
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
                Registrar Curso
            </button>
        </div>

    </div>
    <div id="lista" class="row">
        <div class="col-md-10">
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
                        </tr>
                    </thead>
                    <tbody id="tb_Curso">

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form id="form_user" clas="p-2">
                <div class="form-group">
                    <input type="text" id="txt_contenido" placeholder="Nombre de Contenido" class="form-control"
                        value="" onkeyUp="javascript:this.value=this.value.toUpperCase();"></input>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="txt_descripcion" placeholder="Descripcion" rows="3"></textarea>
                </div>
                <br>
                <div class="modal-footer col-md-8">
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
            </form>
        </div>

    </div>

</div>