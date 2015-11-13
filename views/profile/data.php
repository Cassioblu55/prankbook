<?php 
	include_once '../../config/config.php';
	require_once $serverPath . 'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	$id = $_SESSION['user']['id'];
	
	if(!empty($_GET['get'])){
		$get = $_GET['get'];
		if($get == "fullEditableUserData"){
			$query = "SELECT firstname, lastname, email, username, zipcode FROM users WHERE id=".$id.";";
			echo json_encode(runQuery($query)[0]);	
		}
		else if($get == "myData"){
			$query = "SELECT firstname, lastname, username, admin FROM users WHERE id=".$id.";";
			echo json_encode(runQuery($query)[0]);
		}
	}


?>