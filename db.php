<?php



//Your Mysql Config

$servername = "us-cdbr-iron-east-01.cleardb.net";

$username = "b392fee07974af";

$password = "338bec78";

$dbname = "heroku_7ccf8a1d4c91da4";

// $servername = "localhost";

// $username = "root";

// $password = "2grateful";

// $dbname = "heroku_7ccf8a1d4c91da4";


//Create New Database Connection

$conn = new mysqli($servername, $username, $password, $dbname);

// inline connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

//Check Connection

if($conn->connect_error) {

	die("Connection Failed: ". $conn->connect_error);

}