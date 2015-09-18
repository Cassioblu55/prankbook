<?php
// connects to database
function connect() {
	include '../config/config.php';
	return connectSpecific ( $dbHost, $dbUser, $dbPassword, $dbName );
}
function connectSpecific($dbHost, $dbUser, $dbPassword, $dbName) {
	// @ suppress errors
	@ $db = new mysqli ( $dbHost, $dbUser, $dbPassword, $dbName );
	// check for errors conneting to database
	if ($db->connect_errno) {
		echo ("Cannot conect to database.<br/>");
		echo ($db->connect_error . "<br/>");
		die ();
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