<!--Profile-->
<?php
require_once '../../config/config.php';
require_once $serverPath . 'utils/requireLogin.php';
require_once $serverPath . 'utils/dataUpdateInsert.php';

$table = "users";
if (! empty ( $_POST )) {
	$data = [ 
			'firstname' => $_POST ['firstname'],
			'lastname' => $_POST ['lastname'],
			'email' => $_POST ['email'],
			'username' => $_POST ['username'],
			'zipcode'=> $_POST['zipcode']
			'user_id' => $_SESSION ['user'] ['id'] 
	];
	
	if (empty ( $_GET ['id'] )) {
		insert ( $table, $data );
		$added = true;
		header ( "Location: index.php" );
		die ( "Redirecting to index.php" );
	} else {
		//Normal update cannot be used here becuase it would allow anyone who is logged in to update anyone elses profile
		$update = "UPDATE " . $table . " SET ";
		foreach ( $data as $columnName => $value ) {
			$update .= $columnName . "='" . $value . "', ";
		}
		$update = substr ( $update, 0, strlen ( $update ) - 2 ) . " WHERE id=" . $_GET ['id'] ." AND user_id=".$_SESSION['user']['id'].";";
		echo $update;
		runInsert ( $update );
		header ( "Location: index.php" );
		die ( "Redirecting to index.php" );
	}
}

include_once $serverPath . 'views/templates/head.php';
?>

<div ng-controller="usersAddEditController">
	<form
		action="edit.php<?php if(!empty($_GET['id'])){ echo "?id=".$_GET['id'];}?>"
		method="post">
		<div class="col-md-6">
			<div
				class="panel <?php if($added){echo "panel-success";} else{echo "panel-default";} ?>">
				<div class="panel-heading">
					<div class="panel-title">{{addOrEdit}} users</div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="prank_name">First Name</label> <input type="text"
							class="form-control" name="prank_name"
							ng-model="users.firstname" required="required"
							placeholder="First Name" />
					</div>
					<div class="form-group">
						<label for="prank_name">Last Name</label> <input type="text"
							class="form-control" name="prank_name"
							ng-model="users.lastname" required="required"
							placeholder="Last Name" />
					</div>
					<div class="form-group">
						<label for="description">Email</label>
						<textarea class="form-control" name="description"
							ng-model="users.email" placeholder="Email"></textarea>
					</div>
					<div class="form-group">
						<label for="operating_range">Username</label> <input
							type="text" class="form-control" name="operating_range"
							ng-model="users.username" placeholder="Username" />
					</div>
					<div class="form-group">
						<label for="zipcode">Zipcode</label> <input type="number"
							class="form-control" name="zipcode" ng-model="users.zipcode"
							placeholder="Zipcode" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">{{saveOrUpdate}}</button>
						<a class="btn btn-danger" href="index.php">Cancel</a>
					</div>
					<div style='<?php if($added){echo "color:#5cb85c";}else{echo "display:none";}?>'>Added
						User</div>
				</div>
			</div>
		</div>

	</form>
	<div id="users" style="display: none"><?php if(!empty($_GET['id'])){echo $_GET['id'];}?></div>

</div>

<script type="text/javascript">
var users = document.getElementById("users").textContent
app.controller("usersAddEditController", ['$scope', "$http" , function($scope, $http){
	console.log(users);
	if(users){
		$http.get('data.php?id='+users).
		then(function(response){
			console.log(response);
			$scope.users = response.data[0];
			$scope.users.zipcode = Number($scope.users.zipcode);
			
		});
	}
		$scope.addOrEdit = (!users) ? "Add" : "Edit";
		$scope.saveOrUpdate = (!users) ? "Save" : "Update"

			
}]);
</script>
