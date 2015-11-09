<?php 

	require_once '../../config/config.php';
	require_once $serverPath.'utils/requireLogin.php';
	
	include_once $serverPath.'views/templates/head.php';
?> 
Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, you are logged in!<br /> 

<div>This where will let people change their profile.</div>




<a href="payment.php" class ="btn btn-primary pull-right">Edit Payment Information</a>



<?php include_once $serverPath.'views/templates/footer.php';?>