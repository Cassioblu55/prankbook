<?php 

include_once '../../config/config.php';
require_once $serverPath.'utils/requireLogin.php';
require_once $serverPath.'utils/dataUpdateInsert.php';

//Will update all messages within the thread id to seen by the user currently logged in
if(!empty($_GET['thread_id'])){
		$update = "UPDATE messages SET is_read='Yes', read_at='".date("Y-m-d H:i:s")."'
				WHERE is_read='No' AND service_id=".$_GET['thread_id']." AND is_to=".$_SESSION['user']['id'].";";
		runInsert($update);
}

?>