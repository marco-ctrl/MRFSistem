<?php 
session_start();
  
if(empty($_SESSION['active'])){
  header('location: ../');
}

    
?>

<nav class="navbar navbar-expand-lg navbar-primary bg-dark">
    <a href="#" class="navbar-brand">Materia</a>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar">
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
                Nuevo Aporte
            </button>
        </div>

    </div>
    <div id="lista" class="row">
        <div class="col-md-12">
            <div id="mensaje">
            </div>
            <h5 for="">Lista de Aportes Economicos</h5>
            <div class="table-responsive" id="tb_buscar">
                <table class="table table-hover table-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>CODIGO</td>
                            <td>CANTIDAD en BS</td>
                            <td>FECHA Y HORA DE REGISTRO</td>
                            <td>USUARIO</td>
                            <td>DAR BAJA</td>
                            <td>MODIFICAR</td>
                        </tr>
                    </thead>
                    <tbody id="tb_economico">

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div id="formulario">
        <div class="row">
            <div class="col-md-5">
                <form id="form1" clas="p-2">
                    <div class="form-group">
                        <label>Cantidad de Aporte Economico</label>
                        <input type="number" id="txt_cantidad" placeholder="Cantidad en BS."
                            class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Registro</label>
                        <input type="datetime" class="form-control" id="dat_aporte"
                            value="<?php echo date("d/m/y");?>" disabled></input>
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
                            value="<?php echo $_SESSION['canommie']." ".$_SESSION['capatmie']." ".$_SESSION['camatmie']; ?>"
                            disabled></input>
                    </div>
                </form>
            </div>


        </div>
        
            <div class="modal-footer col-md-10">
                <button type="button" id="btn_guardar" class="btn btn-primary btn-lg
                                    text-center">
                    <i class="far fa-save gi-2x"></i>
                    Guardar
                </button>
                <button type="button" id="btn_cancelar" class="btn btn-danger btn-lg
                        text-center"><i class="far fa-window-close gi-2x"></i>
                    Cancelar
                </button>
            </div>
        

    </div>

</div>
<script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>
<script src="/MRFIglesiaBermejo/Script/AporteEconomicoApp.js"></script>