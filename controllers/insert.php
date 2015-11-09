<?php
include_once '../utils/connection.php';
include_once '../model/validate.php';
include_once '../utils/columnDefinitions.php';
$errors = validate ();
if (count ( $errors ) == 0) {
	$db = connect ();
	$columns = array_keys ( getColumns () );
	$insert = "INSERT INTO " . $_POST ['table'] . " " . appendColumns ( $columns ) . " VALUES " . appendValues ( $columns ) . ";";
	$db->query ( $insert );
} else {
	foreach ( $errors as $error ) {
		echo ($error . "</br>");
	}
}
?>