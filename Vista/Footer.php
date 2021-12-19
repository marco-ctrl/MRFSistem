<?php
$dia = date('d');
$mes = date('m');
$anio = date('Y');

switch ($mes) {
    case '1':
        $mes = 'Enero';
        break;
    case '2':
        $mes = 'Febrero';
        break;
    case '3':
        $mes = 'Marzo';
        break;
    case '4':
        $mes = 'Abril';
        break;
    case '5':
        $mes = 'Mayo';
        break;
    case '6':
        $mes = 'Junio';
        break;
    case '7':
        $mes = 'Julio';
        break;
    case '8':
        $mes = 'Agosto';
        break;
    case '9':
        $mes = 'Septiembre';
        break;
    case '10':
        $mes = 'Octubre';
        break;
    case '11':
        $mes = 'Noviembre';
        break;
    case '12':
        $mes = 'Diciembre';
        break;

    default:
        # code...
        break;
}
?>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <!--<span>Copyright &copy; MRFSistem 2021</span>-->
            <span><?php echo ''.$dia.' de '.$mes.' de '.$anio ?></span>
        </div>
    </div>
</footer>
