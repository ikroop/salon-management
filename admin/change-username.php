<?php
// configuration
require("../config.php");
require_once("../db.php");
// require_once("../config.php");
$username = $_POST['new_username'];
$old_username = $_POST['old_username'];

// if form was submitted 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	 if(empty($_POST["new_username"]))
	 {
		 if(empty($_POST["new_username"]))
	 	{
			 print("Nice work, hacker!");
	 		die();
		}
	}else
	{
		$sql = "SELECT username FROM admin WHERE username='$old_username'";
		
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			
			//output data
			while($row = $result->fetch_assoc()) {
				
				
                // print("hi");
                // die();
				query("UPDATE admin SET username = '$username' WHERE username='$old_username'");
				//Set some session variables for easy reference
				$_SESSION['successfulupdate_username'] = true;
				 header("Location: password.php");
				exit();
			
					}
				}
				else {

					$_SESSION['failUpdate_username'] = true;
		   
					header("Location: password.php");
		   
				   exit();
		   
				}
		 	}
}
else
{
  header("Location: password.php");
		exit();
}
?>
