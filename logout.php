<?php
	session_start();
	session_unset();

	session_destroy();
	session_start();
	$_SESSION['logged_out'] = true;
	header("Location: web.php");
?>