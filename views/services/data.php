<?php 
	require_once '../../config/config.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	//Will return all pranks from all ids
	if($_GET['get'] == 'Pranks'){
		$query = "SELECT prank.*, users.username FROM prank INNER JOIN users ON users.id = prank.user_id;";
		echo json_encode(runQuery($query));
	}
	
	if(!empty($_GET['id'])){
		$query = "SELECT * FROM prank WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'].';';
		echo json_encode(runQuery($query));
	}
	
	

?>
