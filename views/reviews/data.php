<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	//Will return all reviews from a given id
	if($_GET['get'] == 'reviews'){
		$query = "SELECT * FROM reviews";
		echo json_encode(runQuery($query));
	}
	if(!empty($_GET['id'])){
		$query = "SELECT * FROM reviews WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'].';';
		echo json_encode(runQuery($query));
	}
	
	
	
	
	

?>
