<?php 
include_once $serverPath.'utils/connection.php';

//Will run query and return results as array
function runQuery($query){
	$db = connect();
	$statement=$db->prepare($query);
	$statement->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

?>