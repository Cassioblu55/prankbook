<?php 
require_once '../../config/config.php';
include_once $serverPath.'utils/requireLogin.php';
include_once $serverPath.'utils/dataLookUp.php';

if(!empty($_GET['get']) && !empty($_GET['thread_id'])){
	$get = $_GET['get'];
	if($get == 'getMessageTo'){
		$query = "SELECT user_id as id, username FROM services INNER JOIN users ON users.id = services.user_id WHERE services.id=".$_GET['thread_id'].';';
		$ordered = runQuery($query)[0];
		if($ordered['id'] == $_SESSION['user']['id']){
			$query = "SELECT username FROM users INNER JOIN prank ON prank.user_id = users.id INNER JOIN services ON services.prank_id = prank.id WHERE services.id=".$_GET['thread_id'].';';
			$provided = runQuery($query)[0];
			echo $provided['username'];
		}else{
			echo $ordered['username'];
		}
	}
	
}
else if(!empty($_GET['thread_id'])){
	$query = "SELECT messages.id, is_from, message, time_sent, read_at, is_read FROM messages WHERE service_id=".$_GET['thread_id'].";";
	echo json_encode(runQuery($query));
}

?>