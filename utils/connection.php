<?php
// connects to database
function connect() {
	$dbUser = "cbhudson";
	$dbPassword = "PcJL7JDgMdiY";
	$dbName = "db_cbhudson";
	$options = array (
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
	);
	$dbHost = "dbdev.cs.uiowa.edu";
	$adminEmail = $adminEmail = "cassio-hudson@uiowa.edu";
	$baseURL = "http://webdev.cs.uiowa.edu/~cbhudson/informatics_project/";
	return connectSpecific ( $dbHost, $dbUser, $dbPassword, $dbName, $options );
}
function connectSpecific($dbHost, $dbUser, $dbPassword, $dbName, $options) {
	try {
		$db = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUser, $dbPassword, $options); 
	} catch ( PDOException $e ) {
		echo 'Connection failed: ' . $e->getMessage ();
		exit ();
	}
	return $db;
}
function appendColumns($list) {
	$s = "(";
	foreach ( $list as $row ) {
		$s .= $row . ",";
	}
	return substr ( $s, 0, strlen ( $s ) - 1 ) . ")";
}
function appendValues($list) {
	$s = "(";
	foreach ( $list as $row ) {
		$s .= "'" . $_POST [$row] . "',";
	}
	return substr ( $s, 0, strlen ( $s ) - 1 ) . ")";
}
?>