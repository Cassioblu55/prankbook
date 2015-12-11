<?php
require_once '../../config/config.php';
require_once $serverPath.'utils/dataLookUp.php';
require_once $serverPath . 'utils/requireLogin.php';
require_once $serverPath . 'utils/dataUpdateInsert.php';

$table = "reviews";

//Sees if an exiting review
$query = "SELECT * FROM reviews WHERE prank_id=".$_GET['id']." AND user_id=".$_SESSION ['user'] ['id'].";";
$review=runQuery($query);

if($review){
	header ( "Location: ".$baseURL."views/reviews/index.php" );
	die ( "Redirecting to index.php" );
}

if (! empty ( $_POST )) {
	$data = [ 
			'comments' => $_POST ['comments'],
			'rating' => $_POST ['rating'],
			'prank_id' => $_GET['id'],
			'user_id' => $_SESSION ['user'] ['id'],
			'reviewed' => 0
	];
		insert ( $table, $data );
		header ( "Location: ".$baseURL."views/reviews/index.php" );
		die ( "Redirecting to index.php" );
}

include_once $serverPath . 'views/templates/head.php';
?>

<div ng-controller="reviewCreateController">
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
							ng-model="review.comments" required ="required" placeholder="Comments"></textarea>
					</div>
					<div class="form-group">
						<label for="rating">Rating</label> <input type="number"
							class="form-control" name="rating" ng-model="review.rating" required ="required" max="5" min="1"
							placeholder="Rating(1-5)" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Save</button>
						<a class="btn btn-danger" href="index.php">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
