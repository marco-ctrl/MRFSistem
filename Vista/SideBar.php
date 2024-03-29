<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <!--<i class="fas fa-laugh-wink"></i>-->
            
            <img src="/MRFSistem/logo.jpg" alt="" width="70%" class="img-profile rounded-circle">
            <!--<img src="/MRFSistem/image.jpg" alt="" width="70%" class="img-profile rounded-circle">-->
        </div>
        <div class="sidebar-brand-text mx-3">MRFSistem</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="FRM_principal.php">
            <i class="fas fa-home"></i>
            <span>Inicio</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="FRM_Mapa">
            <i class="fas fa-map-marked-alt"></i> 
            <span>Mapa Celulas</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-archive"></i>
            <span>Modulos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Modulos:</h6>
                <a class="collapse-item" href="FRM_Miembro"><i class="fas fa-users"></i> Miembros</a>
                <a class="collapse-item" href="FRM_Usuario"><i class="fas fa-user"></i> Usuarios</a>
                <a class="collapse-item" href="FRM_Celula"><i class="fas fa-home"></i> Celula</a>
                <a class="collapse-item" href="FRM_Finanzas"><i class="fas fa-file-invoice-dollar"></i>
                    Control de Finazas</a>
                <a class="collapse-item" href="FRM_EscLideres"><i class="fas fa-school"></i> Escuela de
                    Lideres</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="far fa-file-pdf"></i>
            <span>Reportes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Reportes:</h6>
                <a class="collapse-item" href="FRM_InfoMiembro"><i class="far fa-file-pdf"></i> Informacion de
                    Miembro</a>
                <a class="collapse-item" href="FRM_InfoUsuario"><i class="far fa-file-pdf"></i> Informacion de
                    Usuarios</a>
                <a class="collapse-item" href="FRM_InfoCelula"><i class="far fa-file-pdf"></i> Reporte de
                    Celulas</a>
            </div>
        </div>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sistema
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-server"></i>
            <span>Base de Datos</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Base de Datos</h6>
                <a class="collapse-item" id="mn_respaldo" href="#"><i class="fas fa-server"></i> Respaldar BD</a>
                <a class="collapse-item" href="FRM_RestaurarBD"><i class="fas fa-server"></i> Restaurar BD</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/MRFSistem/ManualUsuario.pdf">
            <i class="fas fa-file-pdf"></i> 
            <span>Manual de Usuario</span></a>
    </li>

    <!-- Nav Item - Charts -->

    <!-- Nav Item - Tables -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <!--<div class="text-center d-none d-md-inline">-->
    <div class="text-center d-sm-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>