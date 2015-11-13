<?php 
//Admin
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	if(!empty($_GET['get'])){
		$get = $_GET['get'];
		//Will return all unapproved pranks
		if($get == 'unapprovedPranks'){
			$query = "SELECT * FROM prank WHERE approval_status='Pending';";
			echo json_encode(runQuery($query));
		}
		//Will return the approval status, prank name and username of all pranks
		else if($get == "allPranks"){
			$query = "SELECT prank.id, prank_name, username, approval_status FROM prank INNER JOIN users ON prank.user_id = users.id;";
			echo json_encode(runQuery($query));
		}	
	}
?>
