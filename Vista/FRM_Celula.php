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
        <div class="col-md-5">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="card-header text-center">
                        <h4>Agregar Celula</h4>
                    </div>
                    <br>
                    <form id="form_user" clas="p-2">
                        <div class="form-group">

                            <input type="hidden" id="txt_codCelula" placeholder="Codigo" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label>Nombre de Celula</label>
                            <input type="text" id="txt_nomCelula" placeholder="Nombre" class="form-control" value=""
                                onkeyUp="javascript:this.value=this.value.toUpperCase();"></input>
                        </div>
                        <div class="form-group">
                            <label>Numero de Celula</label>
                            <input type="number" id="txt_numCelula" placeholder="Numero" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label>Barrio</label>
                            <select id="cbx_barrio" class="form-control">

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Calle</label>
                            <select id="cbx_Calle" class="form-control">

                            </select>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block
                                            text-center">
                                Guardar Celula
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-7">
            <div id="div_mensaje">
            </div>
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <td>NOMBRE</td>
                        <td>NUMERO</td>
                        <td>DIRECCION</td>
                    </tr>
                </thead>
                <tbody id="tb_celula">

                </tbody>
            </table>

        </div>
    </div>

</div>