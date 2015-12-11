<?php 
	require_once '../../config/config.php';
	include_once $serverPath.'utils/requireLogin.php';
	include_once $serverPath.'utils/dataUpdateInsert.php';
	
	if(empty($_GET['thread_id'])){
		header("Location: index.php");
		die("Redirecting to index");
		
	}
	
	include_once $serverPath.'views/templates/head.php';
	
?>

<div class="container-fluid" ng-controller="ThreadController">
	<div class="row col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{title}}</h3>
			</div>
			<div class="panel-body">
				<div ng-show="thread.length == 0">No messages so far. Write one!</div>
				<div class="row col-md-12" ng-repeat='message in thread'>
					<div ng-class="(user.id==message.is_from) ? 'pull-right' : 'pull-left'">
						<div ng-class="(user.id==message.is_from) ? 'from_me' : 'to_me'" class="row">{{message.message}}</div>
						<div ng-show="user.id == message.is_from">{{(message.is_read=='Yes') ? 'Seen at'+format(message.read_at) : 'Sent'}}</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body"> 
				<div class="form-group">
					<textarea type="text" class="form-control" ng-model='message' name='message' placeholder="Send new Message"></textarea>				
				</div>
				<div class="form-group text-center">
					<button type="button" ng-disabled="message==''" class="btn btn-primary pull-center" ng-click="sendMessage()">Send</button>
					<button type="button" class="btn btn-primary pull-center" ng-click ="loadThread()">Check Messages</button>
				</div>
			
			</div>
		</div>
		
	</div>
	

</div>

<script>
app.controller('ThreadController', ['$scope', "$http","$controller" , function($scope, $http, $controller){
	angular.extend(this, $controller('MenuController', {$scope: $scope}));
	
	var thread_id = getUrlParam('thread_id');
	//Will run when a message is sent posting the message content to the database without needed to reload the page
	$scope.sendMessage = function(){
		var data = {message : $scope.message};
		$http.post('addMessage.php?thread_id='+thread_id, data).then(function(response){
			//console.log(response);
			$scope.loadThread();
			$scope.message = "";
		});
		
	}

	$scope.loadThread = function(){
		$http.get('getThread.php?thread_id='+thread_id).
			then(function(response){
				if(response.data){
					//console.log(response.data);
					$scope.thread = response.data;
					//Will post to seen.php telling the database that the user read al unread messages
					$http.post('seen.php?thread_id='+thread_id, {}).
					then(function(response){
						
					});
					}
			});
	}

	//Will change the date in millis to a user friendly display the time for seen
	$scope.format = function(string){
		var d = new Date(string);
		var options = {
			    weekday: "long", year: "numeric", month: "short",
			    day: "numeric", hour: "2-digit", minute: "2-digit"
		};
		
		return d.toLocaleTimeString("en-US", options);
	}

	//Finds the username of the person they are sending the message to
	$http.get('getThread.php?thread_id='+thread_id+"&get=getMessageTo").
		then(function(response){
			var sendTo = response.data;
			$scope.title = "Send "+sendTo+" a message";
			
		});
	
	$scope.loadThread();
	
}]);


</script>