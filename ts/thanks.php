<!DOCTYPE html>
<html>
<head>
	<title></title>


	<style type="text/css">
		

	body {
		margin: 0;
		background: url(early.svg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;

	}


	#container {
		width: 100%;
		height: 100%
		position: relative;

	}

	#maindiv {
		height: 200px;
		position: absolute;
		top:50%;
		left: 50%;
		transform: translate(-50%,-60%);

		font-family: 'Open Sans', sans-serif;
		font-size: 40px;
	}


	</style>
</head>
<body>





<?php

$name = $email = $address = $city = $state = $zip = $gift = "";
$timestamp = time();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = ($_POST["name"]);
	$email = ($_POST["email"]);
	$address = ($_POST["address"]);
	$city = ($_POST["city"]);
	$state = ($_POST["state"]);
	$zip = ($_POST["zip"]);
	$gift = ($_POST["gift"]);

	echo "<script> console.log(`", var_dump($_POST) , "`);</script>";

}


$servername = "127.0.0.1";
$username = "thinksmart";
$password = "thinksmart";
$database = "thinksmart";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysql_select_db($database);

echo "<script> console.log('Connected successfully');</script>";



$sql_query = "INSERT INTO submissions(name,email,address,city,state,zip,gift) VALUES('$name','$email','$address','$city','$state','$zip','$gift')";

$retval = mysql_query( $sql_query, $conn );

 if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "<script> console.log('Entered data successfully');</script>";






?>


<div id="container">

	<div id="maindiv">
		
	Thank you for your submission.

	</div>

</div>
















































</body>
</html>