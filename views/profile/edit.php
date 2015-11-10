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
			'zipcode'=> $_POST['zipcode'],
	];
	
	$constraints = ['id' => $_SESSION['user']['id']];
	updateWithConstratints($table, $data, $constraints);
	header ( "Location: index.php" );
	die ( "Redirecting to index.php" );
}

include_once $serverPath .'views/templates/head.php';
?>

<div ng-controller="userAddEditController">
	<form
		action="edit.php<?php if(!empty($_GET['id'])){ echo "?id=".$_GET['id'];}?>"
		method="post">
		<div class="col-md-6">
			<div
				class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">Edit User</div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="prank_name">First Name</label> <input type="text"
							class="form-control" name="firstname"
							ng-model="user.firstname" required="required"
							placeholder="First Name" />
					</div>
					<div class="form-group">
						<label for="prank_name">Last Name</label> <input type="text"
							class="form-control" name="lastname"
							ng-model="user.lastname" required="required"
							placeholder="Last Name" />
					</div>
					<div class="form-group">
						<label for="description">Email</label>
						<input type="text" class="form-control" name="email" ng-model="user.email" placeholder="Email" />
					</div>
					<div class="form-group">
						<label for="operating_range">Username</label> <input
							type="text" class="form-control" name="username"
							ng-model="user.username" placeholder="Username" />
					</div>
					<div class="form-group">
						<label for="zipcode">Zipcode</label> <input type="number"
							class="form-control" name="zipcode" ng-model="user.zipcode"
							placeholder="Zipcode" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Update</button>
						<a class="btn btn-danger" href="index.php">Cancel</a>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>

<script type="text/javascript">
app.controller("userAddEditController", ['$scope', "$http" , function($scope, $http){

	$http.get('data.php?get=fullEditableUserData').
	then(function(response){
		$scope.user = response.data;
		$scope.user.zipcode = Number($scope.user.zipcode);
	});
		
}]);
</script>
