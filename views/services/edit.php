<?php include_once '../templates/head.php';?>
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
<?php include_once '../templates/footer.php';?>