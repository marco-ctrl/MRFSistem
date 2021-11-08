<div id="mensaje">
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Alumnos</h6>
    </div>
    <div class="card-body">
        <div class="col-md-5">
            <form class="row p-1 text-center">
                <div class="input-group mb-3">
                    <input type="text" id="txt_buscarAlumno" class="form-control" placeholder="Buscar Alumno..."
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
                        <td>CI</td>
                        <td>NOMBRE</td>
                        <td>APELLIDO</td>
                        <td>DIRECCION</td>
                        <td>NUM CONTACTO</td>
                        <td>CELULA</td>
                        <td>FUNCION</td>
                        <td>INFORMACION</td>
                    </tr>
                </thead>
                <tfoot class="bg-primary text-white">
                    <tr>
                        <td>CI</td>
                        <td>NOMBRE</td>
                        <td>APELLIDO</td>
                        <td>DIRECCION</td>
                        <td>NUM CONTACTO</td>
                        <td>CELULA</td>
                        <td>FUNCION</td>
                        <td>INFORMACION</td>
                    </tr>
                </tfoot>
                <tbody id="tb_alumnos">

                </tbody>
            </table>
        </div>
    </div>
</div>




<script src="/MRFSistem/ReportesPDF/Script/InformacionAlumno.js"></script>