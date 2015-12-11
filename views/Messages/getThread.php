<?php 
require_once '../../config/config.php';
include_once $serverPath.'utils/requireLogin.php';
include_once $serverPath.'utils/dataLookUp.php';
//This will return the username of the person that the thread id is assoicated with
if(!empty($_GET['get']) && !empty($_GET['thread_id'])){
	$get = $_GET['get'];
	if($get == 'getMessageTo'){
		//Look in the services table to see if the logged in user ordered the prank
		$query = "SELECT user_id as id, username FROM services INNER JOIN users ON users.id = services.user_id WHERE services.id=".$_GET['thread_id'].';';
		$ordered = runQuery($query)[0];
		if($ordered['id'] == $_SESSION['user']['id']){
			//If they did look in the prank table to find the username of the person offering the prank, this is who they are messaging
			$query = "SELECT username FROM users INNER JOIN prank ON prank.user_id = users.id INNER JOIN services ON services.prank_id = prank.id WHERE services.id=".$_GET['thread_id'].';';
			$provided = runQuery($query)[0];
			echo $provided['username'];
		}else{
			//They are messaging the person ordering the prank, so return that
			echo $ordered['username'];
		}
	}
	
}
//Will return the messages
else if(!empty($_GET['thread_id'])){
	$query = "SELECT messages.id, is_from, message, time_sent, read_at, is_read FROM messages WHERE service_id=".$_GET['thread_id'].";";
	echo json_encode(runQuery($query));
}

?>