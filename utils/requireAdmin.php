<?php 
	//Include this instead of require login when a user needs to be an admin in order to see page content
	include_once $serverPath.'utils/connection.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	
	$query = "SELECT admin FROM users WHERE id=".$_SESSION['user']['id'];
	$admin_status = runQuery($query)[0]['admin'];
	if($admin_status == 0){
		header("Location: ". $baseURL."views/login/");
		die("Redirecting to login");
	}
	

?>