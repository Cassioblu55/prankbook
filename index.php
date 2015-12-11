<?php
// This will be the main landing page
require_once 'config/config.php';
//this grabs the header and menu file
include_once $serverPath . 'views/templates/head.php';
?>

<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<h3 class="panel-title pull-left">Welcome to Prankbook!</h3>
		</div>
		<div class="panel-body">
			<p>Want to pie your friend in the face but you simply can't be asked? You came to the right place. Prankbook is in the bussiness of connecting people who want pranks with people who want to do them.</p>
			<p>Click the "Get Prank" Button above and start on your worldwind adventure. You'll laugh, your friends might cry and if your not careful you just might learn something.</p>
			<a href="<?php echo $baseURL;?>views/info/aboutUs.php">About Us</a>
		</div>
		<div>
		<!--this is the video that is embedded on the home page-->
			<iframe width="560" height="315" src="https://www.youtube.com/embed/bAACPEecQ3Q" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
</div>



<?php include_once $serverPath.'views/templates/footer.php';
//this grabs the footer file?>
