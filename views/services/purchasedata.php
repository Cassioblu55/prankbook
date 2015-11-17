<?php 
	require_once '../../config/config.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	//Will return all pranks from all ids
	if($_GET['get'] == 'services'){
		$query = "SELECT * FROM services;";
		echo json_encode(runQuery($query));
	}
	
	if(!empty($_GET['id'])){
		$query = "SELECT * FROM services WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'].';';
		echo json_encode(runQuery($query));
	}
	
	

?>