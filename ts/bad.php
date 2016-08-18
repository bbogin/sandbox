<!DOCTYPE html>
<html>
<head>
	<title>M Webfom</title>





<?php

$name = $email = $address = $city = $state = $zip = $gift = "";
$timestamp = time();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = ($_POST["name"]);
	$address = ($_POST["address"]);
	$city = ($_POST["city"]);
	$state = ($_POST["state"]);
	$zip = ($_POST["zip"]);

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



$sql_query = "INSERT INTO submissions(name,address,city,state,zip) VALUES('$name','$address','$city','$state','$zip')";

$retval = mysql_query( $sql_query, $conn );

 if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "<script> console.log('Entered data successfully');</script>";






?>



























	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

	<style type="text/css">
	

	body {
		margin:0;
		background-color: lightgray;
		font-family: 'Lato', sans-serif;

	}



	form {
		width: 450px;
		text-align: center
	}


	input {
		font-size: 20px;
		/*color: white;*/
	}

	input[type=text] {
		margin: 10px 5px;
		padding: 5px;
		width: 365px;
		height: 30px;

		border-radius: 3px;

		border:none;
		border-bottom: solid;
		border-bottom-width: 3px;
		border-bottom-color: #D3D3D3; 	
		
		/*background:transparent;*/
		background-color: #f1f1f1

	}


	input[type=submit] {
		width: 85%;
		height: 50px;
		margin: 50px 0;
		border: 0 none;
		background-color: #4271DE;

		color: white;

		border-radius: 3px;
	}


	input:focus, textarea:focus {
    outline: none;
    border-bottom-color: #4271DE;
    transition: border-bottom .3s ease;
	}


	#maindiv{
		height: 90vh;
		width: 100%;
		margin-top: 10vh;

		display: flex;
		flex-direction: column;
		align-items: center;

	}

	#ff {
		width: 150px;
		height: 150px;
	}

	#name, #address, #city {
		padding-left: 20px;
	}

	#city {
		width: 200px;
	}
	#state, #zip {
		width: 60px;
		text-align: center

	}

	.text {
		width: 370px;
		margin: 15px 0;

	}

	.head {
		font-size: 30pt;
		margin: 30px 0 20px 0;
	}

	.fine {
		font-size: 10px
	}

	.center {
		text-align: center;
	}



	</style>




</head>
<body>	









<div id="maindiv">

<img id="ff" src="ff.png">



<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

	<div class="text center head">
	Thank You.
	</div>

	<div class="text center"> Your sticker is on its way. </div>


<?php } else { ?>

	<div class="text">
		<div class="text head">You've earned it</div>
		<div class="text">
			We think you're awesome.<br>
			That's why we want to send you this awesome sticker.
		</div>
		<div class="text">Totally free. Totally for you.</div>
	</div>

	<div id="form">
	<form method="post" action="index2.php">
		<input type="text" placeholder="Name" name="name" id="name" ></input><br>
		<input type="text" placeholder="Address" name="address" id="address"><br>
		<input type="text" placeholder="City" name="city" id="city">
		<input type="text" placeholder="State" name="state" id="state" maxlength="2">
		<input type="text" placeholder="Zip" name="zip" id="zip" maxlength="5">
		<input type="submit" value="Send me a sticker!">
	</form>
	</div>

	<div class="text fine"><em>The Fine Print: Your information is safe with us and this is the only thing we'll ever send you. Read our <a href="#">Privacy Policy.</a></em></div>
	
<?php }
?>

	

</div>






</body>
</html>