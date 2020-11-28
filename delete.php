<?php
    include("db.php");
    include('session.php');
    $user_id = $login_id; 
    $id = $_GET['id'];
        
        
        

		$sql2 = "delete from cards where id = '$id'";
	
		if ($conn->query($sql2)) {
            $error = '';
		    header("location: profile.php?deleted=1");			 
		} else {
            // $error = 1;
            // header("location: adding.php?error=$error");	
            echo $conn->error;		 
            
		}
		$conn->close();
    
