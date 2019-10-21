<?php 
	require 'logged.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="searchLogic.php" method="GET"> 
 		<input type="text" name="query" placeholder="Search by Project Name, Team Name, Teacher Name or Domain ">
 		<button type="submit">Submit!</button>
 	 </form>
 </body>
 </html>