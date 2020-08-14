<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a href="#" class="navbar-brand">Miembro</a>
    <!--<ul class="navbar-nav ml-auto">-->
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Miembro">
            <button class="btn btn-success my-2 my-sm-0" type="submit">
                Buscar
            </button>

        </form>
    <!--</ul>-->
</nav>

<div class=" p-2 container">
    <div id="App" class="row">
        <div class="col-md-12">
            <div id="mensaje">
                <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p class="mb-0">Miembro no encotrado</p>
                </div>
            </div>
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Listar Miembros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile">Registrar Miembros</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade show active" id="home">
                    <?php include 'Miembro/ListMiembro.php' ?>
                </div>
                <div class="tab-pane fade" id="profile">
                    <?php include 'Miembro/RegMiembro.php' ?>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<br>
<div class="container p-2">
    <div class="row">
        <div class="col-md-2 p-2">
            <div>
                <button type="button" id="btn_guardar" class="btn btn-primary btn-block
                                    text-center">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Guardar
                </button>
            </div>

        </div>
        <div class="col-md-2 p-2">
            <div>
                <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                                    text-center">
                    Nuevo
                </button>
            </div>
        </div>
    </div>
</div>
<script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>
<script src="/MRFIglesiaBermejo/Script/CrecimientoApp.js"></script>
<script src="/MRFIglesiaBermejo/Script/MiembroApp.js"></script>
<br>
<br>