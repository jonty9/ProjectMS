<?php 
	require 'logged.php';
	require 'db.php';
 ?>

<html>
<head>
<title> Main Page </title>
<link rel="stylesheet" type="text/css" href="assets/styles/style2.css">

</head>
<body>
	<div id="second">
		<form action="addProject.php" method="POST" enctype="multipart/form-data">
		<div class="add">
			<h1> ADD YOUR PROJECT </h1>
			<?php 
					if(isset($_SESSION['status'])){
						echo "<h4 style='color: green'>".$_SESSION['status'];
					}
	$_SESSION['status'] = false;
			 ?>
			<input type="text" name="project_name" placeholder="Project name">
			<input type="text" name="team_name" placeholder="Team name">
			<input type="text" name="teacher_name" placeholder="Teacher Name">
			<input type="text" name="total_num" placeholder="Total members">
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
			<!-- php 
				if ($_SESSION['logged_in_user']=='admin') {
					# code...
					$button=<<<_HTML_
<input type='text' name='newdomain' placeholder='Add Domain'>
<input 
				}
			 ?> -->
			<br>
			<input type="file" name="fileToUpload" id="fileToUpload"><br> 
			<button type="submit" class="mno">Click to add</button>
		</div>
		</form>
		<div class="right-side">
		<span class="xyz"> SEARCH FOR PROJECTS</span><
		<a href="search.php"><button class="mno"> Search </button></a>
		<a href="edit.php"><button class="mno"> Edit </button></a>
	</div>
	<div class="or">OR</div></div>
</body>
</html>
			