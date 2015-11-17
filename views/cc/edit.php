<?php
require_once '../../config/config.php';
require_once $serverPath . 'utils/requireLogin.php';
require_once $serverPath . 'utils/dataUpdateInsert.php';

$table = "prank";
if (! empty ( $_POST )) {
	$data = [ 
			'prank_name' => $_POST ['prank_name'],
			'description' => $_POST ['description'],
			'operating_range' => $_POST ['operating_range'],
			'zipcode' => $_POST ['zipcode'],
			'price' => $_POST ['price'],
			'user_id' => $_SESSION ['user'] ['id'] 
	];
	
	if (empty ( $_GET ['id'] )) {
		insert ( $table, $data );
		$added = true;
		header ( "Location: index.php" );
		die ( "Redirecting to index.php" );
	} else {
		//Normal update cannot be used here becuase it would allow anyone who is logged in to update anyone elses prank
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

<div ng-controller="prankAddEditController">
	<form
		action="edit.php<?php if(!empty($_GET['id'])){ echo "?id=".$_GET['id'];}?>"
		method="post">
		<div class="col-md-6">
			<div
				class="panel <?php if($added){echo "panel-success";} else{echo "panel-default";} ?>">
				<div class="panel-heading">
					<div class="panel-title">{{addOrEdit}} prank</div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="prank_name">Prank Name</label> <input type="text"
							class="form-control" name="prank_name"
							ng-model="prank.prank_name" required="required"
							placeholder="Prank Name" />
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" name="description"
							ng-model="prank.description" placeholder="Description"></textarea>
					</div>
					<div class="form-group">
						<label for="operating_range">Operating Range</label> <input
							type="text" class="form-control" name="operating_range"
							ng-model="prank.operating_range" placeholder="Operating Range" />
					</div>
					<div class="form-group">
						<label for="zipcode">Zipcode</label> <input type="number"
							class="form-control" name="zipcode" ng-model="prank.zipcode"
							placeholder="Zipcode" />
					</div>
					<div class="form-group">
						<label for="price">Price</label> <input type="number"
							class="form-control" name="price" ng-model="prank.price"
							placeholder="Price (dollars)" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">{{saveOrUpdate}}</button>
						<a class="btn btn-danger" href="index.php">Cancel</a>
					</div>
					<div style='<?php if($added){echo "color:#5cb85c";}else{echo "display:none";}?>'>Added
						Prank</div>
				</div>
			</div>
		</div>

	</form>
	<div id="prank" style="display: none"><?php if(!empty($_GET['id'])){echo $_GET['id'];}?></div>

</div>

<script type="text/javascript">
var prank = document.getElementById("prank").textContent
app.controller("prankAddEditController", ['$scope', "$http" , function($scope, $http){
	console.log(prank);
	if(prank){
		$http.get('data.php?id='+prank).
		then(function(response){
			console.log(response);
			$scope.prank = response.data[0];
			$scope.prank.zipcode = Number($scope.prank.zipcode);
			
		});
	}
		$scope.addOrEdit = (!prank) ? "Add" : "Edit";
		$scope.saveOrUpdate = (!prank) ? "Save" : "Update"

			
}]);
</script>
<?php 
	include_once '../../config/config.php';
	require_once $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataUpdateInsert.php';
	
	if(!empty($_POST)){
		$table = "cc_info";
		$lastFour =intval(substr(strval($_POST['cc_number']), 12, 16));
		$data = [
				"cc_number" => $_POST['cc_number'],
				"cc_last" => $lastFour,
				"security" => $_POST['security'],
				"billing_address " => $_POST['billing_address'],
				"expiration_date" => $_POST['expiration_date'],
				"user_id" => $_SESSION['user']['id']
		];
		
		if(empty($_GET['id'])){
			insert ( $table, $data );
		}else{
			$constraints = ['id' => $_SESSION['user']['id']];
			updateWithConstratints($table, $data, $constraints);
		}
		header ( "Location: index.php" );
		die ( "Redirecting to index.php" );
	}
	
include_once $serverPath .'views/templates/head.php';
?>
<div ng-controller="CreditCardAddEditController">
	<form action="edit.php<?php if(!empty($_GET['id'])){ echo "?id=".$_GET['id'];}?>" method="post">
		<div class="col-md-6">
			<div
				class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">{{addEdit}} Credit Card</div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="cc_number">Credit Card Number</label> 
						<input id="cc_number" type="text" pattern="[0-9]{16,16}" required title="Must be Vaild Credit card" class="form-control" name="cc_number" ng-model="card.cc_number" placeholder="Card Number" />
					</div>
					<div class="form-group">
						<label for="security">CVC Code</label> 
						<input type="text"  class="form-control" pattern="[0-9]{3,3}" title="Must be Vaild CVC Code" required name="security" ng-model="card.security" placeholder="CVC Code" />
					</div>
					<div class="form-group">
						<label for="billing_address">Billing Address</label>
						<input id="billing_address" type="text" class="form-control" name="billing_address" ng-model="card.billing_address" placeholder="Billing Address" required="required"/>
					</div>
					<div class="form-group">
						<label for="expiration_date">Expiration Date</label> 
						<input type="text" class="form-control" name="expiration_date" required pattern="[0-9]{4,4}" title="Must be vaild Expiration Date" maxlength="4" ng-model="card.expiration_date" placeholder="Expiration Date"/>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">{{saveUpdate}}</button>
						<a class="btn btn-danger" href="index.php">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
app.controller("CreditCardAddEditController", ['$scope', "$http" , function($scope, $http){

	$http.get('data.php<?php if(!empty($_GET['id'])){echo '?id='.$_GET['id'];}?>').
	then(function(response){
		if(response.data){
			$scope.card = response.data;
			$scope.card.expiration_date = Number($scope.card.expiration_date);
			$scope.card.security = Number($scope.card.security);
			$scope.card.cc_number = Number($scope.card.cc_number);
			$scope.addEdit = "Edit";
			$scope.saveUpdate = "Update";
		}
	});

	$scope.addEdit = "Add";
	$scope.saveUpdate = "Save";
	
		
}]);
</script>
