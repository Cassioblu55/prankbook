<?php 
	require_once '../../config/config.php';
	require_once $serverPath.'utils/dataLookUp.php';

	include_once $serverPath.'views/templates/head.php';
?>

<div ng-controller="MyServicesController">
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

<?php include_once $serverPath.'views/templates/footer.php';?>

<script>
app.controller("MyServicesController", ['$scope', "$http" , function($scope, $http){
	$scope.gridModel = {enableFiltering: true, enableColumnResizing: true, showColumnFooter: true , enableSorting: false, showGridFooter: true, rowHeight: 42};

	$scope.gridModel.columnDefs = [
									{field: 'Edit',  enableColumnMenu: false, enableFiltering: false, width: 53, cellTemplate: '<a class="btn btn-primary" role="button" ng-href="edit.php?id={{row.entity.id}}">Edit</a>'},
	                               	{field: 'prank_name', enableColumnMenu: false, name: 'Prank Name'},
									{field: 'comments', enableColumnMenu: false, name: 'Comments'},
									{field: 'rating', enableColumnMenu: false, name: 'Rating'},
									{field: 'delete',  enableColumnMenu: false, enableFiltering: false, width: 67, cellTemplate: '<button class="btn btn-danger" ng-click="grid.appScope.delete(row.entity.id,row.entity.prank_name);">Delete</button>'}
									
								  ];

	$scope.reloadGrid = function(){
		$http.get('data.php?get=reviews').
			then(function(response){
				console.log(response);
				$scope.gridModel.data = response.data;
				
			});
	}
	$scope.delete =function(id,name){
		if(window.confirm("Are you sure you want to delete "+name+"?")){
			$http.post('delete.php?id='+id).
				then(function(response){
					$scope.reloadGrid();
					}).then(function(response){
						console.log(response);
					});
		}
	}
	
	$scope.reloadGrid();
	
}]);

</script>