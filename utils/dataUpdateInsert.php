<?php
include_once $serverPath . 'utils/connection.php';

function update($table, $data) {
	$update = makeBaseUpdate($table, $data)." WHERE id=".$_GET['id'].";";
	runInsert($update);
}

function updateWithConstratints($table, $data, $constraints){
	$update = makeBaseUpdate($table, $data)." ";
	foreach ($constraints as $columnName => $value){
		$update .= "WHERE ".$columnName."='".$value."' AND ";
	}
	$update = substr($update, 0,strlen($update)-4).";";
	runInsert($update);
	
}

function makeBaseUpdate($table, $data){
	$update = "UPDATE " . $table." SET ";
	foreach ( $data as $columnName => $value ) {
		$update .= $columnName."='".$value."', ";
	}
	return substr($update, 0,strlen($update)-2);
}


function insert($table, $data) {
	$columns = " (";
	$values = " (";
	foreach ( $data as $columnName => $value ) {
		$columns .= $columnName . ", ";
		$values .= "'" . $value . "', ";
	}
	$columns = substr ( $columns, 0, strlen ( $columns ) - 2 ) . ")";
	$values = substr ( $values, 0, strlen ( $values ) - 2 ) . ")";
	
	$insert = "INSERT INTO " . $table . $columns . " VALUES " . $values . ";";
	runInsert ( $insert );
}

function runInsert($insert) {
	$db = connect ();
	try {
		$db->query ( $insert );
	} catch ( Execption $e ) {
		echo "Could not complete request: " . $insert;
		echo $e;
		$db->close ();
		die ( "Could not complete request: " . $insert );
	}
}

function deletFrom($table, $id){
	$insert = "DELETE FROM ".$table." WHERE id=".$id.";";
	runInsert($insert);
}


?>