<?php
	include_once '../../config/config.php';
	require_once $serverPath . 'utils/requireLogin.php';
	
	include_once $serverPath.'views/templates/head.php';	
?>

<div ng-controller="CCIndexController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h4 class="panel-title pull-left" style="padding-top: 7.5px;">My Credit Cards</h4>
						<a href="edit.php" class="btn btn-primary pull-right">Add</a>
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
app.controller("CCIndexController", ['$scope', "$http" , function($scope, $http){

	$scope.gridModel = {enableFiltering: true, enableColumnResizing: true, showColumnFooter: true , enableSorting: false, showGridFooter: true, rowHeight: 42};;

	$scope.gridModel.columnDefs = [
		                 						{field: 'Edit',  enableColumnMenu: false, enableFiltering: false, width: 55, cellTemplate: '<a class="btn btn-primary" role="button" ng-href="edit.php?id={{row.entity.id}}">Edit</a>'},
		                                       	{field: 'cc_last', enableColumnMenu: false, name: 'Card Number'},
		                                       	{field: 'billing_address', enableColumnMenu: false},
		                						{field: 'Delete', enableColumnMenu: false,width: 70, cellTemplate: '<button class="btn btn-danger" ng-click="grid.appScope.delete(row.entity.id,row.entity.cc_last);">Delete</button>'}
		                					  ];

	$scope.reloadGrid = function(){
		$http.get('data.php?columns=grid').
			then(function(response){
//				console.log(response);
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
