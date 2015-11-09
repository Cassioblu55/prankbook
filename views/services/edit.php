<?php 

	include_once '../../config/config.php';
    // First we execute our common code to connection to the database and start the session 
    require_once($serverPath."utils/requireLogin.php");

	include_once $serverPath.'views/templates/head.php';
?>

<div class="container-fluid">
<div class="row">
	<div class="col-sm-12">
		<form action="../../controllers/insert.php" method="post">
			<input type="hidden" name="table" value="services">
			<div class="form-group">
				<label for="name">Service Name</label> <input type="text"
					class="form-control" name="name" />
			</div>
			<div class="form-group">
				<label for="prankster_id">Service Provider</label> <input
					type="number" class="form-control" name="prankster_id" />
			</div>
			<button type="submit">Add</button>

		</form>
	</div>
</div>
</div>
<?php include_once  $serverPath.'views/templates/footer.php';?>