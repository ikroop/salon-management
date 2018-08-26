<?php


session_start();

if(empty($_SESSION['id_super'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");

if(isset($_POST)) {
	
	$sql = "UPDATE users1 SET active='3' WHERE id_member='$_GET[id]'";

	if($conn->query($sql) == TRUE) {
		header("Location: users.php");
		exit();
	} else {
		echo $conn->error;
	}
} else {
	header("Location: users.php");
	exit();
}