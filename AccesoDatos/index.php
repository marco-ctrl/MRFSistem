<?php  

 	$connection = mysql_connect("localhost", "root", "");
	mysql_select_db("ligamx", $connection);
	$result = mysql_query("SELECT * FROM club", $connection);
	$array = array();
	if($result){
		while ($row = mysql_fetch_array($result)) {
			$equipo = utf8_encode($row['seudonimo']);
			array_push($array, $equipo); // equipos
		}
	}
?>

<html>
<head>
	<title>Autocomplete</title>
	<script type="text/javascript" src="jquery-1.12.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui.css">
	<script type="text/javascript" src="jquery-ui.js"></script>
</head>
<body>

	<input id="tag">
	<br>
	<label>Equipo:</label>
	<h2 id="nombre"></h2>
	<img src="" id="avatar">

	<script type="text/javascript">
		$(document).ready(function () {
			var items = <?= json_encode($array) ?>

			$("#tag").autocomplete({
				source: items,
				select: function (event, item) {
					var params = {
						equipo: item.item.value
					};
					$.get("getEquipo.php", params, function (response) {
						var json = JSON.parse(response);
						if (json.status == 200){
							$("#nombre").html(json.nombre);
							$("#avatar").attr("src", json.icono);
						}else{

						}
					}); // ajax
				}
			});
		});
	</script>

</body>
</html>