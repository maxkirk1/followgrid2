<?php

	require("config.php");

	/*

	if(isset($_GET['php_grid']))
		$grid = $_GET['php_grid'];

	if(isset($_GET['php_users']))
		$users = $_GET['php_users'];

	if(isset($_GET['created_by']))
		$created_by = $_GET['created_by'];

	*/

	/*
	apc_store('grid', $grid);
	apc_store('users', $users);
	apc_store('time', $users);
	*/


	// Check if the username is already taken
	$query = " 
	    INSERT INTO grid (users, grid, createdby)
	    VALUES (:users, :grid, :createdby)
	"; 

	$query_params = array(
		':grid' => $_GET['grid'],
	    ':users' => $_GET['users'],
	    ':createdby' => $_GET['created_by']
	);

	try { 
	    $stmt = $db->prepare($query); 
	    $result = $stmt->execute($query_params); 
	} 
	catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 

	echo json_encode($result);

?>