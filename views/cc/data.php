<?php 
	include_once '../../config/config.php';
	require_once $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	if(!empty($_GET['id'])){
		$query = "SELECT * FROM cc_info WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'];
		echo json_encode(runQuery($query)[0]);
	}
	else if(!empty($_GET['columns'])){
		$columns = $_GET['columns'];
		if($columns == "lastFour"){
			$query = "SELECT id, concat('***********',cc_last) AS cc_last FROM cc_info WHERE user_id=".$_SESSION['user']['id'];
			echo json_encode(runQuery($query));
		}
		else if($columns == 'grid'){
			$query = "SELECT id, concat('***********',cc_last) AS cc_last, billing_address FROM cc_info WHERE user_id=".$_SESSION['user']['id'];
			echo json_encode(runQuery($query));
		}
	}
	
?>