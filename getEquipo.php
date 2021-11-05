<?php 
	$seudonimo = $_GET['equipo'];
	$connection = mysqli_connect("localhost", "root", "uajms", "mrfbermejobd");
	//mysqli_select_db(, $connection);
	//mysqli_set_charset("utf8");
	$sql = "SELECT * FROM aproion WHERE canompro LIKE '$seudonimo' LIMIT 1";
	$result = mysqli_query($connection, $sql);
	if (mysqli_num_rows($result) > 0) {
		$equipo = mysqli_fetch_object($result);
		$equipo->status = 200;
		echo json_encode($equipo);
	}else{
		$error = array('status' => 400);
		echo json_encode((object)$error);
	}