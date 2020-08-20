<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a href="#" class="navbar-brand">Miembro</a>
    <!--<ul class="navbar-nav ml-auto">-->
    <form class="form-inline my-2 my-lg-0">
        <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Miembro">
        <button class="btn btn-success my-2 my-sm-0 d-none d-sm-none d-md-block" type="submit">
            <i class="fas fa-search"></i> Buscar
        </button>

    </form>
    <!--</ul>-->
</nav>

<div class=" p-2 container">
    <div class="col-md-4 p-2">
        <div>
            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                                    text-center"><i class="fas fa-plus-circle"></i> Agregar Miembro
            </button>
        </div>
    </div>
    <div id="App" class="row">
        <div class="col-md-12">
            <div id="mensaje">
                
            </div>
            <div class="" id="home">
                <?php include 'Miembro/ListMiembro.php' ?>
            </div>
            <div class="" id="profile">
                <?php include 'Miembro/RegMiembro.php' ?>
            </div>

        </div>
    </div>
</div>

<br>
<script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>

<script src="/MRFIglesiaBermejo/Script/MiembroApp.js"></script>
<br>
<br>