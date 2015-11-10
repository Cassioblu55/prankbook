<?php session_start();?>

<div ng-controller="MenuController">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">	
				<a class="navbar-brand" href="<?php echo $baseURL;?>">prankbook</a> 
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo $baseURL;?>views/services/">Get Prank</a></li>
					<li><a href="<?php echo $baseURL;?>views/pranks/edit.php">Give Prank</a></li>
				</ul>	
				<div class="collapse navbar-collapse navbar-right">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo $baseURL;?>views/login/" ng-hide="user">Login</a></li>
						<li><a href="<?php echo $baseURL;?>views/login/register.php" ng-hide="user">Create Account</a></li>
						<li class="dropdown"  ng-show="user">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{myProfile}} <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="<?php echo $baseURL;?>views/profile/">My Profile</a></li>
					        <li><a href="<?php echo $baseURL;?>views/Messages/index.php">My Messages</a></li>
							<li><a href="<?php echo $baseURL;?>views/services/purchased.php">My Services</a></li>
					        <li><a href="<?php echo $baseURL;?>views/pranks/index.php">My Pranks</a></li>
					        <li><a href="<?php echo $baseURL;?>views/reviews/index.php">My Reviews</a></li>
							<li><a href="<?php echo $baseURL;?>views/Admin/index.php">Adminstration</a></li>
					        <li role="separator" class="divider"></li>
					        <li><a href="<?php echo $baseURL;?>utils/logout.php">Sign out</a></li>
				          </ul>
				        </li>
			        </ul>
				</div>
			</div>	
		</div>
	</nav>
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
		$scope.myProfile = "Hi!";
	}
	
}]);

</script>
