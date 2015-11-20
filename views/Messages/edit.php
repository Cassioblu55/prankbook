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
				</div>
			</div>
		</div>


<?php include_once $serverPath.'views/templates/footer.php';?>