<div class="modal fade" id="md_miembro" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Miembros de Celula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <form id="form1">
                            
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
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" id="txt_materno" maxlength="30" placeholder="Apellido Materno"
                                    class="form-control" onkeypress="return soloLetras(event)" required></input>
                            </div>


                        </form>
                    </div>
                    <div class="col-md-4">
                        <form id="form2">
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
                            <div class="form-group">
                                <label>Lugar de Nacimiento</label>
                                <select id="cbx_ciudad" class="form-control">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Estado Civil</label>
                                <select id="cbx_estadoCivil" class="form-control">
                                    <option value="0" class="form-control">Estado Civil</option>
                                    <option value="SOLTERO/A" class="form-control">SOLTERO/A
                                    </option>
                                    <option value="CASADO/A" class="form-control">CASADO/A</option>
                                    <option value="VIUDO/A" class="form-control">VIUDO/A</option>
                                    <option value="DIVORCIADO/A" class="form-control">DIVORCIADO/A
                                    </option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form id="form3">
                            <div class="form-group">
                                <label>Profesion</label>
                                <input type="text" id="inp_profesion" list="dat_profesion" class="form-control"
                                    maxlength="30" onkeypress="return soloLetras(event)" required />
                                <datalist id="dat_profesion">
                                </datalist>
                            </div>
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
                    <i class="fas fa-user-plus "></i> Nuevo</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-window-close "></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>