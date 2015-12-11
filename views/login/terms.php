<?php
// This will be the terms and conditions page
require_once '../../config/config.php';
//this the header and menu bar
include_once $serverPath . 'views/templates/head.php';
?>

<div class="container-fluid">
<!--this the terms and conditions file that would show the user what they will have to agree to before creating an account-->
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<h3 class="panel-title pull-left">Terms and conditions</h3>
		</div>
		<div class="panel-body">
			<p>Terms</p>
			<p>Conditions</p>			
		</div>
	</div>
</div>

<?php include_once $serverPath.'views/templates/footer.php';
//this is the footer file?>