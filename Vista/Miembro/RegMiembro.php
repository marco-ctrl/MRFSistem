<div class="container p-4">
    <div class="row">
        <!--<form id="form_user">-->
        <div class="col-md-4">
            <form id="form1">
                <div class="form-group">
                    <input type="hidden" id="txt_codMiembro" placeholder="Codigo" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Carnet de Identidad</label>
                    <input type="number" id="txt_ci" placeholder="Carnet de Identidad" class="form-control"
                        min="0"></input>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" id="txt_nombre" placeholder="Nombre" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Apellido Paterno</label>
                    <input type="text" id="txt_paterno" placeholder="Apellido Paterno" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Apellido Materno</label>
                    <input type="text" id="txt_materno" placeholder="Apellido Materno" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Numero de Contacto</label>
                    <input type="number" id="txt_numcontacto" placeholder="Numero de Contacto"
                        class="form-control"></input>
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
                        <option value="SOLTERO/A" class="form-control">SOLTERO/A</option>
                        <option value="CASADO/A" class="form-control">CASADO/A</option>
                        <option value="VIUDO/A" class="form-control">VIUDO/A</option>
                        <option value="DIVORCIADO/A" class="form-control">DIVORCIADO/A</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Profesion</label>
                    <input type="text" id="inp_profesion" list="dat_profesion" class="form-control"/>
                    <datalist id="dat_profesion">
                    </datalist>
                </div>

            </form>
        </div>
        <div class="col-md-4 p-3">
            <form id="form2">
                <div class="form-group">
                    <label>Direccion</label>
                    <textarea id="txt_direccion" rows="3" placeholder="Direccion de Domicilio"
                        class="form-control"></textarea>
                </div>
                <div class="form-group text-center">
                    <label>Crecimiento Espiritual</label>
                </div>
                <div class="form-group">
                    <label>Fecha de Conversion</label>
                    <input type="date" id="dat_feccon" min="1950-01-01" max="<?php echo date('Y-m-d'); ?>" placeholder=""
                        class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Fecha de Bautismo</label>
                    <input type="date" id="dat_fecbau" min="1950-01-01" max="<?php echo date('Y-m-d'); ?>" placeholder=""
                        class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Entrada a la Iglesia</label>
                    <input type="date" id="dat_fecigl" min="1994-01-01" max="<?php echo date('Y-m-d'); ?>" placeholder=""
                        class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Encuentro Con Dios</label>
                    <input type="date" id="dat_fecenc" min="1994-01-01" max="<?php echo date('Y-m-d'); ?>" placeholder=""
                        class="form-control"></input>
                </div>
                <div class="form-group text-center">
                    <label>Asignar Celula</label>
                </div>
                <div class="form-group">
                    <label for="">Celula</label>
                    <select id="cbx_celula" class="form-control">Celula

                    </select>
                </div>
                <div class="form-group">
                    <label for="">Funcion en la Celula</label>
                    <select id="cbx_funcion" class="form-control btn-primary">
                        <option value="0">Funcion en la celula</option>
                        <option value="DISCIPULO/A">DISCIPULO/A</option>
                        <option value="ASISTENTE">ASISTENTE</option>
                        <option value="ANFITRION">ANFITRION</option>
                        <option value="LIDER">LIDER</option>
                    </select>
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
    </div>
    <div class="modal-footer">
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
            imagen.onload=function(){
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
</script>
<script src="/MRFSistem/Script/CrecimientoApp.js"></script>
