<?php
require_once '../../config/config.php';
require_once $serverPath .'utils/requireLogin.php';
require_once $serverPath.'utils/dataUpdateInsert.php';

//Simple enough will delete a credit card of the logged in user given an id from the url
if(!empty($_GET['id'])){
	$table = "cc_info";
	$insert = "DELETE FROM ".$table." WHERE id=".$_GET['id']." AND user_id=".$_SESSION['user']['id'].";";
	runInsert($insert);
}
		
		
?>