

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <button id="btn_nuevo" class="btn btn-primary btn-block">
                    <i class="fas fa-user-plus"></i> Agregar Maestro</button>
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
                        <button type="button" id="btn_miembro" class="btn btn-primary btn-block" data-toggle="modal"
                            data-target="#idModal">
                            <i class="fas fa-search-plus"></i> Buscar Miembro
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect2">Codigo de Miembro</label>
                        <input type="text" id="txt_codigo" class="form-control" placeholder="Codigo" disabled></input>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect2">Miembro</label>
                        <input type="text" id="txt_miembro" class="form-control" placeholder="Miembro" disabled>
                        </input>
                    </div>
                </form>
            </div>
            <div class="col-md-4 p-2">
                <form id="form1">
                    <div class="form-group">
                        <label>Carnet de Identidad</label>
                        <input type="text" id="txt_ci" class="form-control" placeholder="Carnet de Identidad" disabled>
                        </input>
                    </div>
                    <div class="form-group">
                        <label>Direccion</label>
                        <input type="text" id="txt_direccion" placeholder="Direccion" class="form-control" disabled></input>
                    </div>
                    <div class="form-group">
                        <label>Numero de Contacto</label>
                        <input type="text" id="txt_numContacto" placeholder="Numero de Contacto" class="form-control" disabled></input>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer col-md-8">
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
    </div>

    <div class="row" id="lista">
        <div class="col-md-12">
            <label for="">Lista De Maestros</label>
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>CI</td>
                            <td>NOMBRE</td>
                            <td>APELLIDO</td>
                            <td>DIRECCION</td>
                            <td>NUM CONTACTO</td>
                            <td>BAJA</td>
                           
                        </tr>
                    </thead>
                    <tbody id="tb_maestro">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="/MRFSistem/Script/CodigoApp.js"></script>
<script src="/MRFSistem/Script/MaestroApp.js"></script>