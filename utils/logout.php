<?php 
	include_once '../config/config.php';
    // First we execute our common code to connection to the database and start the session 
    require_once($serverPath."utils/common.php"); 
     
    // We remove the user's data from the session 
    unset($_SESSION['user']); 
     
    // We redirect them to the login page 
    header("Location: ".$baseURL."views/login/");
    die("Redirecting to: login");   
?>

