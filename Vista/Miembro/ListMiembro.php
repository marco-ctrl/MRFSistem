<!--<div class="container-fluid">-->
<div class="row">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Lista de Miembros</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">

                        <div class="input-group">
                            <label for="tipoBusqueda">Buscar por </label>
                            <select name="" id="tipoBusqueda" class="form-control bg-light border-0 small tipoBusqueda">
                                <option value="cacidmie">Carnet Identidad</option>
                                <option value="canommie">Nombre</option>
                                <option value="capatmie">Apellido Paterno</option>
                                <option value="camatmie">Apellido Materno</option>
                            </select>
                            <input type="search" class="form-control bg-light border-0 small" id="buscarMiembro"
                                placeholder="Buscar..."></input>
                            <button class="btn btn-primary" id="btn_busFec"><i class="fas fa-search"></i></button>
                        </div>

                    </form>
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle bg-light rounded" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="text-align: right; height: 40px; text-orientation: upright;">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="form-group">
                                        <label for="tipoBusqueda1">Buscar por </label>
                                        <select name="" id="tipoBusqueda1" class="form-control bg-light border-0 small">
                                            <option value="cacidmie">Carnet Identidad</option>
                                            <option value="canommie">Nombre</option>
                                            <option value="capatmie">Apellido Paterno</option>
                                            <option value="camatmie">Apellido Materno</option>
                                        </select>
                                    </div>
                                    <div class="input-group">

                                        <input type="search" id="buscarMiembro1" class="form-control bg-light border-0 small"
                                            placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <br>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
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