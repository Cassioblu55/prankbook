<?php 
    // First we execute our common code to connection to the database and start the session 
    require("../../utils/common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: /~cbhudson/informatics_project/prankbook/views/login/"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can display the user's username to them by reading it from the session array.  Remember that because 
    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 
    include_once '../templates/head.php';
?> 
<div class="container-fluid">
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
</div>
<?php include_once '../templates/footer.php';?>