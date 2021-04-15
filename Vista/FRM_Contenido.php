<?php
session_start();
  
if(empty($_SESSION['active'])){
  header('location: ../');
}

?>
<head>
    <title>MRFIglesiaBermejo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <?php 
        include 'Estilos.php';
    ?>
    <?php 
        include 'Scripts.php';
    ?>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between">
    <a href="#" class="navbar-brand">Materia</a>
    <!--<ul class="navbar-nav ml-auto">-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="FRM_principal.php"><i class="fas fa-home"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" href="FRM_EscLideres.php"><i class="fas fa-school"></i> Escuela Lideres</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-sm-0">
            <input type="search" id="txt_buscar" class="form-control mr-ms-2" placeholder="Buscar Materia">

        </form>
    </div>

    <!--</ul>-->
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 p-3">
            <button type="button" id="btn_nuevo" class="btn btn-primary btn-block
                text-center"><i class="fas fa-plus-circle"></i>
                Agregar Contenido
            </button>
        </div>

    </div>
    <div id="lista" class="row">
        <div class="col-md-10">
            <div id="mensaje">
            </div>
            <h5 for="">Lista de Materias</h5>
            <div class="table-responsive" id="tb_buscar">
                <table class="table table-hover table-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>CODIGO</td>
                            <td>MATERIA</td>
                            <td>DESCRIPCION</td>
                            <td>DAR BAJA</td>
                            <td>MODIFICAR</td>
                        </tr>
                    </thead>
                    <tbody id="tb_contenido">

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div id="formulario">
    <div class="row">
        <div class="col-md-5">
            <form id="form" clas="p-2">
                <div class="form-group">
                    <input type="text" id="txt_contenido" placeholder="Nombre de Contenido" class="form-control"></input>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="txt_descripcion" placeholder="Descripcion" rows="3"></textarea>
                </div>
                <br>
                <div class="modal-footer">
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
            </form>
        </div>

    </div>

    </div>
    
</div>
<script src="/MRFIglesiaBermejo/Script/CodigoApp.js"></script>
<script src="/MRFIglesiaBermejo/Script/ContenidoApp.js"></script>