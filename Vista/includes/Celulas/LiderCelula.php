<div class="modal fade" id="md_lider" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleLider"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <form id="formLider">

                            <div class="form-group">
                                <label>Lider de Celula</label>
                                <h5 id="lbl_lider">LIDER DE CELULA</h5>
                            </div>
                        </form>
                    </div>


                </div>

                <div id="listaMiembros">
                    <hr>
                    <h5 class="text-primary">Lista de Miembros Activos de la Iglesia</h5>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">

                        <div class="input-group">
                            <label for="buscarMiembro">Buscar</label>
                            <input type="search" class="form-control bg-light border-0 small" id="buscarMiembro"
                                placeholder="Miembro..." list="dat_miembro"></input>
                            <datalist id="dat_miembro">

                            </datalist>

                            <button type="button" class="btn btn-primary" id="btn_buscarMiembro"><i
                                    class="fas fa-search"></i></button>
                        </div>

                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <td>NOMBRE</td>
                                    <td>APELLIDO</td>
                                    <td>CELULA</td>
                                    <td>FUNCION</td>
                                    <td>ASIGNAR</td>
                                </tr>
                            </thead>
                            <tbody id="tb_miembroLider">
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button id="btn_guardarLider" type="button" class="btn btn-primary"
                    title="Complete los campos requeridos"><i class="fas fa-save"></i> Guardar</button>
                <button id="btn_CambiarLider" type="button" class="btn btn-secondary" title="Nuevo Miembro"><i
                        class="far fa-edit"></i> Cambiar</button>
                <button type="button" id="btn_cerrarLider" class="btn btn-danger" data-dismiss="modal" title="Cerrar"><i
                        class="fas fa-window-close "></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>