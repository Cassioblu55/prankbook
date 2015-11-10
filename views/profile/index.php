<?php 

	require_once '../../config/config.php';
	require_once $serverPath.'utils/requireLogin.php';
	
	include_once $serverPath.'views/templates/head.php';
?> 
Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, you are logged in!<br /> 

<div>This will allow a user to add services and change there profile.</div>

'<a ng-href="edit.php?id={{users.id}}" class ="btn btn-primary pull-left">Edit Profile</a>'

<a href="<?php echo $baseURL;?>views/services/edit.php">Provide Prank</a>

<?php include_once $serverPath.'views/templates/footer.php';?>
