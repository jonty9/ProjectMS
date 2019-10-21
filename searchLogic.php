<?php 
	require 'logged.php';
	require 'db.php';
?>
<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="searchLogic.php" method="GET"> 
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

		echo "<tr>"."<td>".$pname."</td>"."<td>".$team_name."</td>"."<td>".$teacher_name."</td>"."<td>".$total_mem."</td>"."<td>".$domain."</td>"."</tr>";
	}
 ?>