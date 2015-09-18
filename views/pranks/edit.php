<?php include_once '../templates/head.php';?>
<div class="row">
	<div class="col-sm-12">
		<form action="../../controllers/insert.php" method="post">
			<input type="hidden" name="table" value="prank_request">
			<div class="form-group">
				<label for="name">Prank Name</label> <input type="text"
					class="form-control" name="name" />
			</div>
			<div class="form-group">
				<label for="date">Prank Date</label> <input type="date"
					class="form-control" name="date" />
			</div>
			<div class="form-group">
				<label for="customer_id">Customer</label> <input type="number"
					class="form-control" name="customer_id" />
			</div>
			<div class="form-group">
				<label for="service_id">Prank</label> <input type="number"
					class="form-control" name="service_id" />
			</div>
			<button type="submit">Add</button>

		</form>
	</div>
</div>
<?php include_once '../templates/footer.php';?>