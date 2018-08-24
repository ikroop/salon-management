<?php
// configuration
require("../config.php");
require_once("../db.php");
// require_once("../config.php");
$member_number = $_POST['member_number'];
$tithe = $_POST['produce'];
$service_offered = (string)$_POST['service_offered'];
// if form was submitted 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	 if(empty($_POST["member_number"]) || empty($_POST["produce"]))
	 {
		 if(empty($_POST["member_number"]))
	 	{
			 print("Nice work, hacker!");
	 		die();
		}
		if(empty($_POST["produce"]))
		{
			print('Please input The Cost.');
			die();
		}
	}else
	{
		$sql = "SELECT * FROM users1 WHERE member_number='$member_number'";
		
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			
			//output data
			
			while($row = $result->fetch_assoc()) {

				// current attendant
				$current_attendant = $_SESSION['id_admin'];

				// calculate commission
				$commission = $tithe * 0.1;
				
				query("UPDATE users1 SET tithe = tithe + '$tithe' WHERE member_number='$member_number'");

				// update commission
				query("UPDATE admin SET commission = commission + '$commission' WHERE id_admin='$current_attendant'");
				
				query("INSERT INTO history (id_member, service_offered, given_tithe) VALUES($member_number, '$service_offered', $tithe)");
				//Set some session variables for easy reference
				$_SESSION['successfulupdate'] = true;
				 header("Location: church_form.php");
				exit();
			
					}
				}
				else {

					$_SESSION['failUpdate'] = true;
		   
					header("Location: church_form.php");
		   
				   exit();
		   
				}
		 	}
}
else
{
  header("Location: center_form.php");
		exit();
}
?>
