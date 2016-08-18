<!DOCTYPE html>
<html>
<head>
	<title>Sticker Webform</title>





<?php



$name = $email = $address = $addressl2 = $city = $state = $zip = $gift = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	

	echo "<script> console.log(`", var_dump($_POST) , "`);</script>";



$username = "thinksmart";
$password = "thinksmart";

// Create connection
// $db = new PDO("mysql:host=127.0.0.1;dbname=thinksmart", $username, $password);


$serverName = "serverName\sqlexpress"; //serverName\instanceName
$connectionInfo = array( "Database"=>"dbName", "UID"=>"userName", "PWD"=>"password");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}







$name = $_POST["person"];
$address = $_POST["address"];
$addressl2 = $_POST["addressl2"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];









// $query = $db->prepare("INSERT INTO submissions(name,address,addressl2,city,state,zip) VALUES('$name','$address','$addressl2','$city','$state','$zip')");
// $query->execute();
// $error = $db->errorInfo();
// if (!is_null($error[2])) {
//     echo "Query failed! " . $error[2];
// }




// $query = $db->prepare("INSERT INTO submissions(name,address,addressl2,city,state,zip) VALUES('$name','$address','$addressl2','$city','$state','$zip')");















}

?>



	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

	<style type="text/css">
	

	body {
		margin:0;
		background-color: #f6f6f6;
		font-family: 'Lato', sans-serif;

	}


	input {
		font-size: 12px;
	}

	input[type=text] {
		margin: 4px 0px;
		padding: 0 2vw;
		width: 100vw;
		height: 25px;

		border-radius: 2px;

		border:none;
		border-bottom: solid;
		border-bottom-width: 3px;
		border-bottom-color: #f6f6f6;
		
		background-color: #fff

	}

	#csz {
		width: 100%;
		display: flex;
		justify-content: space-between;
	}


	input[type=submit] {
		width: 100vw;
		height: 40px;
		margin: 0;
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


	#maindiv {
		height:100vh;
		display: flex;
		flex-direction: column;
		justify-content: center;	
	}


	#name, #address, #addressl2, #city {
		padding-left: 8vw;
	}

	#city {
		width: 36vw;
	}
	#state {
		width: 16vw;
		text-align: center;
	}

	#zip {
		width: 25vw;
		text-align: center;
	}

	#error {
		width: 80%;
		height: 16px;
		margin: auto;
		color: red;
		font-size: 10pt;
		text-align: center;
	}

	.text {
		width: 100%;
		text-align: center;
	}
	.head {
		font-size: 24pt;
		margin-bottom: 12px;
	}

	</style>




</head>
<body>	






<div id="maindiv">



	<div class="text center head">
	Totally done.
	</div>

	<div class="text center"> Your sticker is being made. </div>



	

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

		if (empty.length > 1) {
			for (var i=0; i<empty.length-1; i++){
				string += empty[i]+", "
			}
			string += "and "
		}
		string += empty[empty.length-1]
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