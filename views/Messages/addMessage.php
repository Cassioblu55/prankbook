<?php  
require_once '../../config/config.php';
include_once $serverPath.'utils/requireLogin.php';
include_once $serverPath.'utils/dataLookUp.php';
include_once $serverPath.'utils/dataUpdateInsert.php';

$table = 'messages';
$_POST = json_decode(file_get_contents('php://input'), true);
if(!empty($_POST)){
	
	//Determine if user bought prank or provides prank
	$query = "SELECT user_id as id FROM services WHERE id=".$_GET['thread_id'].";";
	$bought = runQuery($query)[0];
	if($bought['id'] == $_SESSION['user']['id']){
		$query = "SELECT prank.user_id as id FROM prank INNER JOIN services ON prank.id = services.prank_id WHERE services.id=".$_GET['thread_id'].";";
		$prankster = runQuery($query)[0];
		$is_to = $prankster['id'];
	}else{
		$is_to = $bought['id'];
		
	}
	$data = [
		'is_from' => $_SESSION['user']['id'],
		'is_to' => $is_to,
		'message' => $_POST['message'],
		'service_id' => $_GET['thread_id'],
		'time_sent' => date("Y-m-d H:i:s")
	];
	insert($table, $data);
}

?>