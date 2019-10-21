<?php
require 'db.php';

$email = $_POST['email'];
$password = hash('md5',$_POST['password']);


$query=<<<_QUERY_
SELECT password from users where email='$email';
_QUERY_;

$result = mysqli_query($con, $query);
$pw = $result->
?>