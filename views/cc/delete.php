<?php
require_once '../../config/config.php';
require_once $serverPath .'utils/requireLogin.php';
require_once $serverPath.'utils/dataUpdateInsert.php';

if(!empty($_GET['id'])){
	$table = "cc_info";
	$insert = "DELETE FROM ".$table." WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'].";";
	echo $insert;
	runInsert($insert);
}
		
		
?>