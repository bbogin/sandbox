<!DOCTYPE html>
<html>
<head>
	<title>M Webfom</title>





<?php

$name = $email = $address = $addressl2 = $city = $state = $zip = $gift = "";
$timestamp = time();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = ($_POST["name"]);
	$address = ($_POST["address"]);
	$addressl2 = ($_POST["addressl2"]);
	$city = ($_POST["city"]);
	$state = ($_POST["state"]);
	$zip = ($_POST["zip"]);

	echo "<script> console.log(`", var_dump($_POST) , "`);</script>";



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



$sql_query = "INSERT INTO submissions(name,address,addressl2,city,state,zip) VALUES('$name','$address','$addressl2','$city','$state','$zip')";

$retval = mysql_query( $sql_query, $conn );

 if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "<script> console.log('Entered data successfully');</script>";




}

?>



	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'> -->
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

	<style type="text/css">
	

	body {
		margin:0;
		background-color: #f6f6f6;
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

		border-radius: 2px;

		border:none;
		border-bottom: solid;
		border-bottom-width: 3px;
		border-bottom-color: #f6f6f6;
		
		background-color: #fff

	}


	input[type=submit] {
		width: 85%;
		height: 50px;
		margin: 35px 0;
		border: 0 none;
		background-color: #0098d3;

		color: white;

		border-radius: 3px;
	}


	input:focus, textarea:focus {
    outline: none;
    border-bottom-color: #0098d3;
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

	#name, #address, #addressl2, #city {
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
		font-size: 14pt;

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

	#error {
		width: 370px;
		height: 16px;
		margin: auto;
		color: red;
		font-size: 10pt;
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
	<form onsubmit="return validate()" method="post" action="index2.php">
		<input type="text" placeholder="Name" name="name" id="name" ></input><br>
		<input type="text" placeholder="Address" name="address" id="address"><br>
		<input type="text" placeholder="Address Line 2" name="addressl2" id="addressl2"><br>
		<input type="text" placeholder="City" name="city" id="city">
		<input type="text" placeholder="State" name="state" id="state" maxlength="2">
		<input type="text" placeholder="Zip" name="zip" id="zip" maxlength="5">
		<div id="error">
		</div>
		<input type="submit" value="Send me a sticker!" id="submit">
	</form>
	</div>
	

	<div class="text fine"><em>The Fine Print: Your information is safe with us and this is the only thing we'll ever send you. Read our <a href="#">Privacy Policy.</a></em></div>
	
<?php }
?>

	<iframe src="index3.php"></iframe>

</div>



<script type="text/javascript">

function validate() {
	zip = document.getElementById("zip").value;
	name = document.getElementById("name").value;
	address = document.getElementById("address").value;
	city = document.getElementById("city").value;
	state = document.getElementById("state").value;

	string = ""
	empty = []

	if (name==""){
		empty.push("name")
	}
	if (address==""){
		empty.push("address")
	}
	if (city==""){
		empty.push("city")
	}
	if (state==""){
		empty.push("state")
	}

	if (zip==""){
		empty.push("zip code")
	}

	if (empty.length > 0){

		console.log(empty)
		string += "Please fill in your "

		for (var i=0; i<empty.length-1; i++){
			string += empty[i]+", "
		}
		string += "and "+empty[empty.length-1]
	}



	if (/\D/.test(zip)){

		if (string==""){
			string += "Please enter only numbers for your zip code"
		}
		else {
			string += " and enter only numbers for your zip code"
		}

		
		
	}

	if (string != "") {
		document.getElementById("error").innerHTML=string+".";
		console.log("False")
		return false
	} else {
		return true;
	}
	

	
	
};

</script>


</body>
</html>