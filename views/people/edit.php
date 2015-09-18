<?php include_once '../templates/head.php';?>
<div class="row">
	<div class="col-sm-12">
		<form action="../../controllers/insert.php" method="post">
			<input type="hidden" name="table" value="people">
			<div class="form-group">
				<label for="firstname">First Name</label> <input type="text"
					class="form-control" name="firstname" />
			</div>
			<div class="form-group">
				<label for="lastname">Last Name</label> <input type="text"
					class="form-control" name="lastname" />
			</div>
			<div class="form-group">
				<label for="email">Email</label> <input type="email"
					class="form-control" name="email" />
			</div>
			<button type="submit">Add</button>

		</form>
	</div>
</div>
<?php include_once '../templates/footer.php';?>