<?php 
	require_once '../../config/config.php';
	require_once $serverPath.'utils/dataLookUp.php';

	include_once $serverPath.'views/templates/head.php';
	$query="SELECT * FROM prank where id=".$_GET['id'].";";
	
?>

<div ng-controller="MyServicesController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h4 class="panel-title pull-left" style="padding-top: 7.5px;">Purchased Services</h4>
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
	                               	{field: 'prank_name', enableColumnMenu: false, name: "name"},
									{field: 'description', enableColumnMenu: false, name: 'Description'},
									{field: 'price', enableColumnMenu: false, name: 'price'},
									{field: 'username', enableColumnMenu: false, name: 'Pranker Name'},
									{field: 'date_requested', enableColumnMenu: false, name: 'Date Requested'},
									{field: 'comments', enableColumnMenu: false, name: 'comments'},
									{field: 'Write Review',  enableColumnMenu: false, enableFiltering: false, width: 110, cellTemplate: '<a class="btn btn-primary" role="button" ng-href= "../reviews/create.php?id={{row.entity.id}}">Write Review</a>'}
								  ];

	$scope.reloadGrid = function(){
		$http.get('data.php?get=myOrders').
			then(function(response){
				console.log(response);
				$scope.gridModel.data = response.data;
				
			});
	}
	
	$scope.reloadGrid();
	
}]);

</script>

