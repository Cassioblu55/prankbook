<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	require_once $serverPath.'utils/dataUpdateInsert.php';
	$query="SELECT * FROM prank where id=".$_GET['id'].";";
	$prank=runQuery($query)[0];
	$table = "services";
	if(!empty($_POST) ){
		$purchasedata = [ 
			'cc_id' => $_POST['cc_id'],
			'prank_id' => $_GET ['id'],
			'date_requested' => $_POST['date_requested'],
			'price' => $_GET['price'],
			'comments' => $_POST['comments'],
			'user_id' => $_SESSION ['user'] ['id']
			];
		insert ( $table, $purchasedata );
		header ( "Location: ".$baseURL."views/services/purchased.php" );
		die ( "Redirecting to index.php" );
	}
	include_once $serverPath.'views/templates/head.php';
?>
<div ng-controller="MyServicesController">
	<div class="container-fluid">
		<form action="request.php<?php if(!empty($_GET['id'])){ echo "?id=".$_GET['id'];}?>" method="post">
			<div class="row">
				<div class="col-md-7">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h1 class="panel-title" align="center" style="padding-top: 7.5px;"><?php echo $prank['prank_name'];?></h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6"><h4>Description</h4></div>
							</div>
							<div class="row">
								<div class="col-md-6"><?php echo $prank['description'];?></div>
							</div>
							<div class="row">
								<div class="col-md-4"><h4>Price</h4></div>
							</div>
							<div class="row">
								<div class="col-md-4">{{price}}</div>
							</div>
							<div class="row">
								<div class="col-md-4"><h4>Operating Range</h4></div>
							</div>
							<div class="row">
								<div class="col-md-4"><?php echo $prank['operating_range'];?> miles</div>
							</div>
							<div class="row">
								<div class="col-md-4"><h4>Zipcode</h4></div>
							</div>
							<div class="row">
								<div class="col-md-4"><?php echo $prank['zipcode'];?></div>
							</div>
							<div class='row' ng-show="price != 'Free'">
								<div class="col-md-7 form-group">
								<h4>Credit Card</h4>
								<select class="form-control" ng-required="price != 'Free'" name="cc_id">
									<option selected="selected" value='-1'>None</option>
									<option ng-repeat='cc in ccs' value='{{cc.id}}'>{{cc.cc_last}}</option>
								</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-7">
									<div class="form-group">
									<h4>Date Requested</h4>
									<input type="date" class="form-control" placeholder="4/18/15" name="date_requested"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-7">
									<div class="form-group">
									<h4>Comments</h4>
									<input type="text" class="form-control" placeholder="Comments" name="comments"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div align="center">
									<button type="submit" class ="btn btn-primary">Purchase</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				</div>
<<<<<<< BEGIN MERGE CONFLICT: local copy shown first <<<<<<<<<<<<<<<
				<div class="col-md-4">
						<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
						<div style="overflow:hidden;height:500px;width:600px;"><div id="gmap_canvas" style="height:300px;width:400px"></div>
						<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
						<a class="google-map-code" href="http://premium-wordpress-themes.org" id="get-map-data"></a></div>
						<script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(41.69992260000001,-91.58869659999999),
						mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"),
						myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(41.69992260000001, -91.58869659999999)});infowindow = new google.maps.InfoWindow({content:"<b></b><br/><br/>52241 " });
						google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
						</script>
				</div>
			</div>
		</form>
======= COMMON ANCESTOR content follows ============================
				<div class="col-md-4">
						<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
						<div style="overflow:hidden;height:500px;width:600px;"><div id="gmap_canvas" style="height:300px;width:400px"></div>
						<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
						<a class="google-map-code" href="http://premium-wordpress-themes.org" id="get-map-data"></a></div>
						<script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(41.69992260000001,-91.58869659999999),
						mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"),
						myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(41.69992260000001, -91.58869659999999)});infowindow = new google.maps.InfoWindow({content:"<b></b><br/><br/>52241 " });
						google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
						</script>
				</div>
			</div>
		</form>
======= MERGED IN content follows ==================================
				
				<div class="col-md-3"> 
				<iframe frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"width="642" height="443" src="https://maps.google.com/maps?hl=en&q=<?php echo $prank['zipcode']; ?>&ie=UTF8&t=roadmap&z=12&iwloc=B&output=embed"><div></iframe>
		
			
						
				
>>>>>>> END MERGE CONFLICT >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h4 class="panel-title pull-left" style="padding-top: 7.5px;">Reviews Average {{average}}/5</h4>
						<button type="button" ng-click="show = !show" class="btn btn-primary pull-right">{{(!show) ? "Show" : "Hide"}}</button>
					</div>
					<div class="panel-body well" ng-show="show">
						
						<div ui-grid="gridModel_allReviews"  external-scopes="$scope"  ng-if="show" style="height: 300px;"></div>
						 
					</div>
					<div class="panel-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var price = '<?php echo $prank['price']?>';
app.controller("MyServicesController", ['$scope', "$http" , function($scope, $http){
	
	$scope.show = false;
	$scope.price = (price && parseInt(price) !=0) ? '$'+parseInt(price) : 'Free';
	
	$scope.gridModel_allReviews = {enableColumnResizing: true, showColumnFooter: true , enableSorting: false, rowHeight: 42};

	$scope.gridModel_allReviews.columnDefs = [
	                               	{field: 'username', enableColumnMenu: false, name: 'Name'},
									{field: 'rating', enableColumnMenu: false, name: 'Rating'},
									{field: 'comments', enableColumnMenu: false, name: 'comments'},
								  ];

		$http.get('reviewdata.php?reviewsByPrank=<?php echo $prank['id'];?>').
			then(function(response){
				$scope.gridModel_allReviews.data = response.data;
				var average = 0;
				for(var i=0; i<$scope.gridModel_allReviews.data.length; i++){
					average += parseInt($scope.gridModel_allReviews.data[i].rating);					
				}
				$scope.average = (average > 0) ? average/$scope.gridModel_allReviews.data.length : 0;
				
			});
	
		$http.get('<?php echo $baseURL?>views/cc/data.php?columns=lastFour').
		then(function(response){
			$scope.ccs = response.data;		
		});
	
}]);

</script>
