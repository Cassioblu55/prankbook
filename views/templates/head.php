<!doctype html>
<html ng-app="app">
<head>
<!--this the header file and is pulling in all the jquery-->


	<script src="<?php echo $baseURL?>resources/jquery/dist/jquery.js"></script>
	<script src="<?php echo $baseURL?>resources/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo $baseURL?>resources/angular/angular.min.js"></script>
	<script src="<?php echo $baseURL?>resources/angular-ui-grid/ui-grid.min.js"></script>
	<script src="<?php echo $baseURL?>resources/utils.js"></script>
	
	<link rel="stylesheet"  href="<?php echo $baseURL?>resources/bootstrap/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseURL?>resources/angular-ui-grid/ui-grid.min.css" />
	<link rel="stylesheet" href="<?php echo $baseURL?>resources/layout.css"/>
	<link rel="shortcut icon" href="<?php echo $baseURL?>resources/favicon.ico" />
	
</head>
<script> var app = angular.module('app',['ui.grid']);</script>
<?php 
	include_once $serverPath.'views/templates/menu.php';
	//this is pulling in the menu bar file
	?>

