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
 .btn{
	border : 1px solid transparent;
	padding : 10px 25px;
	color: #000;
	text-decoration: none;
	transition: 0.6s ease;
}
.btn:hover{
	background-color: #fff;
	color: #888;
}

 	</style>
 </head>
 <body>
 	<div style="float: right;">
 		 <?php echo "<h4 style='color: #fff'>Welcome! ".$_SESSION['logged_in_user']."</h4>" ?>
 		 <a href="add.php"><input type="button" value="HOME" class="btn"></a>
 	<a href="logout.php"><input type="button" name="logout" class = "btn" value="Logout"></a>
 </div>
 </body>
 </html>
