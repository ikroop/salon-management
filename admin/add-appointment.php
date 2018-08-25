<?php



//To Handle Session Variables on This Page

session_start();



//Including Database Connection From db.php file to avoid rewriting in all files

require_once("../db.php");



//If user clicked register button

if(isset($_POST)) {



	//Escape Special Characters In String First

	$client = mysqli_real_escape_string($conn, $_POST['client_number']);

    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);

    $appointment = mysqli_real_escape_string($conn, $_POST['appointment']);

	$attendant = mysqli_real_escape_string($conn, $_SESSION['id_admin']);





	//sql query to check if email already exists or not

	$sql = "SELECT member_number FROM users1 WHERE member_number='$client'";
	
	$result = $conn->query($sql);



	//if email not found then we can insert new data

	if($result->num_rows > 0) {



		//sql new registration insert query

		$sql = "INSERT INTO appointments(date_of_appointment, description, client, attendant) VALUES ('$appointment_date', '$appointment', '$client', '$attendant')";

		if($conn->query($sql)===TRUE) {

			// var_dump($sql);
			// die();

			//If data inserted successfully then Set some session variables for easy reference and redirect

			$_SESSION['registerCompleted'] = true;

			header("Location: appointments.php");

			exit();



		} else {

			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D

			// echo "Error " . $sql . "<br>" . $conn->error;
			$_SESSION['RegisterMemberError'] = true;

			header("Location: register-member.php");

			exit();

		}

	} else {

		//if email found in database then show email already exists error.

		$_SESSION['registerError'] = true;

		header("Location: register-farmer.php");

		exit();

	}



	//Close database connection. Not compulsory but good practice.

	$conn->close();



} else {

	//redirect them back to register page if they didn't click register button

	header("Location: register-farmer.php");

	exit();

}