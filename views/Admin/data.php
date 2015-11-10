<?php 
//Admin
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	//Will return all pranks from a given id
	if($_GET['get'] == 'myPranks'){
		$query = "SELECT * FROM prank;";
		echo json_encode(runQuery($query));
	}
	
	if(!empty($_GET['id'])){
		$query = "SELECT * FROM prank WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'].';';
		echo json_encode(runQuery($query));
	}
	
	
?>
