<?php 
	require 'logged.php';
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
				<option value="" selected="selected" id = "selected" hidden>Domain</option>
				<option value="ML">ML</option>
				<option value="AI">AI</option>
				<option value="Cyber-Security">Cyber-Security</option>
				<option value="Cloud Computing">Cloud-Computing</option>
				<option value="Robotics">Robotics</option>
			</select>
			<!-- <input type="file" name="fileToUpload" id="fileToUpload">  -->
			<button type="submit" class="mno">Click to add</button>
		</div>
		</form>
		<div class="right-side">
		<span class="xyz"> SEARCH FOR PROJECTS</span>
		<a href="search.php"><button class="mno"> Search </button></a>
	</div>
	<div class="or">OR</div></div>
</body>
</html>
			