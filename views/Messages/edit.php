<?php 
	require_once '../../config/config.php';
	include_once $serverPath.'utils/requireLogin.php';
	include_once $serverPath.'utils/dataLookUp.php';
	$id = $_SESSION['user']['id'];
	
	include_once $serverPath.'views/templates/head.php';
?>

<?php
$query ='select prank.prank_name, prank.user_id, services.prank_id, services.user_id from services inner join prank on services.prank_id=prank.id where services.user_id=' . $_SESSION['user']['id'] . ';';


$results=runQuery($query);

$table = "messages";
if (! empty ( $_POST )) {
	$data = [ 
			'title' => $_POST ['prank.prank_name'],
			'id2' => $_POST['services.user_id'],
			'id' => $_SESSION ['user'] ['id']
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

?>
<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title pull-left">My Messages</h3>
				</div>
				<div class="panel-body">
				<p>Here is where messages will go between <?php $query1='select prank.user_id, services.user_id from services inner join prank on services.prank_id=prank.id where services.user_id=' . $_SESSION['user']['id'] . ';';
						$results1=runQuery($query1); 
						echo(json_encode($results1));?></p>
				
				<div class="form-group">
						<label for="comments">Insert Message</label>
						<textarea class="form-control" name="comments"
							ng-model="reviews.comments" placeholder="Insert Message"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Send</button>
						<a class="btn btn-danger" href="index.php">Cancel</a>
					</div>
					</div>
			</div>
		</div>


<?php include_once $serverPath.'views/templates/footer.php';?>