<?php 
//This will be the main landing page
require_once 'config/config.php';
include_once $serverPath.'utils/connection.php';

require_once $serverPath."utils/common.php";

$db = connect();

include_once $serverPath.'views/templates/head.php'; 
?>

<div>Welcome to Prankbook!</div>

<?php include_once $serverPath.'views/templates/footer.php';?>
