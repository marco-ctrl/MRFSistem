<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Usuario</a>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Usuario">
            <button class="btn btn-success my-2 my-sm-0" type="submit">
                Buscar
            </button>

        </form>
    </ul>
</nav>

<div class="container p-4 h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="card-header text-center">
                        <h4>Agregar Usuario</h4>
                    </div>
                    <br>
                    <form id="form_user" clas="p-2">
                        <div class="form-group">
                            <input type="text" id="txt_codUsuario" placeholder="Codigo" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Usuario</label>
                            <select id="cbx_tipo" class="btn-primary form-control
                            text-center">
                                <option class="form-control">LIDER</option>
                                <option class="form-control">ADMINISTRADOR</option>
                                <option class="form-control">TESORERO</option>
                                <option class="form-control">SECRETARIO</option>
                                <option class="form-control">DIRECTOR</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" id="txt_usuario" placeholder="Usuario" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <input type="text" id="txt_contrasena" placeholder="Contraseña"
                                class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect2">Lista de Miembro</label>
                            <select multiple="" class="form-control" id="sel_miembro">

                            </select>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block
                                            text-center">
                                Guardar Usuario
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div id="div_mensaje">
            </div>
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <td>MIEMBRO</td>
                        <td>FUNCION</td>
                        <td>USUARIO</td>
                        <td>CONTRASEÑA</td>
                    </tr>
                </thead>
                <tbody id="tb_usuario">

                </tbody>
            </table>

        </div>
    </div>

</div>