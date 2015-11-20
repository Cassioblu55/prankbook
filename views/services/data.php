<?php 
	require_once '../../config/config.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	//Will return all pranks from all ids
	if(!empty($_GET['get'])){
		$get = $_GET['get'];
		if($get == 'Pranks'){
			$query = "SELECT prank.*, users.username FROM prank INNER JOIN users ON users.id = prank.user_id WHERE approval_status='Approved';";
			echo json_encode(runQuery($query));
		}
		else if($get=="myOrders"){
			session_start();
			$pranks = "SELECT users.username, prank.*  FROM users INNER JOIN prank WHERE users.id=prank.user_id";
			$query = "SELECT * FROM services INNER JOIN (".$pranks.") AS prank ON services.prank_id=prank.id WHERE services.user_id=".$_SESSION['user']['id'].";";
			echo json_encode(runQuery($query));
		}
		
	}
	else if(!empty($_GET['id'])){
		$query = "SELECT * FROM prank WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'].';';
		echo json_encode(runQuery($query));
	}
	
?>
