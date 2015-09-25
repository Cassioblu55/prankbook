<?php
include_once '../utils/columnDefinitions.php';
include_once 'utils.php';
function validate() {
	$table = $_POST ['table'];
	if ($table == 'users') {
		return peopleValidate ();
	} elseif ($table == 'prank_request') {
		return pranksValidate ();
	} elseif ($table == 'services') {
		return servicesValidate ();
	} else {
		echo "Table not defined.";
		die ();
	}
}
function pranksValidate() {
	$errors = [ ];
	$requiredColumns = [ 
			'name',
			'date',
			'customer_id',
			'service_id' 
	];
	$errors = requiredColumns ( $errors, $requiredColumns );
	if (count ( $errors ) == 0) {
		$errors = inTable ( $errors, 'services', 'id', 'service_id' );
		$errors = inTable ( $errors, 'users', 'id', 'customer_id' );		
		if (count ( $errors ) == 0) {
			$nested_cannot_exist = [ 
					'id' => 'service_id',
					'prankster_id' => 'customer_id' 
			];
			$errors = inNested ( $errors, 'services', $nested_cannot_exist, false, "Customer and prankster cannot be the same." );
		}
	}
	return $errors;
}
function servicesValidate() {
	$errors = [ ];
	$requiredColumns = [ 
			'name',
			'prankster_id' 
	];
	$errors = requiredColumns ( $errors, $requiredColumns );
	if (count ( $errors ) == 0) {
		$errors = inTable ( $errors, 'people', 'id', 'prankster_id' );
	}
	
	return $errors;
}
function peopleValidate() {
	$errors = [ ];
	// check to see if all required columns are present
	$requiredColumns = [ 
			'firstname',
			'lastname',
			'email' 
	];
	$errors = requiredColumns ( $errors, $requiredColumns );
	// check if email is in database
	if (count ( $errors ) == 0) {
		$errors = unique ( $errors, 'email' );
	}
	return $errors;
}
?>