<?php 
    $fecha_actual = date("d-m-Y");
    
?>
<div class="container p-4">
    <div class="row">
        <!--<div class="row">-->
        <!--<form id="form_miembro">-->
        <div class="col-md-4">
            <form id="form1" class="needs-validation">
                <div class="form-group">
                    <input type="hidden" id="txt_codMiembro" placeholder="Codigo" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Carnet de Identidad</label>
                    <div class="input-group border-bottom-danger" id="div_ci">
                        <input type="number" id="txt_ci" placeholder="Carnet de Identidad" class="form-control"
                            title="introducir el carnet de identidad" required
                            style="width: 60%;" list="dat_ci">
                        <datalist id="dat_ci">
                        </datalist>
                        <input type="text" id="txt_ciExtencion" placeholder="Extencion" class="form-control limpiar"
                            title="introducir extencion en caso de que tenga"
                            onkeyup="this.value=alfaNumerico(this.value);" required style="width: 20%;">
                        <span id="chk_ci" class="input-group-text bg-danger text-white">
                            <!--<i class="fas fa-check"></i>-->
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_ci" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group border-bottom-danger" id="div_nombre">
                        <input type="text" id="txt_nombre" placeholder="Nombre" class="form-control limpiar"
                            onkeyup="this.value=soloTexto(this.value)" style="width: 80%;" required></input>
                        <span id="chk_nombre" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_nombre" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group">
                    <label>Apellido Paterno</label>
                    <div class="input-group border-bottom-danger" id="div_paterno">
                        <input type="text" id="txt_paterno" maxlength="30" placeholder="Apellido Paterno"
                            class="form-control limpiar" onkeyup="this.value=soloTexto(this.value)" style="width: 80%;"
                            required></input>
                        <span id="chk_paterno" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_paterno" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group">
                    <label>Apellido Materno</label>
                    <input type="text" id="txt_materno" maxlength="30" placeholder="Apellido Materno limpiar"
                        class="form-control limpiar" onkeyup="this.value=soloTexto(this.value)" required></input>
                </div>
                <div class="form-group">
                    <label>Numero de Contacto</label>
                    <div class="input-group border-bottom-danger" id="div_numcontacto">
                        <input type="tel" id="txt_numcontacto" maxlength="15" placeholder="Numero de Contacto"
                            class="form-control limpiar" required style="width: 80%;"></input>
                        <span id="chk_numcontacto" class="input-group-text bg-danger text-white">
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
                        value="<?php echo date("Y-m-d",strtotime($fecha_actual."- 12 year")); ?>" class="form-control limpiar"
                        onkeydown="return ValidarEscrituraFecha()"></input>
                </div>
                <div class="form-group">
                    <label>Lugar de Nacimiento</label>
                    <div class="input-group border-bottom-danger" id="div_ciudad">
                        <select id="cbx_ciudad" class="form-control limpiarSelect" style="width: 80%;">

                        </select>
                        <span id="chk_ciudad" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_ciudad" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group">
                    <label>Estado Civil</label>
                    <div class="input-group border-bottom-danger" id="div_estadoCivil">
                        <select id="cbx_estadoCivil" class="form-control limpiarSelect" style="width: 80%;">
                            <option value="0" class="form-control">Estado Civil</option>
                            <option value="SOLTERO/A" class="form-control">SOLTERO/A</option>
                            <option value="CASADO/A" class="form-control">CASADO/A</option>
                            <option value="VIUDO/A" class="form-control">VIUDO/A</option>
                            <option value="DIVORCIADO/A" class="form-control">DIVORCIADO/A</option>
                        </select>
                        <span id="chk_estadoCivil" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_estadoCivil" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group">
                    <label>Profesion</label>
                    <div class="input-group border-bottom-danger limpiar" id="div_profesion">
                        <input type="text" id="inp_profesion" list="dat_profesion" style="width: 80%;"
                            class="form-control" maxlength="30" onkeyup="this.value=soloProfesion(this.value)"
                            placeholder="Profesion" required />
                        <datalist id="dat_profesion">
                        </datalist>
                        <span id="chk_profesion" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_profesion" class="text-danger">Completa este campo</span>
                </div>

            </form>
        </div>
        <div class="col-md-4 p-3">
            <form id="form2">
                <div class="form-group">
                    <label>Direccion</label>
                    <div class="input-group border-bottom-danger" id="div_direccion">
                        <textarea id="txt_direccion" rows="3" maxlength="100" style="width: 80%;"
                            placeholder="Direccion de Domicilio" class="form-control limpiar"
                            onkeyup="this.value=textoDireccion(this.value);" required></textarea>
                        <span id="chk_direccion" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_direccion" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group text-center">
                    <label>Crecimiento Espiritual</label>
                </div>
                <div class="form-group">
                    <label>Fecha de Conversion</label>
                    <div class="input-group border-bottom-danger" id="div_feccon">
                        <input type="date" id="dat_feccon" min="1950-01-01" max="<?php echo date('Y-m-d'); ?>"
                            placeholder="" onkeydown="return ValidarEscrituraFecha()" class="form-control limpiar"
                            autocomplete="off" value=""></input>
                        <span id="chk_feccon" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_feccon" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group">
                    <label>Fecha de Bautismo</label>
                    <div class="input-group border-bottom-danger" id="div_fecbau">
                        <input type="date" id="dat_fecbau" min="1950-01-01" max="<?php echo date('Y-m-d'); ?>"
                            placeholder="" onkeydown="return ValidarEscrituraFecha()" class="form-control limpiar"></input>
                        <span id="chk_fecbau" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_fecbau" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group">
                    <label>Entrada a la Iglesia</label>
                    <div class="input-group border-bottom-danger" id="div_fecigl">
                        <input type="date" id="dat_fecigl" min="1994-12-12" max="<?php echo date('Y-m-d'); ?>"
                            placeholder="" onkeydown="return ValidarEscrituraFecha()" class="form-control limpiar"></input>
                        <span id="chk_fecigl" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_fecigl" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group">
                    <label>Encuentro Con Dios</label>
                    <div class="input-group border-bottom-danger" id="div_fecenc">
                        <input type="date" id="dat_fecenc" min="2001-01-01" max="<?php echo date('Y-m-d'); ?>"
                            placeholder="" onkeydown="return ValidarEscrituraFecha()" class="form-control limpiar"></input>
                        <span id="chk_fecenc" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_fecenc" class="text-danger">Completa este campo</span>
                </div>
                <div class="form-group text-center">
                    <label>Asignar Celula</label>
                </div>
                <div class="form-group">
                    <label for="">Celula</label>
                    <div class="input-group border-bottom-danger" id="div_celula">
                        <select id="cbx_celula" class="form-control limpiarSelect" style="width: 80%;">Celula

                        </select>
                        <span id="chk_celula" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_celula" class="text-danger">Completa este campo</span>

                </div>
                <div class="form-group">
                    <label for="">Funcion en la Celula</label>
                    <div class="input-group border-bottom-danger" id="div_funcion">
                        <select id="cbx_funcion" class="form-control limpiarSelect" style="width: 80%;">
                            <option value="0">Funcion en la celula</option>
                            <option value="DISCIPULO/A">DISCIPULO/A</option>
                            <option value="ASISTENTE">ASISTENTE</option>
                            <option value="ANFITRION">ANFITRION</option>
                            <option value="LIDER">LIDER</option>
                            <option value="PASTOR/A">PASTOR/A</option>
                        </select>
                        <span id="chk_funcion" class="input-group-text bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <span id="val_funcion" class="text-danger">Completa este campo</span>
                </div>
            </form>
        </div>

        <div class="col-md-4 p-3">
            <div class="d-block d-sm-block d-md-none">
                <button class="btn btn-secondary btn-block" onclick="document.getElementById('file-upload').click();">
                    <i class="fas fa-camera"></i> Tomar Foto</button>
            </div>

            <br>
            <div class="row ">
                <div class="col-md-6 d-none d-sm-none d-md-block">
                    <form>
                        <button type="button" id="encender" class="btn btn-secondary btn-block
                            text-center"><i class="fas fa-video "></i> Encender</button>
                    </form>
                </div>
                <div class="col-md-6 d-none d-sm-none d-md-block">
                    <form>
                        <button type="button" id="apagar" class="btn btn-secondary btn-block
                            text-center"><i class="fas fa-video-slash "></i> Apagar</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-2 d-none d-sm-none d-md-block">
                    <div class="video-wrap">
                        <video id="video" width="140" height="120" poster="/MRFSistem/img/photo.svg"> </video>
                        <!--<canvas id="canvas" width="140" height="120"></canvas>-->
                    </div>

                </div>
                <div class="col-md-6 p-2">
                    <img id="imagen" width="140" height="120">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 p-2 d-none d-sm-none d-md-block">
                    <!-- Trigger canvas web API -->
                    <div class="controller ">
                        <button id="snap" class="btn btn-secondary btn-block
                            text-center"><i class="fas fa-camera "></i> Capturar</button>
                    </div>
                </div>
                <div class="col-md-6 p-2 d-none d-sm-none d-md-block">
                    <div class="controller">
                        <button class="btn btn-secondary btn-block"
                            onclick="document.getElementById('file-upload').click();">
                            <i class="fas fa-search-plus "></i> Buscar Foto</button>
                        <input type="file" style="display:none;" id="file-upload" aria-describedby="fileHelp">
                    </div>
                </div>
            </div>
            <canvas id="canvas" width="140" height="120" style="display: none;"></canvas>
        </div>
        <!--</form>-->
        <!--</div>-->


    </div>
    <div class="modal-footer">
        <button type="button" id="btn_guardarMiembro" class="btn btn-primary btn-lg
            text-center tooltip-test" title="Llene todos los campos requeridos" disable>
            <i class="far fa-save "></i>
            Guardar
        </button>

        <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close "></i>
            Cancelar
        </button>
    </div>


</div>
<script>
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var imagen = document.getElementById('imagen');
        const canvas = document.getElementById('canvas');
        let context = canvas.getContext('2d');
        reader.onload = function(e) {
            imagen.src = e.target.result
            imagen.onload = function() {
                context.drawImage(imagen, 0, 0, 140, 120);
            }
        }
        reader.readAsDataURL(input.files[0]);

    }
}

var fileUpload = document.getElementById('file-upload');
fileUpload.onchange = function(e) {
    readFile(e.srcElement);
}

function ValidarEscrituraFecha() {
    if (event.keyCode == 9) {
        // Código para la tecla TAB
        //console.log("Oprimiste la tecla TAB");

    } else {
        return false;
    }
}
</script>
<script src="/MRFSistem/Script/CrecimientoApp.js"></script>