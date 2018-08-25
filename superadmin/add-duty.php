<?php



//To Handle Session Variables on This Page

session_start();



//Including Database Connection From db.php file to avoid rewriting in all files

require_once("../db.php");



//If user clicked register button

if(isset($_POST)) {



	//Escape Special Characters In String First

	$attendant_num = mysqli_real_escape_string($conn, $_POST['attendant_number']);

    $duty_dated = mysqli_real_escape_string($conn, $_POST['duty_date']);


	//sql query to check if email already exists or not

	$sql = "SELECT id_admin FROM admin WHERE id_admin='$attendant_num'";
	
	$result = $conn->query($sql);



	//if email not found then we can insert new data

	if($result->num_rows > 0) {



		//sql new registration insert query

		$sql = "INSERT INTO duties(date, attendant) VALUES ('$duty_dated', '$attendant_num')";

		if($conn->query($sql)===TRUE) {

			// var_dump($sql);
			// die();

			//If data inserted successfully then Set some session variables for easy reference and redirect

			$_SESSION['registerCompleted'] = true;

			header("Location: duty_roster.php");

			exit();



		} else {

			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D

			// echo "Error " . $sql . "<br>" . $conn->error;
			$_SESSION['RegisterMemberError'] = true;

			header("Location: duty_form.php");

			exit();

		}

	} else {

		//if email found in database then show email already exists error.

		$_SESSION['registerError'] = true;

		header("Location: duty_form.php");

		exit();

	}



	//Close database connection. Not compulsory but good practice.

	$conn->close();



} else {

	//redirect them back to register page if they didn't click register button

	header("Location: duty_form.php");

	exit();

}