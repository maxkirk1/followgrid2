<?php

	require("config.php");


	// Check if the username is already taken
	$query = " 
	    SELECT * FROM grid WHERE id = :id
	"; 

	$query_params = array(
		':id' => $_GET['id'],
	);

	try { 
	    $stmt = $db->prepare($query); 
	    $result = $stmt->execute($query_params); 
	} 
	catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 

	echo json_encode($result);

?>