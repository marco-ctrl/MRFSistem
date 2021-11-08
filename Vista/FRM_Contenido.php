<h3>GESTIONAR MATERIAS</h3>
<div class="row">
    <div class="col-md-4 p-3">
        <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
            Agregar Contenido
        </button>
    </div>

</div>
<div id="lista" class="row col-md-12">
    <div id="mensaje" class="col-6">
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Materias</h6>
        </div>
        <div class="card-body">
            <div class="col-md-5">
                <form class="row p-1 text-center">
                    <div class="input-group mb-3">
                        <input type="text" id="txt_buscarMat" class="form-control" placeholder="Buscar Materia..."
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2"><i
                                class="fas fa-search fa-sm"></i></button>
                    </div>
                </form>

            </div>
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>CODIGO</td>
                            <td>MATERIA</td>
                            <td>DESCRIPCION</td>
                            <td>DAR BAJA</td>
                            <td>MODIFICAR</td>
                        </tr>
                    </thead>
                    <tfoot class="bg-primary text-white">
                        <tr>
                            <td>CODIGO</td>
                            <td>MATERIA</td>
                            <td>DESCRIPCION</td>
                            <td>DAR BAJA</td>
                            <td>MODIFICAR</td>
                        </tr>
                    </tfoot>
                    <tbody id="tb_contenido">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="formulario">
    <div class="row">
        <div class="col-md-5">
            <form id="form" clas="p-2">
                <div class="form-group">
                    <input type="text" id="txt_contenido" placeholder="Nombre de Contenido"
                        class="form-control"></input>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="txt_descripcion" placeholder="Descripcion" rows="3"></textarea>
                </div>
                <br>
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
            </form>
        </div>

    </div>

</div>


<script src="/MRFSistem/Script/CodigoApp.js"></script>
<script src="/MRFSistem/Script/ContenidoApp.js"></script>