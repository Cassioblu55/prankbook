<?php
// Takes a list a errors and a list of required columns and will add an error message for each missing required element
function requiredColumns($errors, $required_columns) {
	foreach ( $required_columns as $column ) {
		if (! $_POST [$column]) {
			array_push ( $errors, getOwnColumnsDisplay ( $column ) . " cannot be blank" );
		}
	}
	return $errors;
}

// inNested will take a table name, a list of key value pairs with the key being the name of the query table column and
// the value being the name of the submited forms value, with a boolean present, and an optional error message
// it will create a query adding specififty per element in the table
// it will then add an error if row either exists if $present==false or if $present==true and row is not present
function inNested($errors, $query_table, $nested_required, $present, $message) {
	$db = connect ();
	$check = "SELECT * FROM " . $query_table . " WHERE ";
	foreach ( array_keys ( $nested_required ) as $key ) {
		$check .= $key . "=" . "'" . $_POST [$nested_required [$key]] . "' AND ";
	}
	if ($result = $db->query ( substr ( $check, 0, strlen ( $check ) - 5 ) . ";" )) {
		if (($result->rowCount() == 0) == $present) {
			if ($message) {
				array_push ( $errors, $message );
			} else {
				array_push ( $errors, "Value is " . (($present) ? "not" : "") . " present in " . $query_table );
			}
		}
	}
	return $errors;
}

// takes a list of errors and a column name, and will return a list of errors with any non-unique values
function unique($errors, $unique_column) {
	$db = connect ();
	$check = "SELECT * FROM " . $_POST ['table'] . " WHERE " . $unique_column . "='" . $_POST [$unique_column] . "';";
	if ($result = $db->query ( $check )) {
		if ($result->rowCount() > 0) {
			array_push ( $errors, getOwnColumnsDisplay ( $unique_column ) . " already present" );
		}
	}
	return $errors;
}

// takes in list of erros, name of the table to look into, the name of the column in querryied table, and the name of the column of the value
// and will look to see if value is in table, used to make sure values that require data in other tables to exits, exist
function inTable($errors, $query_table, $query_column_name, $value_column_name) {
	$db = connect ();
	$check = "SELECT * FROM " . $query_table . " WHERE " . $query_column_name . "='" . $_POST [$value_column_name] . "';";
	if ($result = $db->query ( $check )) {
		if ($result->rowCount() == 0) {
			array_push ( $errors, getOwnColumnsDisplay ( $value_column_name ) . " is not present in " . getTableDisplay ( $query_table ) );
		}
	}
	return $errors;
}

// will take a list of erros and two values, if the values are the same it will add an error
function cannotEqual($errors, $value1, $value2) {
	if ($_POST [$value1] == $_POST [$value2]) {
		array_push ( $errors, getOwnColumnsDisplay ( $value1 ) . " cannot be the same as " . strtolower ( getOwnColumnsDisplay ( $value2 ) ) );
	}
	return $errors;
}

?>