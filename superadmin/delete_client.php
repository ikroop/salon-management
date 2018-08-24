<?php

session_start();

if(empty($_SESSION['id_super'])) {
	header("Location: index.php");
	exit();
}


require_once("../db.php");

if(isset($_GET)) {

	//Delete Company using id and redirect
	$sql = "DELETE FROM users1 WHERE id_member='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: users.php");
		exit();
	} else {
		echo "Error";
	}
}