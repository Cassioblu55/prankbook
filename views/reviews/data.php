<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	//Will return all reviews from a given id
	if(!empty($_GET['get']) && $_GET['get'] == 'reviews'){
		$query = "SELECT reviews.*, prank.prank_name FROM reviews INNER JOIN prank ON reviews.service_id=prank.id WHERE reviews.user_id=".$_SESSION['user']['id'].';';
		echo json_encode(runQuery($query));
	}
	if(!empty($_GET['id'])){
		$query = "SELECT * FROM reviews WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'].';';
		echo json_encode(runQuery($query));
	}
	
	
	
	
	

?>
