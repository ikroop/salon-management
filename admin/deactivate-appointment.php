<?php





session_start();



if(empty($_SESSION['id_admin'])) {

  header("Location: ../index.php");

  exit();

}



require_once("../db.php");



if(isset($_POST)) {

	

	$sql = "UPDATE appointments SET active='3' WHERE client='$_GET[id]' ";



	if($conn->query($sql) == TRUE) {

		header("Location: view_appointments.php");

		exit();

	} else {

		echo $conn->error;

	}

} else {

	header("Location: settings.php");

	exit();

}