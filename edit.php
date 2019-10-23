<?php 
require 'logged.php';
require 'db.php';

if(isset($_SESSION['edited'])){
	$HTML =<<<_HTML_
<h4>Edited successfully</h4><br>
_HTML_;
echo $HTML;
$_SESSION['edited'] = false;
}
$user_id = $_SESSION['logged_in_user'];
$stmt=$con->prepare(
	"SELECT id,p_name,team_name,teacher_name,total_mem,domain from project where user_id=?");
$stmt->bind_param("s",$user_id);
$stmt->execute();
$stmt->bind_result($id,$p_name,$team_name,$teacher_name,$total_mem,$domain);
if(!empty($stmt->fetch)){
	echo "No entries";
}
else{
$table=<<<_HTML_
<TABLE BORDER='1' align = "center"><TH>Proj ID</TH><TH>Project Name</TH><TH>Team Name</TH><TH>Teacher Name</TH><TH>Total Members</TH><TH>Domain</TH>
_HTML_;
echo $table;
while ($stmt->fetch()) {
		echo "<tr>"."<td>".$id."</td>"."<td>".$p_name."</td>"."<td>".$team_name."</td>"."<td>".$teacher_name."</td>"."<td>".$total_mem."</td>"."<td>".$domain."</td>"."</tr>";
	}
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="assets/styles/style3.css"> 
 </head>
 <body>
 	<div id = "third">
	<form action="editProject.php" method="POST" align = "center" enctype="multipart/form-data">
		<h1> EDIT YOUR PROJECT </h1>
		<input type="number" name="project_id" placeholder="Project ID" required><br>
		<input type="text" name="p_name" placeholder="Project name"><br>
		<input type="text" name="team_name" placeholder="Team Name"><br>
		<input type="text" name="teacher_name" placeholder="Teacher name"><br>
		<input type="number" name="total_mem" placeholder="Total member"><br>
		<select name="domain">
			<option value="">Choose domain</option> 	
			<?php  
			$stmt=$con->prepare(
				"SELECT domains from domainlist");
			$stmt->execute();
			$stmt->bind_result($domain);
			while ($stmt->fetch()) {
				# code...
				$option=<<<_HTML_
				<option value='$domain'>$domain</option>
_HTML_;
				echo $option;
			}
			$stmt->close();
			$con->close();
			 ?>
			</select>
			<br>
			<button type="submit" class="mno">Click to edit</button><br>
			<button type="submit" value="delete" name="action">Delete</button>
			
	</form>
</div>
</body>
</html>
			
	