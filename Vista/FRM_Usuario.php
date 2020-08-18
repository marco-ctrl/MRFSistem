<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a href="#" class="navbar-brand">Usuario</a>
    <!--<ul class="navbar-nav ml-auto">-->
    <form class="form-inline my-2 my-lg-0">
        <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Usuario">
        <button class="btn btn-success my-2 my-sm-0" type="submit">
            <i class="fas fa-search"></i> Buscar
        </button>
    </form>
    <!--</ul>-->
</nav>

<div class="container p-4">
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
                <br>
                <form id="form1" clas="p-2">

                    <div class="form-group">
                        <label>ROL de Usuario</label>
                        <select id="cbx_tipo" class="btn-primary form-control
                            text-center">
                            <option value="0" class="form-control">ROL DE USUARIO</option>
                            <option value="LIDER" class="form-control">LIDER</option>
                            <option value="ADMINISTRADOR" class="form-control">ADMINISTRADOR</option>
                            <option value="TESORERO" class="form-control">TESORERO</option>
                            <option value="SECRETARIO" class="form-control">SECRETARIO</option>
                            <option value="DIRECTOR" class="form-control">DIRECTOR</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" id="txt_usuario" placeholder="Usuario" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="text" id="txt_contrasena" placeholder="Contraseña" class="form-control"></input>
                    </div>


                </form>
                <!--</div>-->
                <!--</div>-->
            </div>
            <div class="col-md-4">
                <br>
                <form id="form2" class="p-1">
                    <!--<fieldset disabled>-->
                        <div class="form-group">
                            <label for="exampleSelect2">Codigo de Miembro</label>
                            <input type="text" id="txt_codigo" class="form-control" placeholder="Codigo" disabled></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect2">Miembro</label>
                            <input type="text" id="txt_miembro" class="form-control" placeholder="Miembro" disabled>
                            </input>
                        </div>

                    <!--</fielset>-->
                    <div class="form-group">
                        <label for="exampleSelect2">Buscar Miembro</label>
                        <input type="search" id="txt_buscarMiembro" class="form-control mr-ms-2"
                                placeholder="Buscar Miembro">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div id="mensaje1">
                </div>
                <label for="">Lista De Miembros</label>
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
        </div>
        <div class="row">
            <div class="col-md-4 p-2">
                <div>
                    <button type="button" id="btn_guardar" class="btn btn-primary btn-block
                                            text-center">
                        <i class="fa fa-save" aria-hidden="true"></i> Guardar Usuario
                    </button>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div>
                    <button type="button" id="btn_cancelar" class="btn btn-danger btn-block
                                            text-center">
                        <i class="far fa-window-close" aria-hidden="true"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="lista">
        <div class="col-md-12">
            <label for="">Lista De Usuarios</label>
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>MIEMBRO</td>
                            <td>FUNCION</td>
                            <td>USUARIO</td>
                            <td>CONTRASEÑA</td>
                            <td>BAJA</td>
                            <td style="width:15%">MODIFICAR</td>
                        </tr>
                    </thead>
                    <tbody id="tb_usuario">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>
<script src="/MRFIglesiaBermejo/Script/UsuarioApp.js"></script>