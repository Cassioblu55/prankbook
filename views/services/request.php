<?php 
	require_once '../../config/config.php';
	require_once  $serverPath.'utils/requireLogin.php';
	require_once $serverPath.'utils/dataLookUp.php';
	require_once $serverPath.'utils/dataUpdateInsert.php';
	$query="SELECT * FROM prank where id=".$_GET['id'].";";
	$prank=runQuery($query)[0];
	
	include_once $serverPath.'views/templates/head.php';
	
	$table = "services";
	if(!empty($_POST) ){
		$purchasedata = [ 
			'cc_id' => 1,
			'prank_id' => $_GET ['id'],
			'user_id' => $_SESSION ['user'] ['id']
			];
		insert ( $table, $purchasedata );
	}
	else{
		$query="SELECT * FROM services;";
		$purchasedata=runQuery($query);		
		}
?>


<html>
<body>
<div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h1 class="panel-title" align="center" style="padding-top: 7.5px;"><?php echo $prank['prank_name'];?></h4>
					</div>
					<div class="row">
						<div class="col-md-6"><h4>Description<h4></div>
					</div>
					<div class="row">
						<div class="col-md-6"><?php echo $prank['description'];?></div>
					</div>
					<div class="row">
						<div class="col-md-4"><h4>Price<h4></div>
					</div>
					<div class="row">
						<div class="col-md-4">$<?php echo $prank['price'];?></div>
					</div>
					<div class="row">
						<div class="col-md-4"><h4>Operating Range<h4></div>
					</div>
					<div class="row">
						<div class="col-md-4"><?php echo $prank['operating_range'];?> miles</div>
					</div>
					<div class="row">
						<div class="col-md-4"><h4>Zipcode<h4></div>
					</div>
					<div class="row">
						<div class="col-md-4"><?php echo $prank['zipcode'];?></div>
					</div>
					<div class="form-group">
							<form action="" method="post">
							<h4>Date Requested<h4>
							<input type="text" class="form-control" name="date_requested"/>
							</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
							<h4>Comments<h4>
							<input type="text" class="form-control" name="comments"/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4" align="right">
					<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
					<div style="overflow:hidden;height:500px;width:600px;"><div id="gmap_canvas" style="height:300px;width:400px;"></div>
					<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
					<a class="google-map-code" href="http://premium-wordpress-themes.org" id="get-map-data"></a></div>
					<script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(41.69992260000001,-91.58869659999999),
					mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"),
					myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(41.69992260000001, -91.58869659999999)});infowindow = new google.maps.InfoWindow({content:"<b></b><br/><br/>52241 " });
					google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
					</script>
			</div>
			<div class="row">
				<div class="col-md-7" align="center">
					<button type="submit" class ="btn btn-primary">Purchase</button>
							</form>
				</div>
			</div>
		</div>
	</div>
					
</body>
					
</html>