<?php 
	session_start();

	if(!isset($_SESSION['logged_in_user'])){
		$_SESSION['logged_out']  = true;
		header("Location: web.php");
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 
 	</style>
 </head>
 <body>
 	<div style="float: right;">
 	<a href="logout.php"><input type="button" name="logout" value="Logout"></a>
 </div>
 </body>
 </html>
