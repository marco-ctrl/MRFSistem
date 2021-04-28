<nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-primary border-bottom">
    <button class="btn btn-primary" id="menu-toggle"><i class="navbar-toggler-icon"></i></button>

    <form class="form-inline position-relative my-2 my-lg-0 p-2">
        <input type="text" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar">
        <button class="btn btn-search position-absolute btn-success"><i class="fas fa-search gi-2x"></i></button>
    </form>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-user"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo $_SESSION['caurlfot']; ?>" class="img-fluid rounded-circle avatar mr-2" alt="">
                    <?php echo $_SESSION['canomusu']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Mi Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Salir.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                </div>
            </li>
        </ul>
    </div>
</nav>