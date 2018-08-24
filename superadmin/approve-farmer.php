<?php

session_start();

if(empty($_SESSION['id_super'])) {
	header("Location: index.php");
	exit();
}


require_once("../db.php");

if(isset($_GET)) {

	//Delete Company using id and redirect
	$sql = "UPDATE users1 SET active='1' WHERE id_member='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: users.php");
		exit();
	} else {
		echo "Error";
	}
}