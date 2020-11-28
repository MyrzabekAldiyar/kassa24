<?php
    include("db.php");
    include('session.php');
    $user_id = $login_id; 
    $error = '';
    
        $surname = htmlentities($_POST['surname']);
        $name = htmlentities($_POST['name']);
        $patronymic = htmlentities($_POST['patronymic']);
        $semeistvo = htmlentities($_POST['semeistvo']);
        $nomer = $_POST['nomer'];
		$additionalInfo = $_POST['additionalInfo'];
        $date = date("d/m/Y H:i:s");
        
        if($semeistvo != ''){
            $sql = "SELECT * from cards where Семейство = '$semeistvo' and Номер = '$nomer'";

            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            
            $count = mysqli_num_rows($result);
            
            if ($count > 0){
                $error = 2;
                header("location: adding.php?error=$error"); // Redirecting To Adding Page 
                exit();
            } else {
                $error = '';
            }
        }
        

		$sql2 = "INSERT INTO cards (user_id, Фамилия, Имя, Отчество, Семейство, Номер, ДополнительнаяИнформация, ДатаРегистрации)
		VALUES ('$user_id', '$surname', '$name', '$patronymic', '$semeistvo', '$nomer', '$additionalInfo', '$date')";
	
		if ($conn->query($sql2)) {
            $error = '';
		    header("location: adding.php?added=1");			 
		} else {
            // $error = 1;
            // header("location: adding.php?error=$error");	
            echo $conn->error;		 
            
		}
		$conn->close();
    
