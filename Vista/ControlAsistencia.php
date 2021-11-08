<h3>GENERAR TABLA DE CONTROL DE ASISTENCIA Y CALIFICACIONES</h3>

<div id="mensaje">
</div>
<div id="lista" class="row">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Cursos</h6>
        </div>
        <div class="card-body">
            <div class="col-md-5">
                <form class="row p-1 text-center">
                    <div class="input-group mb-3">
                        <input type="text" id="txt_buscarAsistencia" class="form-control" placeholder="Buscar Curso..."
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
                            <td>MATERIA</td>
                            <td>PARALELO</td>
                            <td>GESTION</td>
                            <td>MAESTRO</td>
                            <td>FECHA DE INICIO</td>
                            <td>DESCRIPCION</td>
                            <td>GENERAR</td>
                        </tr>
                    </thead>
                    <tfoot class="bg-primary text-white">
                        <tr>
                            <td>MATERIA</td>
                            <td>PARALELO</td>
                            <td>GESTION</td>
                            <td>MAESTRO</td>
                            <td>FECHA DE INICIO</td>
                            <td>DESCRIPCION</td>
                            <td>GENERAR</td>
                        </tr>
                    </tfoot>
                    <tbody id="tb_asistencia">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

<script src="/MRFSistem/ReportesPDF/Script/ControlAsistencia.js"></script>