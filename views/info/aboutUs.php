<?php
// This will be the main landing page
require_once '../../config/config.php';
//this is the header and menu file
include_once $serverPath . 'views/templates/head.php';
?>
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<h3 class="panel-title pull-left">About Us</h3>
		</div>
		<div class="panel-body">
		<!--this are some quotes about pranks-->
			<p>Prankbook started with a humble dream:</p>
			<p>"I love likes watching prank videos on Youtube. But wouldn't it be better if the people in the videos were my friends, family, or coworkers?"</p>
			<p>From this simple idea sprang prankbook. The worlds first (as far as I know) prankster connection site. Where the worlds most promante pranksters will be able to apply there craft and people from all over the world will be able to get top quaility pranks for a reasonable price.</p>
			<p>Prankbooks mission is not only to connect pranksters but we seek no less then to elevate the art of the prank to the status of that of paintings or cinema. We are not mearly a collection of pranksters, we are prank artists. And prankbook was founded to help pranksters and that is exaclty what we seek to do. Our dream is that one day a beautifully exucated prank will be seen in the same standing as creating a Renaissance masterwork.</p>
			<p>"On the highest throne in the world, we are seated still on our asses." ― Michel de Montaigne</p>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<h3 class="panel-title pull-left">Creators of the Website</h3>
		</div>
		<!--this is the creators of the website-->
		<div class="panel-body">
			<p>Cassio Hudson</p>		
			<p>Conrad Metz</p>		
			<p>Daycara Anderson</p>		
		</div>
		
	</div>
</div>
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
		<!--this is how you can contact the administrators-->
			<h3 class="panel-title pull-left">Contact Administrators</h3>
		</div>
		<div class="panel-body">
			<p>prankbook@gmail.com</p>
			<p>111-111-1111</p>			
		</div>
	</div>
</div>

<?php include_once $serverPath.'views/templates/footer.php';
//this the the footer file?>