<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	//Will return all pranks from a given id
	if($_GET['get'] == 'Reviews'){
		$query = "SELECT id, rating, user_id, comments FROM reviews";
		echo json_encode(runQuery($query));
	}
	
	
	
	
	
	

?>
