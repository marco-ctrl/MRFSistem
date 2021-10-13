$(document).ready(function () {
    
    ListarMiembro();

    function ListarMiembro() {//lista usuarios
        $.ajax({
            url: '/MRFIglesiaBermejo/AccesoDatos/Alumno/ListarAlumno.php',
            type: 'GET',
            success: function (response) {
                if (response != 'false') {
                    let miembros = JSON.parse(response);
                    let plantilla = '';
                    miembros.forEach(miembros => {
                        plantilla = MostrarTabla(plantilla, miembros);
                    });
                    $('#tb_alumnos').html(plantilla);
                }
    
            }
        });
    }
    
    
    function MostrarTabla(plantilla, miembros) {
        plantilla +=
            `<tr UserDocu="${miembros.pacodalu}" class="table-light">
                <td>${miembros.cacidmie}</td>
                <td>${miembros.canommie}</td>
                <td>${miembros.capatmie} ${miembros.camatmie}</td>
                <td>${miembros.cadirmie}</td>
                <td>${miembros.cacelmie}</td>
                <td>${miembros.canomcel}</td>
                <td>${miembros.cafunmie}</td>
                <td>
                    <button class="ver-alumno btn btn-primary">Ver
                    </button>
                </td>
            </tr>`
        return plantilla;
    }
    
    $(document).on('click', '.ver-alumno', function () {//elimina miembros
    
        let elemento = $(this)[0].parentElement.parentElement;
            let pacodalu = $(elemento).attr('UserDocu');
            console.log('dando de baja...');
            $.post('/MRFSistem/ReportesPDF/InformacionAlumnos.php',
                { pacodalu }, function (responce) {

    
                });
        
    });
});
