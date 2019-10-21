<?php
require 'db.php';
ob_start();
session_start();

$email = $_POST['email'];
$password = hash('md5',$_POST['password']);

try {
	$stmt = $con->prepare(
		"SELECT user_id,email, password FROM users where email = ?"
	);
	$stmt->bind_param("s", $email);
	$stmt->execute();

	$stmt->bind_result($user_id_db, $user_email_db, $password_db);
	$valid_user = false;
	$error_msg ="";
	if(empty($stmt->fetch)){
			$error_msg = 'User Does not exist!';
	}
	while($stmt->fetch()){
		if($user_id_db){
			if($password_db == $password){
				$_SESSION['logged_in_user'] = $user_email_db;
				$continue_url = $_SESSION['continue_url'];

				while (ob_get_status()) {
					ob_end_clean();
				}

				if(isset($continue_url)) {
					header("Location: $continue_url");
				}else {
					header("Location: add.php");
				
			}
		}else {
				$error_msg = 'Wrong Username or password';
			
		}
	}

	}
	$stmt->close();
	$con->close();	
if($error_msg){
	echo  $error_msg;
	echo "<br>Go to <a href='web.html'> login page </a>";
}
}catch(Exception $e){
	$error_msg = "Some error occured, please check Credentials or try later";
}
?>