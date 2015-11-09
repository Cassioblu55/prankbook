<?php 
	require_once '../../config/config.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	//Will return all pranks from all ids
	if($_GET['get'] == 'Pranks'){
		$query = "SELECT prank_name, description, user_id, zipcode, operating_range FROM prank";
		echo json_encode(runQuery($query));
	}
	
	
	
	
	

?>
