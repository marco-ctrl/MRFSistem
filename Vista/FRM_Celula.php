<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Celula</a>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Celula">
            <button class="btn btn-success my-2 my-sm-0" type="submit">
                Buscar
            </button>

        </form>
    </ul>
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 p-3">
            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                Registrar Celula
            </button>
        </div>

    </div>
    <div id="lista" class="row">
        <div class="col-md-10">
            <div id="mensaje">
            </div>
            <h5 for="">Lista de Celulas</h5>
            <div class="table-responsive"></div>
            <table class="table table-hover table-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <td>NOMBRE</td>
                        <td>NUMERO</td>
                        <td>DIRECCION</td>
                        <td>Baja</td>
                        <td>Modificar</td>
                    </tr>
                </thead>
                <tbody id="tb_celula">

                </tbody>
            </table>

        </div>
    </div>
    <div id="formulario">
        <div class="row">
            <div class="col-md-4">
                <form id="form1" clas="p-2">
                    <div class="form-group">
                        <label>Nombre de Celula</label>
                        <input type="text" id="txt_nomCelula" placeholder="Nombre" class="form-control" value=""
                            onkeyUp="javascript:this.value=this.value.toUpperCase();"></input>
                    </div>
                    <div class="form-group">
                        <label>Numero de Celula</label>
                        <input type="number" id="txt_numCelula" placeholder="Numero" class="form-control"></input>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form id="form2" clas="p-2">
                    <div class="form-group">
                        <label>Barrio</label>
                        <select id="cbx_barrio" class="form-control">

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Calle</label>
                        <select id="cbx_calle" class="form-control">

                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="p-2">
                <div class="table-responsive">
                    <div id="map" class="mapas">

                    </div>
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-md-4 p-2">
                <div>
                    <button type="button" id="btn_guardar" class="btn btn-primary btn-block
                        text-center"><i class="far fa-save"></i>
                        Guardar Celula
                    </button>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div>
                    <button type="button" id="btn_cancelar" class="btn btn-warning btn-block
                        text-center"><i class="far fa-window-close"></i>
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>
<script src="/MRFIglesiaBermejo/Script/CelulaApp.js"></script>