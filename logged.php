<?php
session_start();

if(isset($_SESSION['logged_in_user'])){

	echo "logged in";
	echo "<a href='logout.php'> LoGout </a>";
}
else{
	echo "u r not logged in";
}

?>