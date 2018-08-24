<?php

session_start();

if(empty($_SESSION['id_super'])) {
	header("Location: index.php");
	exit();
}


require_once("../db.php");

if(isset($_GET)) {

	//Delete Clerk using id and redirect
	$sql = "DELETE FROM admin WHERE id_admin='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: attendants.php");
		exit();
	} else {
		echo "Error";
	}
}