<?php



//To Handle Session Variables on This Page

session_start();



//Including Database Connection From db.php file to avoid rewriting in all files

require_once("../db.php");



//If user clicked register button

if(isset($_POST)) {



	//Escape Special Characters In String First

	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);

	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);

	$recidence = mysqli_real_escape_string($conn, $_POST['residence']);

	$occupation = mysqli_real_escape_string($conn, $_POST['occupation']);

	$member_number = mysqli_real_escape_string($conn, $_POST['client_number']);

	$added_by = mysqli_real_escape_string($conn, $_SESSION['id_admin']);





	//sql query to check if number already exists or not

	$sql = "SELECT member_number FROM users1 WHERE member_number='$member_number'";
	
	$result = $conn->query($sql);



	//if number not found then we can insert new data

	if($result->num_rows == 0) {



		//sql new registration insert query

		$sql = "INSERT INTO users1(first_name, last_name, residence, occupation, member_number, added_by) VALUES ('$firstname', '$lastname', '$recidence', '$occupation', '$member_number', '$added_by')";

		if($conn->query($sql)===TRUE) {

			// var_dump($sql);
			// die();

			//If data inserted successfully then Set some session variables for easy reference and redirect

			$_SESSION['registerCompleted'] = true;

			header("Location: users.php");

			exit();



		} else {

			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D

			// echo "Error " . $sql . "<br>" . $conn->error;
			$_SESSION['RegisterMemberError'] = true;

			header("Location: register-client.php");

			exit();

		}

	} else {

		//if number found in database then show username already exists error.

		$_SESSION['registerError'] = true;

		header("Location: register-client.php");

		exit();

	}



	//Close database connection. Not compulsory but good practice.

	$conn->close();



} else {

	//redirect them back to register page if they didn't click register button

	header("Location: register-client.php");

	exit();

}