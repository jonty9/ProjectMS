<?php 
	require 'logged.php';
	require 'db.php';

$pname = $_POST['project_name'];
$team_name = $_POST['team_name'];
$teacher_name = $_POST['teacher_name'];
$total_mem = $_POST['total_num'];
$domain = $_POST['domain'];
$user_id = $_SESSION['logged_in_user'];
$f_name = null;
if(isset($_FILES['fileToUpload'])){
$file_name = $_FILES['fileToUpload']['name'];
$f_name = hash('ripemd160',$file_name).$file_name;
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
move_uploaded_file($tmp_name, "D:/reports/".$f_name);
}

	$create_table =<<<_QUERY_
CREATE TABLE IF NOT EXISTS project (
          id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
          p_name VARCHAR(30) NOT NULL,
          team_name VARCHAR(30) NOT NULL,
          teacher_name VARCHAR(25) NOT NULL,
          total_mem INT(10) NOT NULL,
          domain VARCHAR(30) NOT NULL,
          fileadd VARCHAR(100),
          user_id VARCHAR(40) NOT NULL,
          FOREIGN KEY (user_id) REFERENCES users(email));
_QUERY_;

$con->query($create_table);

echo $user_id;
$stmt = $con->prepare(
	"INSERT INTO project(p_name,team_name,teacher_name,total_mem,domain,fileadd,user_id) VALUES(?,?,?,?,?,?,?)");
$stmt->bind_param("sssisss", $pname, $team_name, $teacher_name, $total_mem, $domain,$f_name, $user_id );
 
	if($stmt->execute()){
		$_SESSION['status'] = "Project Submitted Successfully!!";
	}else{
		$_SESSION['status'] = "Project Submission Failed";
	}

$stmt->close();
$con->close();
	header("Location: add.php");

 ?>