<?php
require_once '../../config/config.php';
require_once $serverPath . 'utils/requireLogin.php';
require_once $serverPath . 'utils/dataUpdateInsert.php';

$table = "reviews";
if (! empty ( $_POST )) {
	$data = [ 
			'comments' => $_POST ['comments'],
			'rating' => $_POST ['rating'],
			'service_id' => 1,
			'user_id' => $_SESSION ['user'] ['id']
	];
	if (empty ( $_GET ['id'] )) {
		insert ( $table, $data );
		$added = true;
		header ( "Location: index.php" );
		die ( "Redirecting to index.php" );
	} 
	else {
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
		action="create.php<?php if(!empty($_GET['id'])){ echo "?id=".$_GET['id'];}?>"
		method="post">
		<div class="col-md-6">
			<div
				class="panel <?php if($added){echo "panel-success";} else{echo "panel-default";} ?>">
				<div class="panel-heading">
					<div class="panel-title">Write Review</div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="comments">Comments</label>
						<textarea class="form-control" name="comments"
							ng-model="reviews.comments" placeholder="Comments"></textarea>
					</div>
					<div class="form-group">
						<label for="rating">Rating</label> <input type="number"
							class="form-control" name="rating" ng-model="reviews.rating"
							placeholder="Rating(1-5)" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">{{saveOrUpdate}}</button>
						<a class="btn btn-danger" href="index.php">Cancel</a>
					</div>
					<div style='<?php if($added){echo "color:#5cb85c";}else{echo "display:none";}?>'>Added
						Review</div>
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