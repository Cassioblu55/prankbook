<?php 
	//list of column definitions for sql tables with display values
	$columns = [
				"people"=>['firstname'=>"First name",'lastname'=>"Last name",'email'=>"Email"],
				"prank_request"=>['name'=>"Prank name",'customer_id'=>"Customer",'date'=>"Date","service_id"=>"Prank"],
				"services"=>['name'=>'Service name', 'prankster_id'=>'Prankster']
				];
	
	$tables = ["people"=>"People","prank_request"=>"Prank request", "service"=>"Service"];
	
	function getOwnColumnsDisplay($column){
 		return $GLOBALS['columns'][$_POST['table']][$column];
	}
	
	function getColumns(){
		return $GLOBALS['columns'][$_POST['table']];
	}
	
	function getColumnDisplay($table, $column){
		return $GLOBALS['columns'][$table][$column];
	}
	
	function getTableDisaply($t){
		return $GLOBALS['tables'][$t];
	}
	
	function getOwnTableDisplay(){
		return $GLOBALS['tables'][$_POST['table']];
	}

	

?>