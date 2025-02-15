<?<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title> My WEBSITE </title>
	<link rel="stylesheet" type = "text/css" href = "assets/styles/style1.css">
	<script type="text/javascript" src="assets/scripts/home.js"></script>
</head>
<body>
		<header>
			<div class = "main">
				<div class = "logo">
					<img src = "https://s3-ap-southeast-2.amazonaws.com/assets-pickmyproject-vic-gov-au/production/2018/08/13/09/21/05/64d6deb4-9ece-465d-ba75-1509706f66ce/PickMyProject-white@2x.png">
				</div>
				<ul>
					<li class= "active"><a href = "#" class="btn"> Home </a></li>
					<li><a href = "#" class="btn"> About Us </a></li>
					<li><a href = "#" class="btn"> Contact </a></li>
					<li><a href = "#" class="btn"> Profile </a></li>
				</ul>
			</div>
			<div class= "title">
				<h2> LOOKING FOR PROJECTS ? </h2>
				<?php 
					if(isset($_SESSION['registered'])){
						echo "<h4 style='color:white'> Registered successfully! </h4><br>";
					}elseif(isset($_SESSION['failed'])){
						echo "<h4 style='color:white'> UserAccount already exists! </h4><br>";
					}elseif(isset($_SESSION['incorrect'])){
						echo "<h4 style='color:white'> Wrong Username or Password </h4><br>";
					}
					elseif (isset($_SESSION['logged_out'])) {
						echo "<h4 style='color:white'> You have been logged out </h4><br>";
					}
					session_unset();
					session_destroy();
				 ?>
			</div>
			<div class= "button">
				<a href= "#" class="btn" onclick="openForm(1)"> SIGN UP </a>
				<a href= "#" class="btn" onclick="openForm(2)"> SIGN IN </a>
			</div>
			<div id="formLogin">
				<form id="login" align="center" name="login" action="signin.php" method="POST" class="form_container">
					<label class="label_text">Email</label>
					<input type="email" name="email" placeholder="Email" class="input"><br>
					<label class="label_text">Password</label>
					<input type="password" name="password" placeholder="password" class="input"><br>
					<button type="submit" class="btn" >Login!</button>
					<input type="button" name="cancel" value="cancel"class="btn" onclick="closeForm()">
				</form>
			</div>
				<div id="formSignup">
				<form id="signup" align="center" name="signup" action="signup.php" method="POST" class="form_container" >
					<label class="label_text">First Name</label>
					<input type="text" name="fname" id = "fname" placeholder="First Name" class="input"><br>
					<span id="fnameerror" class="text-danger font-weight-bold"></span>
					<label class="label_text">Last Name</label>
					<input type="text" name="lname" id = "lname" placeholder="Last Name" class="input"><br>
					<span id="lnameerror" class="text-danger font-weight-bold"></span>
					<label class="label_text">Email</label>
					<input type="email" name="email" id = "email" placeholder="Email" class="input"><br>
					<span id="emailerror" class="text-danger font-weight-bold"></span>
					<label class="label_text">Password</label>
					<input type="password" name="password" id = "password" placeholder="password" class="input"><br>
					<span id="passwordeerror" class="text-danger font-weight-bold"></span>
					<select name="designation">
						<option value="" selected="selected" id = "selected" hidden>Designation</option>
						<option value="faculty">Faculty</option>
						<option value="student">Student</option>
					</select><br><br>
					<button type="submit" class="btn" onclick="validation()">SIGN UP!</button>
					<input type="button" name="cancel" value="Cancel" class="btn" onclick="closeForm()">
				</form>
			</div>
		</header>
</body>
</html>