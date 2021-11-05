<?php  

 	$connection = mysqli_connect("localhost", "root", "uajms", "mrfbermejobd");
	//mysqli_select_db("mrfbermejobd", $connection);
	$result = mysqli_query($connection, "SELECT * FROM aproion");
	$array = array();
	if($result){
		while ($row = mysqli_fetch_array($result)) {
			$equipo = utf8_encode($row['canompro']);
			array_push($array, $equipo); // equipos
		}
	}
?>

<html>
<head>
	<title>Autocomplete</title>
	<script type="text/javascript" src="Script/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<script type="text/javascript" src="Script/jquery-ui.js"></script>
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
					console.log(params)
					$.get("getEquipo.php", params, function (response) {
						console.log(response);
						var json = JSON.parse(response);
						if (json.status == 200){
							$("#nombre").html(json.canompro);
							//$("#avatar").attr("src", json.icono);
						}else{

						}
					}); // ajax
				}
			});
		});
	</script>

</body>
</html>