<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Materia</a>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Materia">
            <button class="btn btn-success my-2 my-sm-0" type="submit">
                Buscar
            </button>

        </form>
    </ul>
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-5">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="card-header text-center">
                        <h4>Agregar Contenido</h4>
                    </div>
                    <br>
                    <form id="form_user" clas="p-2">
                        <div class="form-group">
                            <input type="text" id="txt_codContenido" placeholder="Codigo" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <input type="text" id="txt_contenido" placeholder="Nombre de Contenido" class="form-control"
                                value="" onkeyUp="javascript:this.value=this.value.toUpperCase();"></input>
                        </div>
                        <textarea class="form-control" id="txt_descripcion" placeholder="Descripcion"
                            rows="3"></textarea>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block
                                            text-center">
                                Guardar Contenido
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-7">
            <div id="div_mensaje">
            </div>
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <td>Codigo</td>
                        <td>Materia</td>
                        <td>Descripcion</td>
                    </tr>
                </thead>
                <tbody id="tb_contenido">

                </tbody>
            </table>

        </div>
    </div>

</div>