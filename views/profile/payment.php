<?php 

	require_once '../../config/config.php';
	require_once $serverPath.'utils/requireLogin.php';
	
	include_once $serverPath.'views/templates/head.php';
?> 
Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, you are logged in!<br /> 

<div>This will allow a user to edit their payment information.</div>



<?php include_once $serverPath.'views/templates/footer.php';?>