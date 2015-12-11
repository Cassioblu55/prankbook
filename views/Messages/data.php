<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	
	if(!empty($_GET['get'])){
		$get = $_GET['get'];
		//Data for index grid, send join the user table and prank table to get the prank name and the name of the prankster
		if($get == 'grid'){
			//Run one for pranks that I offer
			$query = "SELECT username, services.id thread_id, prank_name FROM services INNER JOIN users ON services.user_id = users.id  INNER JOIN prank ON services.prank_id = prank.id WHERE prank_id IN(SELECT id FROM prank WHERE prank.user_id=".$_SESSION['user']['id'].");";
			$provided = runQuery($query);
			
			//Run one for pranks that are requested of me
			$query = "SELECT username, services.id thread_id, prank_name FROM services INNER JOIN prank ON services.prank_id = prank.id INNER JOIN users ON prank.user_id = users.id WHERE services.user_id=".$_SESSION['user']['id'].";";
			$requested = runQuery($query);
			
			echo json_encode(array_merge($requested,$provided));
		}
		
	}

	?>