<?php
	// mysqli_connect() function opens a new connection to the MySQL server. 
	include('db.php');
	session_start();// Starting Session 
	// Storing Session 
	$user_check = $_SESSION['login_user']; 
	// SQL Query To Fetch Complete Information Of User 

	$query = "SELECT * from users where Пользователь = '$user_check'";
	
	$ses_sql2 = mysqli_query($conn, $query);
	$row2 = mysqli_fetch_assoc($ses_sql2);
	$login_session = $row2['ФИО'];
	$login_id = $row2['id'];
 
?>