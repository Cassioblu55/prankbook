<?php 

include_once '../../config/config.php';
require_once $serverPath.'utils/requireLogin.php';
require_once $serverPath.'utils/dataUpdateInsert.php';

if(!empty($_GET['thread_id'])){
		$update = "UPDATE messages SET is_read='Yes', read_at='".date("Y-m-d H:i:s")."'
				WHERE is_read='No' AND service_id=".$_GET['thread_id']." AND is_to=".$_SESSION['user']['id'].";";
		echo $update;
		runInsert($update);
}

?>