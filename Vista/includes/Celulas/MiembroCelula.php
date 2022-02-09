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

                            <div class="form-group">
                                <label>Carnet de Identidad</label>
                                <div class="input-group border-bottom-danger" id="div_ci">
                                    <input type="number" id="txt_ci" placeholder="Carnet de Identidad"
                                        class="form-control" title="introducir el carnet de identidad"
                                        onkeyup="numberMobile(event);" required style="width: 60%;">
                                    <input type="text" id="txt_ciExtencion" placeholder="Extencion" class="form-control"
                                        title="introducir extencion en caso de que tenga"
                                        onkeyup="this.value=alfaNumerico(this.value);" required style="width: 20%;">
                                    <span id="chk_ci" class="btn-danger form-control text-center">
                                        <!--<i class="fas fa-check"></i>-->
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                </div>
                                <span id="val_ci" class="text-danger">Completa este campo</span>
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <div class="input-group border-bottom-danger" id="div_nombre">
                                    <input type="text" id="txt_nombre" placeholder="Nombre" class="form-control"
                                        onkeyup="this.value=soloTexto(this.value)" style="width: 80%;" required></input>
                                    <span id="chk_nombre" class="btn-danger form-control">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                </div>
                                <span id="val_nombre" class="text-danger">Completa este campo</span>
                            </div>
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <div class="input-group border-bottom-danger" id="div_paterno">
                                    <input type="text" id="txt_paterno" maxlength="30" placeholder="Apellido Paterno"
                                        class="form-control" onkeyup="this.value=soloTexto(this.value)"
                                        style="width: 80%;" required></input>
                                    <span id="chk_paterno" class="btn-danger form-control">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                </div>
                                <span id="val_paterno" class="text-danger">Completa este campo</span>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-4">
                        <form id="formMiecel2">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" id="txt_materno" maxlength="30" placeholder="Apellido Materno"
                                    class="form-control" onkeyup="this.value=soloTexto(this.value)" required></input>
                            </div>
                            <div class="form-group">
                                <label>Numero de Contacto</label>
                                <div class="input-group border-bottom-danger" id="div_numcontacto">
                                    <input type="tel" id="txt_numcontacto" maxlength="15"
                                        placeholder="Numero de Contacto" class="form-control" required
                                        style="width: 80%;"></input>
                                    <span id="chk_numcontacto" class="btn-danger form-control text-center">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                </div>
                                <span id="val_numcontacto" class="text-danger">Completa este campo</span>
                            </div>
                            <div class="form-group">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" id="txt_fecnac"
                                    min="<?php echo date("Y-m-d",strtotime($fecha_actual."- 100 year"));?>"
                                    max="<?php echo date("Y-m-d",strtotime($fecha_actual."- 12 year")); ?>"
                                    value="<?php echo date("Y-m-d",strtotime($fecha_actual."- 12 year")); ?>"
                                    class="form-control" onkeydown="return ValidarEscrituraFecha()"></input>
                            </div>


                        </form>
                    </div>
                    <div class="col-md-4">
                        <form id="formMiecel3">
                            <div class="form-group">
                                <label>Direccion</label>
                                <div class="input-group border-bottom-danger" id="div_direccion">
                                    <textarea id="txt_direccion" rows="3" maxlength="100" style="width: 80%;"
                                        placeholder="Direccion de Domicilio" class="form-control"
                                        onkeyup="this.value=textoDireccion(this.value);" required></textarea>
                                    <span id="chk_direccion" class="btn-danger form-control">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                </div>
                                <span id="val_direccion" class="text-danger">Completa este campo</span>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="txt_codMiembro" placeholder="Codigo"
                                    class="form-control"></input>
                            </div>
                            <div class="form-group">
                                <label for="">Funcion en la Celula</label>
                                <div class="input-group border-bottom-danger" id="div_funcion">
                                    <select id="cbx_funcion" class="form-control" style="width: 80%;">
                                        <option value="0">Funcion en la celula</option>
                                        <option value="DISCIPULO/A">DISCIPULO/A</option>
                                        <option value="ASISTENTE">ASISTENTE</option>
                                        <option value="ANFITRION">ANFITRION</option>
                                        <option value="LIDER">LIDER</option>
                                    </select>
                                    <span id="chk_funcion" class="btn-danger form-control">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                </div>
                                <span id="val_funcion" class="text-danger">Completa este campo</span>
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
                <button id="btn_AgregarMiecel" type="button" class="btn btn-primary" title="Complete los campos requeridos"><i
                        class="fas fa-user-plus"></i> Agregar</button>
                <button id="btn_nuevoMiecel" type="button" class="btn btn-warning" title="Nuevo Miembro"><i
                        class="far fa-file"></i> Nuevo</button>
                <button type="button" id="btn_cerrarMiecel" class="btn btn-danger" data-dismiss="modal"
                    title="Cerrar"><i class="fas fa-window-close "></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>