<?php
require_once '../../config/config.php';
require_once $serverPath . 'utils/requireLogin.php';
include_once $serverPath . 'views/templates/head.php';
?>
<div>
	<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title pull-left">My Timeline</h3>
				<a ng-href="edit.php" class="btn btn-primary btn-sm pull-right">Edit
					Profile</a>
			</div>
			<div class="panel-body">
				<div class="row">
					<!-- My messages -->
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading clearfix">
								<h3 class="panel-title pull-left">My Messages</h3>
							</div>
							<div class="panel-body">
								<p>Here is where messages will go</p>
							</div>
						</div>
					</div>
					<!-- My reviews -->
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading clearfix">
								<h3 class="panel-title pull-left">My Reviews</h3>
							</div>
							<div class="panel-body">
								<p>Here is where reviews will go</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading clearfix">
								<h3 class="panel-title pull-left">My Requests</h3>
							</div>
							<div class="panel-body">
								<p>Here is where requests will go</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include_once $serverPath.'views/templates/footer.php';?>
