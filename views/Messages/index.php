<?php 
	require_once '../../config/config.php';
	include_once $serverPath.'views/templates/head.php';
?>
<div>This will show a list of messages.</div>
<?php session_start();?>

<div class = "dropdown">
	<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">My services<span class = "caret"></span></button><ul class="dropdown-menu">
			<li>Prank 1</li>		
</div>
<div id="user" style="display: none"><?php echo json_encode($_SESSION['user'])?></div>
<script type="text/javascript">
var user = JSON.parse(document.getElementById("user").textContent);
app.controller("MenuController", ['$scope' , function($scope){
	$scope.user = user;
	if($scope.user && $scope.user.username){
		$scope.myProfile = "Hello, "+$scope.user.username;
	}
	else{
		$scope.myProfile = "Login";
	}
	
}]);

</script>



<?php include_once $serverPath.'views/templates/footer.php';?>