<?php
// configuration
require("../config.php");
require_once("../db.php");
// require_once("../config.php");
$old_password = $_POST['old_password'];
$password = $_POST['new_password'];
$confirmation = $_POST['confirmation'];
// if form was submitted 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	 if(empty($_POST["old_password"]) || empty($_POST["new_password"]))
	 {
		 if(empty($_POST["old_password"]))
	 	{
			 print("Nice work, hacker!");
	 		die();
		}
		if(empty($_POST["new_password"]))
		{
			print('Please input The password.');
			die();
		}
	}else
	{
		$sql = "SELECT * FROM admin WHERE password='$old_password'";
		
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			
			//output data
			while($row = $result->fetch_assoc()) {
				
				
                // print("hi");
                // die();
				query("UPDATE admin SET password = '$password' WHERE password='$old_password'");
				//Set some session variables for easy reference
				$_SESSION['successfulupdate'] = true;
				 header("Location: password.php");
				exit();
			
					}
				}
				else {

					$_SESSION['failUpdate'] = true;
		   
					header("Location: password.php");
		   
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
