<?php 
	require_once '../../config/config.php';
	include_once $serverPath.'utils/requireLogin.php';
	include_once $serverPath.'utils/dataLookUp.php';
	$id = $_SESSION['user']['id'];
 
$query='select prank.prank_name, services.service_id from services inner join prank on services.prank_id=prank.id where services.user_id=' . $_SESSION['user']['id'] . ';';

$results=runQuery($query);

include_once $serverPath.'views/templates/head.php';
?>
<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title pull-left">My Messages</h3>
				</div>
				<div class="panel-body">
					<p>Please select an order you would like to message about</p>
					<div class = "dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">My Orders<span class = "caret"></span></button><ul class="dropdown-menu">
							<?php 	foreach ($results as $result){echo "<li><a href=".$baseURL."views/Messages/edit.php?id='".$result->service_id ."'>".$result['prank_name'] ."</a></li>";}?>
					</div>

				</div>
			</div>
		</div>






