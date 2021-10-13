

    <div class="row">
        <div class="col-md-4 p-3">
            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                Agregar Contenido
            </button>
        </div>

    </div>
    <div id="lista" class="row">
        <div class="col-md-10">
            <div id="mensaje">
            </div>
            <h5 for="">Lista de Materias</h5>
            <div class="table-responsive" id="tb_buscar">
                <table class="table table-hover table-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>CODIGO</td>
                            <td>MATERIA</td>
                            <td>DESCRIPCION</td>
                            <td>DAR BAJA</td>
                            <td>MODIFICAR</td>
                        </tr>
                    </thead>
                    <tbody id="tb_contenido">

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div id="formulario">
    <div class="row">
        <div class="col-md-5">
            <form id="form" clas="p-2">
                <div class="form-group">
                    <input type="text" id="txt_contenido" placeholder="Nombre de Contenido" class="form-control"></input>
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