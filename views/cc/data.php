<?php 
	include_once '../../config/config.php';
	require_once $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	if(!empty($_GET['id'])){
		//This will return the credit card with the id given in url, but only if the person who is logged in owns the credit card
		$query = "SELECT * FROM cc_info WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'];
		echo json_encode(runQuery($query)[0]);
	}
	else if(!empty($_GET['columns'])){
		$columns = $_GET['columns'];
		if($columns == "lastFour"){
			//This is used for selecting which credit card will be used when ordering a prank
			$query = "SELECT id, concat('***********',cc_last) AS cc_last FROM cc_info WHERE user_id=".$_SESSION['user']['id'];
			echo json_encode(runQuery($query));
		}
		else if($columns == 'grid'){
			//This is used when showing all of the credit cards the user has saved
			$query = "SELECT id, concat('***********',cc_last) AS cc_last, billing_address FROM cc_info WHERE user_id=".$_SESSION['user']['id'];
			echo json_encode(runQuery($query));
		}
	}
	
?>