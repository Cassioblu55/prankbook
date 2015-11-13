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
						<h4 class="panel-title pull-left" style="padding-top: 7.5px;">Pranks</h4>
						<a href="<?php echo $baseURL;?>views/pranks/edit.php" class ="btn btn-primary pull-right">Add</a>
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
									{field: 'View',  enableColumnMenu: false, enableFiltering: false, width: 53, cellTemplate: '<a class="btn btn-primary" role="button" ng-href="request.php?id={{row.entity.id}}">View</a>'},
	                               	{field: 'prank_name', enableColumnMenu: false, name: 'Name'},
									{field: 'description', enableColumnMenu: false, name: 'Description'},
									{field: 'username', enableColumnMenu: false, name: 'Pranker Username'},
									{field: 'operating_range', enableColumnMenu: false, name: 'Range(Miles)'},
									{field: 'zipcode', enableColumnMenu: false, name: 'Zipcode'},
									{field: 'price', enableColumnMenu: false, name: 'Price ($)'}
								  ];

	$scope.reloadGrid = function(){
		$http.get('data.php?get=Pranks').
			then(function(response){
				console.log(response);
				$scope.gridModel.data = response.data;
				
			});
	}
	
	$scope.reloadGrid();
	
}]);

</script>
