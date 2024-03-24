<?php
	$con = mysqli_connect('localhost',"root","","myschool");
	session_start();
// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	if(isset($_POST["username"])&&isset($_POST["password"])){
		$user = $_POST["username"];
		$pass = $_POST["password"];
		$hash_pass = md5($pass);	
		$query = 'SELECT teacher_id,  level FROM `account` where username = "'.$user.'" ';
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) > 0) {


			$query1 = 'SELECT teacher_id as id,  level, password, username FROM `account` where username = "'.$user.'" and password = "'.$hash_pass.'"';
			$result1 = mysqli_query($con, $query1);

			if (mysqli_num_rows($result1) > 0) {
				
				$arr = array();
				while($row = mysqli_fetch_assoc($result1)) {
					$arr[] = $row;
					$_SESSION["id"] = $row['id'];
					$_SESSION["level"] = $row['level'];
					$_SESSION["password"] = $row['password'];
					$_SESSION["username"] = $row['username'];
				}
				echo json_encode($arr);
			} else {
				echo "Incorrect Password";
			}
		} else {
			echo "Username does not exist";
		}

		mysqli_close($con);	
	}

?>