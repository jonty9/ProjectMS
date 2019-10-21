<?php
require 'db.php';

$create_table =<<<_QUERY_
CREATE TABLE IF NOT EXISTS users (
          user_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
          user_fname VARCHAR(25) NOT NULL,
          user_lname VARCHAR(25) NOT NULL,
          desig VARCHAR(25) NOT NULL CHECK (desig='faculty' or desig='student'),
          email VARCHAR(100) NOT NULL,
          password VARCHAR(40) NOT NULL,
          UNIQUE KEY email(email));
_QUERY_;

$con->query($create_table);

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$desig = $_POST['designation'];
$email = $_POST['email'];
$password = hash('md5',$_POST['password']);


$inser_user =<<<_INSERT_
INSERT INTO users(user_fname,user_lname,desig,email,password) VALUES ('$fname','$lname','$desig','$email','$password');
_INSERT_;
session_start();
if(!mysqli_query($con,$inser_user)){
	$_SESSION['failed'] = true;
}else {
	
	$_SESSION['registered'] = true; 
}

mysqli_close($con);
header("Location: web.php");

?>