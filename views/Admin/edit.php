
<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireAdmin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	require_once $serverPath.'utils/dataUpdateInsert.php';
	
	if(!empty($_POST) ){
		$data = ["approval_status" => $_POST['approval_status'], "admin_id" => $_SESSION['user']['id']];
		$table = "prank";
		//Can use standard update here, will change status of id=$_GET['id'] to whatever is submited
		update($table, $data);
		header ( "Location: index.php" );
		die ( "Redirecting to index.php" );
	}
	else{
		$query="SELECT prank.*, users.username FROM prank INNER JOIN users ON prank.user_id = users.id WHERE prank.id=".$_GET['id'].";";
		$prank=runQuery($query)[0];		
	}
	
	include_once $serverPath.'views/templates/head.php';
?>

<div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h4 class="panel-title">Approve or Reject Prank</h4>
					</div>
					<div class="panel panel-body">
						<h4>Prank Name</h4>
						<?php echo $prank['prank_name'];?>
						<h4>Description</h4>
						<?php echo $prank['description'];?>
						<h4>Prankster</h4>
						<?php echo $prank['username'];?>
					</div>
					<div class="panel-footer">
						Do you approve or reject this prank?
						<div>
						<form class="form-inline" method="post" action="edit.php?id=<?php echo $_GET['id'];?>">
							<select class="form-control" name="approval_status">
								<option value="Approved">Approved</option>
								<option value="Rejected">Rejected</option>
							</select>
							<button type="submit" class="btn btn-primary">Submit</button>
							<a class="btn btn-danger" href="index.php">Cancel</a>
						</form>
					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once $serverPath.'views/templates/footer.php';?>

