<?php



//Your Mysql Config

// $servername = "us-cdbr-iron-east-01.cleardb.net";

// $username = "bd50b30cc512ef";

// $password = "9c827238";

// $dbname = "heroku_7b8b317562f9d48";

$servername = "localhost";

$username = "root";

$password = "2grateful";

$dbname = "er";


//Create New Database Connection

$conn = new mysqli($servername, $username, $password, $dbname);

// inline connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

//Check Connection

if($conn->connect_error) {

	die("Connection Failed: ". $conn->connect_error);

}