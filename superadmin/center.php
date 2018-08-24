<?php



// configuration

require("../config.php");



require_once("../db.php");

// require_once("../config.php");





$farmer_number = $_POST['farmer_number'];

$produce = $_POST['produce'];



// if form was submitted 

if($_SERVER["REQUEST_METHOD"] == "POST")

{

	 if(empty($_POST["farmer_number"]) || empty($_POST["produce"]))

	 {

	 	if(empty($_POST["farmer_number"]))

	 	{

	 		print("Nice work, hacker!");

	 		die();

	 	}

	 	if(empty($_POST["produce"]))

	 	{

			print('Please input farmers produce.');

			die();

	 	}

	 }else

		 	{

		 		//$center_name = $_POST['center_name'];



		 		//query("INSERT INTO portfolio (id, symbol, shares) VALUES($id, '', $)");

		 		//$center_name = $_POST['center_name']; 

		 		//query("UPDATE users SET center_name = '$center_name' WHERE username = '$username'");

		 		//sql query to check if email already exists or not

// 	$sql = "SELECT centername FROM centers WHERE centername='$centername'";

// 	$result = $conn->query($sql);



// 	//if email not found then we can insert new data

// 	if($result->num_rows == 0) {



// 		//sql new registration insert query

// 		$sql = "INSERT INTO centers(centername) VALUES ('$centername')";

				query("UPDATE users1 SET farmer_produce = farmer_produce + '$produce' WHERE farmer_number='$farmer_number'");

				

				query("INSERT INTO history (farmer_number, given_produce) VALUES($farmer_number, $produce)");

				$_SESSION['successfulupdate'] = true;





				// extract the farmer produce

				//$produce = query("SELECT farmer_produce FROM users1 WHERE farmer_number='$farmer_number'");



		 		header("Location: center_form.php");

				exit();

		 	}

}

else

{

  header("Location: center_form.php");

		exit();

}



?>