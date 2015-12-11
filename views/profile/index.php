<?php
//Shows most important information for the user, this will act as there dashboard, managing reviews for there pranks and showing
//them unread messages as well as pranks that are being requested
require_once '../../config/config.php';
require_once $serverPath . 'utils/requireLogin.php';
include_once $serverPath . 'views/templates/head.php';
?>
<div ng-controller="TimelineController">
	<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title pull-left">My Timeline</h3>
				<a ng-href="edit.php" class="btn btn-primary btn-sm pull-right">Edit
					Profile</a>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading clearfix">
								<h3 class="panel-title pull-left">My Requests</h3>
							</div>
							<div class="panel-body">
								<div ui-grid="requestGrid" external-scopes="$scope" style="height: 300px;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- My messages -->
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading clearfix">
								<h3 class="panel-title pull-left">Unread Messages</h3>
							</div>
							<div class="panel-body">
								<div ui-grid="messagesGrid" external-scopes="$scope" style="height: 200px;"></div>
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
								<div ui-grid="reviewsGrid" external-scopes="$scope" style="height: 200px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
app.controller('TimelineController', ['$scope', "$http" , function($scope, $http){

	$scope.reviewsGrid = {enableFiltering: true, enableColumnResizing: true, showColumnFooter: true , enableSorting: false, showGridFooter: true, rowHeight: 42};
	$scope.messagesGrid = {enableFiltering: true, enableColumnResizing: true, showColumnFooter: true , enableSorting: false, showGridFooter: true, rowHeight: 42};
	$scope.requestGrid = {enableFiltering: true, enableColumnResizing: true, showColumnFooter: true , enableSorting: false, showGridFooter: true, rowHeight: 42};
	
	$scope.reviewsGrid.columnDefs = [
		                                    	{field: 'username', enableColumnMenu: false},
		                                       	{field: 'prank_name', enableColumnMenu: false},
		                                       	{field: 'rating', enableColumnMenu: false},
		                						{field: 'comments', enableColumnMenu: false}
		                					  ];

	$scope.requestGrid.columnDefs = [
                                    	{field: 'username', enableColumnMenu: false},
	             						{field: 'prank_name', enableColumnMenu: false},
                                    	{field: 'comments', enableColumnMenu: false}
             					  ];

	$scope.messagesGrid.columnDefs = [
	                                 	{field: 'Show', enableFiltering: false, name: '', enableColumnMenu: false, width: 70, cellTemplate: '<a class="btn btn-primary" role="button" href="<?php echo $baseURL?>views/Messages/thread.php?thread_id={{row.entity.thread_id}}">Reply</a>'},
		             						{field: 'username', enableColumnMenu: false},
	                                    	{field: 'message', enableColumnMenu: false},
	                                    	{field: 'time_sent', enableColumnMenu: false}
	             					  ];
	
		$http.get('data.php?get=myReviews').
			then(function(response){
				//console.log(response);
 				$scope.reviewsGrid.data = response.data;
				
			});

		$http.get('data.php?get=requestedPranks').
		then(function(response){
			//console.log(response);
				$scope.requestGrid.data = response.data;
			
		});

		$http.get('data.php?get=unreadMessages').
		then(function(response){
			console.log(response);
				$scope.messagesGrid.data = response.data;
			
		});

	
}]);

</script>

<?php include_once $serverPath.'views/templates/footer.php';?>
