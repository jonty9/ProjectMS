<?php 
	require 'logged.php';
	require 'db.php';

$pname = $_POST['project_name'];
$team_name = $_POST['team_name'];
$teacher_name = $_POST['teacher_name'];
$total_mem = $_POST['total_num'];
$domain = $_POST['domain'];


	$create_table =<<<_QUERY_
CREATE TABLE IF NOT EXISTS project (
          id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
          p_name VARCHAR(30) NOT NULL,
          team_name VARCHAR(30) NOT NULL,
          teacher_name VARCHAR(25) NOT NULL,
          total_mem INT(10) NOT NULL,
          domain VARCHAR(30) NOT NULL,
          file LONGBLOB);
_QUERY_;

$con->query($create_table);


$stmt = $con->prepare(
	"INSERT INTO project(p_name,team_name,teacher_name,total_mem,domain) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssis", $pname, $team_name, $teacher_name, $total_mem, $domain );
 
	if($stmt->execute()){
		$_SESSION['status'] = "Project Submitted Successfully!!";
	}else{
		$_SESSION['status'] = "Project Submission Failed";
	}

$stmt->close();
$con->close();
	header("Location: add.php");

 ?>