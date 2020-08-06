<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a href="#" class="navbar-brand">Miembro</a>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Miembro">
            <button class="btn btn-success my-2 my-sm-0" type="submit">
                Buscar
            </button>

        </form>
    </ul>
</nav>

<div class=" p-2 container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4" id="mensaje">
                <div class="card-body">
                    <ul id="container"></ul>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Listar Miembros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile">Registrar Miembros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#crecimiento">Crecimiento Espiritual</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#asignar">Asignar Celula</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade show active" id="home">
                    <?php include 'Miembro/ListMiembro.php' ?>
                </div>
                <div class="tab-pane fade" id="profile">
                    <?php include 'Miembro/RegMiembro.php' ?>
                </div>
                <div class="tab-pane fade" id="crecimiento">
                    <?php include 'Miembro/CreEspiritual.php'?>
                </div>
                <div class="tab-pane fade" id="asignar">
                    <div class="container p-4">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="form5">
                                    <div class="form-group">
                                        <label for="">Celula</label>
                                        <select id="cbx_celula" class="form-control">Celula

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Funcion en la Celula</label>
                                        <select id="cbx_funcion" class="form-control btn-primary">
                                            <option value="DICIPULO/A">DICIPULO/A</option>
                                            <option value="ASISTENTE">ASISTENTE</option>
                                            <option value="ANFITRION">ANFITRION</option>
                                            <option value="LIDER">LIDER</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>

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
<script src="/MRFIglesiaBermejo/Script/MiembroApp.js"></script>
<br>
<br>