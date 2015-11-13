
<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	$query="SELECT * FROM prank where id=".$_GET['id'].";";
	$prank=runQuery($query)[0];
	
	include_once $serverPath.'views/templates/head.php';
?>

<div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h4 class="panel-title pull-left" style="padding-top: 7.5px;">Approve or Reject Prank</h4>
					</div>
					<div>
					<h4>Prank Name<h4>
					</div>
					<div>
					<?php echo $prank['prank_name'];?>
					</div>
					<div>
					<h4>Description<h4>
					</div>
					<div>
					<?php echo $prank['description'];?>
					</div>
</body>
</html>
					</div>
					<div class="panel-footer">
										
					<?php
						if(isset($_POST['submit']))
						{$approval_status=$_POST['approval_status'];
							if($approval_status!="Pending"){
								$query=("insert into prank values('$approval_status')");
									if($query){}
									else{}
									}
									else{}

									}
									else{
?>
						Do you approve or reject this prank?
						<br />
						<form method="post" action="index.php">

						<select name="approval_status">
						<option value="Approved">Approved</option>
						<option value="Rejected">Rejected</option>

						</select>

						<button type="submit" class="btn btn-default">Submit</button>
						</form>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once $serverPath.'views/templates/footer.php';?>

