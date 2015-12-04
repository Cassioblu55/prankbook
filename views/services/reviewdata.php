<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	//Will return all reviews from a given id
	if(!empty($_GET['get']) && $_GET['get'] == 'reviews'){
		$query = "SELECT reviews.*, users.username FROM reviews INNER JOIN users ON users.id = reviews.user_id";
		echo json_encode(runQuery($query));
	}
	if(!empty($_GET['id'])){
		$query = "SELECT * FROM reviews WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'].';';
		echo json_encode(runQuery($query));
	}
	if(!empty($_GET['reviewsByPrank'])){
		$query = "SELECT reviews.*, users.username FROM reviews INNER JOIN users ON users.id = reviews.user_id WHERE prank_id=".$_GET['reviewsByPrank'];
		echo json_encode(runQuery($query));
		
	}
	
	
	
	
	

?>
