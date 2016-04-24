<div ng-controller="MenuController">
	<body style="background-color: ghostwhite;">
	<!--this changed the color of the background from white to ghostwhite-->
	</body>
	
	<nav class="navbar navbar-default">
		<!--this changed the color of the background on the menu bar from grey to honeydew-->
		<div class="container-fluid" style="background-color: honeydew;">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			<!--this links to the homepage-->
				<a class="navbar-brand" href="<?php echo $baseURL;?>">Prankbook</a> 
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				<!--this is the options on top of the page-->
					<li><a href="<?php echo $baseURL;?>views/services/">Get Prank</a></li>
					<li><a href="<?php echo $baseURL;?>views/pranks/edit.php">Give Prank</a></li>
				</ul>	
				<div class="collapse navbar-collapse navbar-right">
				<!--this is all the options in the dropdown menu-->
					<ul class="nav navbar-nav">
						<li><a href="<?php echo $baseURL;?>views/login/" ng-hide="user">Login</a></li>
						<li><a href="<?php echo $baseURL;?>views/login/register.php" ng-hide="user">Create Account</a></li>
						<li class="dropdown"  ng-show="user">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{myProfile}} <span class="caret"></span></a>
				          <ul class="dropdown-menu" style="background-color:foralwhite;">
				            <li><a href="<?php echo $baseURL;?>views/profile/">My Profile</a></li>
					        <li><a href="<?php echo $baseURL;?>views/Messages/index.php">My Messages</a></li>
							<li><a href="<?php echo $baseURL;?>views/services/purchased.php">My Orders</a></li>
					        <li><a href="<?php echo $baseURL;?>views/pranks/index.php">My Pranks</a></li>
					        <li><a href="<?php echo $baseURL;?>views/reviews/index.php">My Reviews</a></li>
					        <li><a href="<?php echo $baseURL;?>views/cc/index.php">My Cards</a></li>
					        <li role="separator" class="divider"></li>
					        <li><a href="<?php echo $baseURL;?>views/profile/edit.php">Edit Profile</a></li>
							<li><a ng-show="user.admin==1" href="<?php echo $baseURL;?>views/Admin/index.php">Adminstration</a></li>
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
<script type="text/javascript">
var loggedIn = <?php echo (!empty($_SESSION['user'])) ? "true" : "false";?>;
app.controller("MenuController", ['$scope' ,'$http' , function($scope, $http){
	if(loggedIn){
		$http.get('<?php echo $baseURL;?>views/profile/data.php?get=myData').
			then(function(response){
				$scope.user = response.data;
				$scope.myProfile = "Hello, ";
				if($scope.user.firstname && !$scope.user.lastname){
					$scope.myProfile += $scope.user.firstname;
				}
				else if(!$scope.user.firstname && $scope.user.lastname){
					$scope.myProfile += $scope.user.lastname;
				}
				else if($scope.user.firstname && $scope.user.lastname){
					$scope.myProfile += ($scope.user.firstname + " " + $scope.user.lastname);
				}
				else{
					$scope.myProfile += $scope.user.username;
				}
		});
	}
}]);

</script>
