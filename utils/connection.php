<?php
// will return a connection to the database using the values found in config.php
// requires config.php to be added
function connect() {
	global $dbHost;
	global $dbUser;
	global $dbPassword;
	global $dbName;
	global $db_options;
	
	return connectSpecific ( $dbHost, $dbUser, $dbPassword, $dbName, $db_options );
}
function connectSpecific($db_host, $db_user, $db_password, $db_name, $options) {
	try {
		$db = new PDO ( "mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_user, $db_password, $options );
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

function arrayToString($array){
	$string = '[';
	foreach ($array as $a){
		$string.=$a.',';
	}
	return substr ( $string, 0, strlen ( $string ) - 1 ) . "]";
}
?>