<?php 
	require 'logged.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 body{
	margin: 0;
	padding: 0;
	background: #efefef;
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("https://backgroundcheckall.com/wp-content/uploads/2018/10/ms-computer-science-non-cs-background-3.jpg");
	height: 100vh;
	background-size: cover;
	background-position: center;
	font-size: 16px;
	color: #777;
	font-family: sans-seriff;
	font-weight: 300;
}

#second{
	position: relative;
	margin: 5% auto;
	height: 450px;
	width: 600px;
	background: #fff;
	box-shadow: 0 2px 4px rgba(0,0,0,0.6);
}

input[type="text"]{
	margin-top: 20%
}

#form{
	height: 450px;
	width: 600px;
	
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("http://www.myfreephotoshop.com/wp-content/uploads/2015/07/791.jpg");
	background-size: cover;
	background-position: center;

}
 	</style>
 </head>
 <body>
 	<div class = "add" id="second">
 	<form action="searchLogic.php" align = "center"  method="GET"> 
	<div id="form" >		
 		<input type="text" name="query" placeholder="Search by Project Name, Team Name, Teacher Name or Domain ">
 		<select name="sort">
 			<option value="id">Sort by?</option>
 			<option value="p_name">Project Name</option>
 			<option value="team_name">Team Name</option>
 			<option value="teacher_name">Teacher Name</option>
 			<option value="total_mem">Total Members</option>
 			<option value="Domain">Domain</option>
 		</select>
 		<button type="submit">Submit!</button>
 	 </form>
 	</div>
 	</div>
 </body>
 </html>