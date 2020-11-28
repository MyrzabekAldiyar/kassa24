<?php
	$servername = "localhost";
	$username = "root";
	$password = "Q9xr4mas@_K@z@tk";
	$dbname = "my_skud";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	mysqli_query($conn, "SET CHARACTER SET 'utf8'");
?>