<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
		
	include_once $serverPath.'views/templates/head.php';
?>

<div ng-controller="MyServicesController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h4 class="panel-title pull-left" style="padding-top: 7.5px;">List of Pranks</h4>
						
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


<script>
app.controller("MyServicesController", ['$scope', "$http" , function($scope, $http){
	
	$scope.gridModel = {enableFiltering: true, enableColumnResizing: true, showColumnFooter: true , enableSorting: false, showGridFooter: true, rowHeight: 42};

	$scope.gridModel.columnDefs = [
									{field: 'View',  enableColumnMenu: false, enableFiltering: false, width: 150, cellTemplate: '<a class="btn btn-primary" role="button" ng-href="edit.php?id={{row.entity.id}}">More Information</a>'},
	                               	{field: 'prank_name', enableColumnMenu: false, name: 'Name'},
									{field: 'approval_status', enableColumnMenu: false, name: 'Approval Status'}
								  ];

	$scope.reloadGrid = function(){
		$http.get('data.php?get=myPranks').
			then(function(response){
				console.log(response);
				$scope.gridModel.data = response.data;
				
			});
	}
	
	$scope.reloadGrid();
	
}]);

</script>


<?php include_once $serverPath.'views/templates/footer.php';?>

