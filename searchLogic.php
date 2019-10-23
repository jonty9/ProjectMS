<?php 
	require 'logged.php';
	require 'db.php';
?>
<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 		#form{
	height: 100%;
	width: 100%;
	
	
}
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

table {
	color: #fff;
}

 	</style>>
 </head>
 <body>
 	<div id ="second">
 	<form action="searchLogic.php" method="GET"> 
 		<div class = "form">
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
 	</div>
 	 </form>
 	</div>
 </body>
 </html>
<?php
	$query = '%'.$_GET['query'].'%';
	$sort = $_GET['sort'];
	$stmt = $con->prepare(
	"SELECT p_name,team_name,teacher_name,total_mem,domain from project where p_name like ? or team_name like ? or teacher_name like ? or domain like ? ORDER BY $sort ASC");
	$stmt->bind_param("ssss", $query, $query, $query, $query);
	$stmt->execute();
	$stmt->bind_result($pname,$team_name,$teacher_name,$total_mem,$domain);
	$table=<<<_HTML_
<TABLE BORDER='1'><TH>Project Name</TH><TH>Team Name</TH><TH>Teacher Name</TH><TH>Total Members</TH><TH>Domain</TH>
_HTML_;
		
		echo $table;
	while($stmt->fetch()){

	// $userHtml= "";
	// 	if($_SESSION['logged_in_user']== $user_id){
	// 		$userHtml= "<tr>"."<bu
	// 	}
		echo "<tr>"."<td>".$pname."</td>"."<td>".$team_name."</td>"."<td>".$teacher_name."</td>"."<td>".$total_mem."</td>"."<td>".$domain."</td>"."</tr>";
	}
 ?>