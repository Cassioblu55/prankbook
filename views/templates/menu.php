<?php 
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

// Example
if ( is_session_started() === FALSE ) session_start();
?>

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
					        <li role="separator" class="divider"></li>
					        <li><a href="<?php echo $baseURL;?>views/profile/edit.php">Edit Profile</a></li>
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
<div id="user" style="display: none"><?php if(!empty($_SESSION['user'])){echo json_encode($_SESSION['user']);}else{echo "{}";}?></div>
<script type="text/javascript">
var user = JSON.parse(document.getElementById("user").textContent);
app.controller("MenuController", ['$scope' , function($scope){
	if(user.username){
		$scope.user = user;
		$scope.myProfile = "Hello, "+$scope.user.username;
	}
	else{
		$scope.myProfile = "Hi!";
	}
	
}]);

</script>
