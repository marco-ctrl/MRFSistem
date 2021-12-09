$(document).ready(function () {
    const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var mymap = L.map('map').setView([-22.735938864584394, -64.34173274785282], 15);
    L.tileLayer(tilesProvider, {
        maxZoom: 18,
    }).addTo(mymap);
    //Marcador en el mapa//
    var marker = L.marker([-22.735938864584394, -64.34173274785282]).addTo(mymap).bindPopup('<center><h6>Ministerio Restauracion Familiar <br/> Iglesia Bermejo</h6></center>');

    var punto;

    ubicacionCelulas();

    function ubicacionCelulas(){
        $.ajax({
            type: "GET",
            url: "/MRFSistem/AccesoDatos/Celula/UbicacionCelulas.php",
            success: function (response) {
                console.log(response);
                const celula = JSON.parse(response);
                celula.forEach(usu => {
                    let plantilla='<h6 align="center">INFORMACION</h6><hr><div class="row">'+
                                        '<div class="col-4">'+
                                            '<div class="form-group">'+
                                                '<label>Celula:</label><br>'+
                                                '<label>Numero:</label>'+
                                                '<label>Lider:</label>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-8">'+
                                            '<div class="form-group">'+
                                                '<label>'+usu.canomcel+'</label><br>'+
                                                '<label>'+usu.canumcel+'</label>'+
                                                '<label>'+usu.canommie+' '+usu.capatmie+' '+usu.camatmie+'</label>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
                    punto=L.marker([usu.calatcel, usu.calogcel]).addTo(mymap).bindPopup(plantilla);

                });
            }
        });
    }

});