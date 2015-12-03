<?php 
	require_once '../../config/config.php';
	include_once $serverPath.'utils/requireLogin.php';
 
include_once $serverPath.'views/templates/head.php';
?>
<div ng-controller="MyMessagesController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h4 class="panel-title pull-left" style="padding-top: 7.5px;">My Reviews</h4>
					</div>
					<div class="panel-body">
						<div ui-grid="gridModel" external-scopes="$scope" style="height: 400px;"></div>
					</div>
					<div class="panel-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
app.controller("MyMessagesController", ['$scope', "$http" , function($scope, $http){

	$scope.gridModel = {enableFiltering: true, enableColumnResizing: true, showColumnFooter: true , enableSorting: false, showGridFooter: true, rowHeight: 42};

	$scope.gridModel.columnDefs = [
					{field: 'Show', name: '',  enableColumnMenu: false, enableFiltering: false, width: 75, cellTemplate: '<a class="btn btn-primary" role="button" ng-href="thread.php?thread_id={{row.entity.thread_id}}">Show {{row.entity.thread_id}}</a>'},
					{field: 'prank_name', enableColumnMenu: false, name: 'Prank Name'},
					{field: 'username', enableColumnMenu: false}

		                           	];

	$http.get('data.php?get=grid').
	then(function(response){
		console.log(response);
		$scope.gridModel.data = response.data;
		
	});
	
}]);

</script>





