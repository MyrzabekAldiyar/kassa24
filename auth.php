<?php
	include("db.php");
	session_start();
	$error = '';
	$success = '';
// LOGIN
if(isset($_POST['login'])){
	// Define $username and $password 
	$username = $_POST['uname']; 
	$password = md5($_POST['pswd']);

	$q = "SELECT * from users where Пользователь = '$username'";
	$result = mysqli_query($conn, $q) or die("Error!");
	$count = mysqli_num_rows($result);
	if($count == 0){
		$error = 1;
		header("location: index.php?error=$error");
//          echo "Пользователь не найден в системе";
		exit();
	}

	  // SQL query to fetch information of registerd users and finds user match.
	$sql = "SELECT Пользователь, Пароль from users where Пользователь = '$username' AND Пароль = '$password'";


	$result = mysqli_query($conn, $sql) or die("Error!");
	$row = mysqli_fetch_assoc($result);

		$count = mysqli_num_rows($result);
		if ($count == 1){
			$_SESSION['login_user'] = $username; // Initializing Session
			header("location: profile.php"); // Redirecting To Profile Page
		}
		else {
			$error = 1;
			$sql = "SELECT * from users where Пользователь = '$username'";
			$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			$row = mysqli_fetch_assoc($result);
header("location: index.php?error=$error");
		}
	
		mysqli_close($conn); // Closing Connection 
  }



// SIGN UP
	if(isset($_POST['signup'])){
		$fio = htmlentities($_POST['fio']);
		$phone = htmlentities($_POST['phone']);
		$type = $_POST['type'];
		$dolzhnost = htmlentities($_POST['dolzh']);
		$strpodr = htmlentities($_POST['strpodr']);
		$specialnost = $_POST['specialnost'];
		$group = htmlentities($_POST['group']);
		$iinreg = htmlentities($_POST['iinreg']);
		$passwordreg = md5($_POST['passwordreg']);
		$date = date("d/m/Y H:i:s");

		$sql = "INSERT INTO users (ФИО, Телефон, ИИН, Пароль, ДатаРегистрации)
		VALUES ('$fio', '$phone', '$iinreg', '$passwordreg', '$date')";
	
		if ($conn->query($sql)) {
			$sql2 = "";
			if($type == "Сотрудник"){ 
				$q = "SELECT id from users where ИИН = '$iinreg'"; 
				$ses_sql = mysqli_query($conn, $q); 
				$myrow = mysqli_fetch_assoc($ses_sql); 
				$id = $myrow['id'];
				$table = 'employee';
				$sql2 = "INSERT INTO $table (user_id, Должность, СтруктурноеПодразделение)
						VALUES ('$id', '$dolzhnost', '$strpodr')";
			} else if($type == "Студент"){ 
				$q = "SELECT id from users where ИИН = '$iinreg'"; 
				$ses_sql = mysqli_query($conn, $q); 
				$myrow = mysqli_fetch_assoc($ses_sql); 
				$id = $myrow['id'];
				$table = 'students';
				$sql2 = "INSERT INTO $table (user_id, Специальность, Группа)
						VALUES ('$id', '$specialnost', '$group')";
			} 

			if ($conn->query($sql2)) {
				$success = 1;
				
				// Define $username and $password 
				$username = $iinreg; 
				$password = $_POST['passwordreg']; 
				header("location: index.php?success=$success&username=$username&password=$password");
		  
				mysqli_close($conn); // Closing Connection 
			}
			else {
				echo "Ошибка: " . $sql . "<br>" . $conn->error;			 
			}
		} else {
			echo "Ошибка: " . $sql . "<br>" . $conn->error;			 
		}
		$conn->close();
    }
	

	

	


			

		
	

	
?>