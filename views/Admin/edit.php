
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
					<?php echo $prank['prank_name'];?>
					</div>
					<div>
					<?php echo $prank['description'];?>
					</div>
					<div class="panel-body">
						 <a href="edit.php" class ="btn btn-primary pull-right">Approve</a><a href="edit.php" class ="btn btn-primary pull-right">Reject</a>
					</div>
					<div class="panel-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once $serverPath.'views/templates/footer.php';?>

