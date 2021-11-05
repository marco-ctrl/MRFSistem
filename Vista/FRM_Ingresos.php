
    <?php
session_start();

if (empty($_SESSION['active'])) {
    header('location: ../');
}
//echo $_SESSION['canomusu'];
date_default_timezone_set('UTC');
//date_default_timezone_set('America/La Paz'); 
                                                                                                    
?>

    <div class="row">
        <div class="col-md-4 p-3">
            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                Nuevo Ingreso
            </button>
        </div>

    </div>
    <div id="lista" class="row">
        <div class="col-md-12">
            <div id="mensaje">
            </div>
             <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Lista de Ingreso Economicos</h5>
                        </div>
                        <div class="card-body">
                        <form action=# class="row justify-content-center p-1 text-center">
                            <div class="form-group p-1">
                                <label>Buscar Desde </label>
                            </div>
                            <div class="form-group p-1">
                                <input type="date" class="form-control" id="dat_inicio" value="2010-12-12"></input>
                            </div>
                            <div class="form-group p-1">
                                <label>Hasta</label>
                            </div>
                            <div class="form-group p-1">
                                <input type="date" class="form-control" id="dat_maximo" ></input>
                                <!--value="<?php //echo date('Y-m-d');?>"-->
                            </div>
                            <div class="form-group p-1">
                                <button class="form-control btn-primary" id="btn_buscarIngreso"><i class="fas fa-search"></i></button>
                            </div>
                        </form>

                            <div class="table-responsive">
                                <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>ITEMS</th>
                                            <th>CONT. BS</th>
                                            <th>FECHA</th>
                                            <th>USUARIO</th>
                                            <th>MODIFICAR</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="bg-primary text-white">
                                        <tr>
                                            <th>ITEMS</th>
                                            <th>CONT. BS</th>
                                            <th>FECHA</th>
                                            <th>USUARIO</th>
                                            <th>MODIFICAR</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="tb_economico">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    <div id="formulario">
        <div class="row">
            <div class="col-md-5">
                <form id="form1" clas="p-2">
                    <div class="form-group">
                        <label>Item</label>
                        <select id="cbx_tipIng" class="form-control">
                            <option value="0">Seleccionar Item</option>
                            <option value="DIEZMOS">DIEZMOS</option>
                            <option value="OFRENDAS">OFRENDAS</option>
                            <option value="OFRENDA DE CELULAS">OFRENDA DE CELULAS</option>
                            <option value="OFRENDA DE JOVENES">OFRENDA DE JOVENES</option>
                            <option value="OFRENDA AYUNO">OFRENDA AYUNO</option>
                            <option value="OTROS INGRESOS">OTROS INGRESOS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cantidad de Ingreso</label>
                        <input type="number" id="txt_cantidad" min="0" placeholder="Cantidad en BS."
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Ingreso</label>
                        <input type="date" class="form-control" id="dat_ingreso"></input>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Registro</label>
                        <input type="date" class="form-control" id="dat_aporte" disabled></input>
                    </div>
                    <div class="form-group">
                        <label>Hora de Registro</label>
                        <input type="datetime" class="form-control" id="hor_aporte" disabled></input>
                    </div>

                    <br>

                </form>
            </div>
            <div class="col-md-5">
                <form id="form2" clas="p-2">
                    <div class="form-group">
                        <label>Codigo Usuario</label>
                        <input type="text" class="form-control" id="txt_codUsuario"
                            value="<?php echo $_SESSION['pacodusu']; ?>" disabled></input>
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" id="txt_usuario"
                            value="<?php echo $_SESSION['canommie'] . " " . $_SESSION['capatmie'] . " " . $_SESSION['camatmie']; ?>"
                            disabled></input>
                    </div>
                </form>
            </div>


        </div>

            <div class="modal-footer col-md-10">
                <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center">
                    <i class="far fa-save ListarIngresos"></i>
                    Guardar
                </button>
                <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close ListarIngresos"></i>
                    Cancelar
                </button>
            </div>


    </div>
<!-- Page level plugins -->
<script src="/MRFSistem/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/MRFSistem/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts
<script src="/MRFSistem/js/demo/datatables-demo.js"></script>-->
<script src="/MRFSistem/Script/CodigoApp.js"></script>
<script src="/MRFSistem/Script/Ingresos.js"></script>