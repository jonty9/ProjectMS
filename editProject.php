<?php 
require 'logged.php';
require 'db.php';

$id = $_POST['project_id'];

if($_POST['action']=='delete'){

	$stmt=$con->prepare(
		"DELETE FROM project where id=$id");
	$stmt->bind_param();
	$stmt->execute();
	$stmt->close();
	$con->close();
}
else{
if(isset($_POST['p_name']) && $_POST['p_name']!=''){
	$pname = $_POST['p_name'];
$stmt=$con->prepare(
"UPDATE project SET p_name= ? WHERE ID = $id ");
$stmt->bind_param('s',$pname);
$stmt->execute();
}
if(isset($_POST['team_name'])&& $_POST['team_name']!=''){
	$team_name = $_POST['team_name'];
	$stmt=$con->prepare(
"UPDATE project SET team_name= ? WHERE ID = $id ");
$stmt->bind_param('s',$team_name);
$stmt->execute();
}
if(isset($_POST['teacher_name'])&& $_POST['teacher_name']!=''){
	$teacher_name = $_POST['teacher_name'];
	$stmt=$con->prepare(
"UPDATE project SET teacher_name= ? WHERE ID = $id ");
$stmt->bind_param('s',$teacher_name);
$stmt->execute();
}
if(isset($_POST['total_mem'])&& $_POST['total_mem']!=''){
	$total_mem = $_POST['total_mem'];
	$stmt=$con->prepare(
"UPDATE project SET total_mem=$total_mem WHERE ID = $id ");
$stmt->bind_param();
$stmt->execute();
}
if(isset($_POST['domain'])&& $_POST['domain']!=''){
	$domain = $_POST['domain'];
	$stmt=$con->prepare(
"UPDATE project SET domain= ? WHERE ID = $id ");
$stmt->bind_param('s',$domain);
$stmt->execute();
$stmt->close();
$con->close();
}
}
$_SESSION['edited'] = true;
header("Location: edit.php");
 ?>
