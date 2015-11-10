<?php 
	include_once '../../config/config.php';
	require_once $serverPath . 'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	
	if(!empty($_GET['get']) && $_GET['get']=="fullEditableUserData"){
		$query = "SELECT firstname, lastname, email, username, zipcode FROM users WHERE id=".$_SESSION['user']['id'].";";
		echo json_encode(runQuery($query)[0]);	
	}

?>