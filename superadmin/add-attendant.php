<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$fullname = mysqli_real_escape_string($conn, $_POST['fname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	//sql query to check if username already exists or not
	$sql = "SELECT username FROM admin WHERE username='$username'";
	$result = $conn->query($sql);

	//if username not found then we can insert new data
	if($result->num_rows == 0) {

		//sql new registration insert query
		$sql = "INSERT INTO admin(fullname, username, password) VALUES ('$fullname', '$username', '$password')";

		if($conn->query($sql)===TRUE) {

			//If data inserted successfully then Set some session variables for easy reference and redirect
			$_SESSION['registerCompleted'] = true;
			header("Location: attendants.php");
			exit();

		} else {
			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		//if email found in database then show email already exists error.
		$_SESSION['registerError'] = true;
		header("Location: register-attendant.php");
		exit();
	}

	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to register page if they didn't click register button
	header("Location: register-attendant.php");
	exit();
}