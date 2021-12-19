<div class="modal fade" id="md_miembro" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <form id="formMiecel1">

                            <div class="form-group has-validation">
                                <label>Carnet de Identidad</label>
                                <input type="number" id="txt_ci" placeholder="Carnet de Identidad" class="form-control"
                                    min="0" pattern="[0-9]" title="debe introducir solo numeros"
                                    onkeypress="return soloNumeros(event)" required></input>
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" id="txt_nombre" maxlength="30" placeholder="Nombre"
                                    class="form-control" onkeypress="return soloLetras(event)" required></input>
                            </div>
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" id="txt_paterno" maxlength="30" placeholder="Apellido Paterno"
                                    class="form-control" onkeypress="return soloLetras(event)" required></input>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form id="formMiecel2">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" id="txt_materno" maxlength="30" placeholder="Apellido Materno"
                                    class="form-control" onkeypress="return soloLetras(event)" required></input>
                            </div>
                            <div class="form-group">
                                <label>Numero de Contacto</label>
                                <input type="number" id="txt_numcontacto" maxlength="15"
                                    placeholder="Numero de Contacto" class="form-control"
                                    onkeypress="return soloNumeros(event)" required></input>
                            </div>
                            <div class="form-group">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" id="txt_fecnac" min="1920-01-01" max="<?php echo date('Y-m-d'); ?>"
                                    value="<?php echo date('Y-m-d'); ?>" class="form-control"></input>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-4">
                        <form id="formMiecel3">
                            <div class="form-group">
                                <label>Direccion</label>
                                <textarea id="txt_direccion" rows="3" maxlength="100"
                                    placeholder="Direccion de Domicilio" class="form-control"
                                    onkeypress="return Direccion(event)" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="txt_codMiembro" placeholder="Codigo"
                                    class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="">Funcion en la Celula</label>
                                <select id="cbx_funcion" class="form-control">
                                    <option value="0">Funcion en la celula</option>
                                    <option value="DISCIPULO/A">DISCIPULO/A</option>
                                    <option value="ASISTENTE">ASISTENTE</option>
                                    <option value="ANFITRION">ANFITRION</option>
                                </select>
                            </div>
                        </form>
                    </div>
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
                                <td>BAJA</td>
                                <td>MODIFICAR</td>
                            </tr>
                        </thead>
                        <tbody id="tb_miecel">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn_AgregarMiecel" type="button" class="btn btn-primary"
                title="Agregar Miembro"><i class="fas fa-user-plus"></i> Agregar</button>
                <button id="btn_nuevoMiecel" type="button" class="btn btn-warning"
                title="Nuevo Miembro"><i class="far fa-file"></i> Nuevo</button>
                <button type="button" id="btn_cerrarMiecel" class="btn btn-danger" data-dismiss="modal"
                title="Cerrar"><i class="fas fa-window-close "></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>