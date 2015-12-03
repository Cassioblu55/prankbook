<?php 
	include_once '../../config/config.php';
	require_once $serverPath . 'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	$id = $_SESSION['user']['id'];
	
	if(!empty($_GET['get'])){
		$get = $_GET['get'];
		if($get == "fullEditableUserData"){
			$query = "SELECT firstname, lastname, email, username, zipcode FROM users WHERE id=".$id.";";
			echo json_encode(runQuery($query)[0]);	
		}
		else if($get == "myData"){
			$query = "SELECT id, firstname, lastname, username, admin FROM users WHERE id=".$id.";";
			echo json_encode(runQuery($query)[0]);
		}
		else if($get == "requestedPranks"){
			$query = "SELECT services.id, username, services.comments, prank_name, service_address FROM services INNER JOIN users ON services.user_id = users.id INNER JOIN prank ON services.prank_id = prank.id WHERE prank_status='Requested' AND prank_id IN (SELECT id FROM prank WHERE user_id=".$_SESSION['user']['id'].');';
			echo json_encode(runQuery($query));
		}
		else if($get =='unreadMessages'){
			$query = "SELECT service_id AS thread_id, users.username, title, time_sent FROM messages INNER JOIN users ON users.id = is_from WHERE is_read = 'No' AND is_to=".$_SESSION['user']['id'].";";
			echo json_encode(runQuery($query));
		}
		else if($get == 'myReviews'){
			$base = "SELECT id, rating, user_id, comments, prank_name FROM reviews INNER JOIN (SELECT prank_name, services.id as request_id, prank_id FROM services INNER JOIN prank ON services.prank_id = prank.id) as services ON services.request_id = reviews.service_id WHERE prank_id IN(SELECT id FROM prank WHERE user_id =".$_SESSION['user']['id'].")";
			$query = "SELECT base.id, prank_name, rating, comments, username FROM users INNER JOIN (".$base.") AS base ON base.user_id = users.id;";
			echo json_encode(runQuery($query));
			
		}
		
	}


?>