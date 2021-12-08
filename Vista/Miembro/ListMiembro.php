<!--<div class="container-fluid">-->
<div class="row">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Lista de Miembros</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action=# class="row text-center">
                        <div class="input-group mb-3 col-6">
                            <input type="text" class="form-control" id="buscarMiembro" placeholder="Buscar.."></input>
                            <button class="btn btn-primary" id="btn_busFec"><i class="fas fa-search"></i></button>
                        </div>

                    </form>
                </div>

            </div>


            <div class="table-responsive">
                <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>CARNET IDENTIDAD</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>FECHA DE NACIMIENTO</th>
                            <th>NUMERO DE CONTACTO</th>
                            <th>PROFESION</th>
                            <th>DIRECCION</th>
                            <th>DAR BAJA</th>
                            <th>MODIFICAR</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-primary text-white">
                        <tr>
                            <th>CARNET IDENTIDAD</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>FECHA DE NACIMIENTO</th>
                            <th>NUMERO DE CONTACTO</th>
                            <th>PROFESION</th>
                            <th>DIRECCION</th>
                            <th>DAR BAJA</th>
                            <th>MODIFICAR</th>
                        </tr>
                    </tfoot>

                    <tbody id="tb_miembro">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>