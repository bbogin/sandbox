<?php 
session_start(); 
session_set_cookie_params(time()+3600, '/', '.thinksmart.com', true, true);
header("Content-Security-Policy: frame-ancestors 'none'");
header("Content-Security-Policy: default-src 'self' fonts.googleapis.com fonts.gstatic.com");
header("Content-Security-Policy: script-src 'unsafe-inline' ajax.googleapis.com https://www.google.com/recaptcha/api.js https://www.gstatic.com");
header("Strict-Transport-Security:max-age=63072000");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sticker Webform</title>





<?php

$name = $email = $address = $addressl2 = $city = $state = $zip = $country = $captcha ="";



function generateFormToken() {
    
       // generate a token from an unique value
    	$token = md5(uniqid(microtime(), true));  
    	
    	// Write the generated token to the session variable to check it against the hidden field when the form is sent
    	$_SESSION['token'] = $token;

    	
    	return $token;

}

function verifyFormToken() {

    
    // check if a session is started and a token is transmitted, if not return an error
	if(!isset($_SESSION['token'])) { 
		return false;
    }
	
	// check if the form is sent with token in it
	if(!isset($_POST['token'])) {
		return false;
    }
	
	// compare the tokens against each other if they are still the same
	if ($_SESSION['token'] !== $_POST['token']) {
		return false;
    }

    $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lda9ScTAAAAAGKZQWvn0QHDRf_2O3-pSwBCxNUQ&response=".$_POST['g-recaptcha-response']), true);
	if($response['success'] == false)
    {
        echo 'captcha';
        return false;
    }

	
	return true;
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// echo "<script> console.log(`", var_dump($_POST) , "`);</script>";

	if (verifyFormToken()) {



		// echo "<script> console.log(`", var_dump($_POST) , "`);</script>";

	   // Create connection


		$server = "127.0.0.1";
		$database = "thinksmart";
		$username = "thinksmart";
		$password = "thinksmart";

		$conn = mysqli_connect($server, $username, $password);
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		} else {
			echo "<script> console.log('Connected successfully');</script>";
		}


		$name = addslashes($_POST["person"]);
		$email = addslashes($_POST["email"]);
		$address = addslashes($_POST["address"]);
		$addressl2 = addslashes($_POST["addressl2"]);
		$city = addslashes($_POST["city"]);
		$state = addslashes($_POST["state"]);
		$zip = addslashes($_POST["zip"]);
		$country = addslashes($_POST["country"]);




		mysqli_select_db($conn, $database);




		$sql_query = "INSERT INTO yelp(name,email,addressl1,addressl2,city,state,zip, country) VALUES('$name','$email','$address','$addressl2','$city','$state','$zip','$country')";

		$retval = mysqli_query($conn, $sql_query);

		 if(! $retval ) {
		               die('Could not enter data: ' . mysqli_error());
		            }
		            
		            echo "<script> console.log('Entered data successfully');</script>";





	} else {
	   
	   echo "CSRF/Captcha token invalid";

	}


echo "<script> console.log(`", var_dump($_POST) , "`);</script>";






}

?>



	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

<style type="text/css">
	

	body {
		margin:0;
		background: url(Air.svg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		font-family: 'Open Sans', sans-serif;

	}



	form {
		font-size: 20px;
		font-family: 'Open Sans', sans-serif;
		width: 450px;
	}


	input {
		font-family: 'Open Sans', sans-serif;
		font-size: 20px;
		/*color: white;*/
	}

	.radio{
		margin-left: 44px;
	}

	input[type=radio]{
	    display:none
	}

	input[type=radio]:checked + .radio{
	    border-bottom: 1px solid #4271DE;

	}


	form {
		margin: auto;
		text-align: center;
	}
	input[type=text] {
		margin: 5px;
		padding: 5px;
		width: 365px;
		height: 30px;

		border:none;
		border-bottom: solid;
		border-bottom-width: 1px;
		border-bottom-color: #D3D3D3; 	
		
		background:transparent;

	}


	input[type=submit] {
		width: 85%;
		height: 50px;
		margin: 3px 0 50px 0;
		border: 0 none;
		background-color: #4271DE;

		color: white;
	}


	input:focus, textarea:focus {
    outline: none;
    border-bottom-color: #4271DE;
	}

	h1 {
		text-align: center;
		font-size: 28px;
		margin: 40px 0;
	}

	#subheader {
		width: 370px;
		margin: 30px auto 30px auto;
		text-align: justify;
	}

	#maindiv{
		height: 100vh;
		width: 100%;
		/*position: relative;*/
	}

	#tile {
		margin: 30px auto;
		padding-top: 30px;
		width: 600px;
		height: 954px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		background-color: white;
	}

	#country {
		margin: 10px 18px 0 5px;
		padding: 5px;
	}

	#city {
		width: 185px;
	}
	#state {
		width: 50px;
		text-align: center

	}
	#zip {
		width: 70px;
		text-align: center

	}
	#error {
		font-size:11px;
		color: red;
		height: 15px;
		margin: 15px 0;
	}

	#yelppic {
		width: 375px;
	}

	.center {
		margin-top: 200px;
		text-align: center;
	}

	.img{
		text-align: center;
	}

	.asterisk {
		color: red;
		font-size: 10pt;
	}

	.g-recaptcha > div {
		margin: auto;
	}

	#required {
		width: 375px;
		margin:0 0 30px 115px;
	}

	#submit {
		display: none;
	}

	</style>


<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>	






<div id="maindiv">

	<div id="tile">



<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

	<div class="text center">
	<span style="font-size:36px;"> Thanks! </span><br> <br>
	

	<span style="font-size:24px;"> Your sticker is on its way.</span>
	</div>


<?php } else { ?>

	<?php
   		// generate a new token for the $_SESSION superglobal and put them in a hidden field
  		$newToken = generateFormToken();   
	?>





	<h1>"Find Us On Yelp" Sticker Request!</h1>
	<div class="img"><img id="yelppic" src="yelp.jpg" alt="Yelp Sticker"></div>
	<div id="subheader">Thank you for your interest! Please note stickers are currently shipped to addresses within the U.S. and Canada only. Please allow 3-4 weeks for shipping and handling.</div>
	<div id=required>Required fields indicated by <span class="asterisk"><sup>*</sup></span></div>
	<form method="post" onsubmit="return validate()" action="stickerform.php">
		



		<span class="asterisk"><sup>*</sup></span><input type="text"  value="Name" onfocus="if(this.value == 'Name') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Name'}" name="name" id="name" ></input><br>
		<span class="asterisk"><sup>*</sup></span><input type="text"  value="Email" onfocus="if(this.value == 'Email') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Email'}" name="email" id="email"><br>
		<span class="asterisk"><sup>*</sup></span><input type="text"  value="Address" onfocus="if(this.value == 'Address') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Address'}" name="address" id="address"><br>
		<input type="text"  value="Address Line 2" onfocus="if(this.value == 'Address Line 2') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Address Line 2'}" name="address2" id="address"><br>
		<span class="asterisk"><sup>*</sup></span><input type="text"  value="City" onfocus="if(this.value == 'City') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'City'}" name="city" id="city">
		<span class="asterisk"><sup>*</sup></span><input type="text"  value="State" onfocus="if(this.value == 'State') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'State'}" name="state" id="state" maxlength="2">
		<span class="asterisk"><sup>*</sup></span>	<input type="text"  value="Zip" onfocus="if(this.value == 'Zip') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Zip'}" name="zip" id="zip" maxlength="6">


		<div id="country"><span class="asterisk"><sup>*</sup></span>&nbsp;Country:
		<input type="radio" name="country" value="us" id="r1" checked="checked" />
    	<label class="radio" for="r1">United States</label>
    	<input type="radio" name="country" value="canada" id="r2" />
    	<label class="radio" for="r2">Canada</label>
		<input type="hidden" name="token" id="token" value="<?php echo $newToken; ?>">
	    </div>

	    <div id="error">
		</div>
		<div class="g-recaptcha" data-callback="recaptcha" data-sitekey="6Lda9ScTAAAAAFwsDL0wHB_RXvf9-XuT0fejp_XC"></div>
		<input id="submit" type="submit" value="Submit">
	</form>
	</div>




</div>




	

	
<?php }
?>

	

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">

$('input[type="submit"]').prop('disabled', true);

function recaptcha() {
	$(".g-recaptcha").hide()
	$("#submit").show();
	$('input[type="submit"]').prop('disabled', false);
	// $("#submit").disabled=false;
}


// &\*\(\)\!`:|\\\{\}\[\]\?\>\<
$('#city, #name').bind('keypress', function (event) {
    var regex = new RegExp("^[\"@#%\^\$\!\*\[\\]\{\}\|:<>\\\\/\?\=\+`]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (regex.test(key)) {
       event.preventDefault();
       return false;
    }
});

$('#state').bind('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});


$('#zip').bind('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});

function validate() {
	zip = document.getElementById("zip").value;
	email = document.getElementById("email").value;
	name = document.getElementById("name").value;
	address = document.getElementById("address").value;
	city = document.getElementById("city").value;
	state = document.getElementById("state").value;

	string = ""
	empty = []

	if (name=="Name"){
		empty.push("name")
	}
	if (address=="Address"){
		empty.push("address")
	}
	if (city=="City"){
		empty.push("city")
	}
	if (state=="State"){
		empty.push("state")
	}

	if (zip=="Zip"){
		empty.push("zip code")
	}

	if (empty.length > 0){

		console.log(empty)
		string += "Please add your "

		if (empty.length > 1) {
			for (var i=0; i<empty.length-1; i++){
				string += empty[i]+", "
			}
			string += "and "
		}
		string += empty[empty.length-1]
	}


	// if ((/\D/.test(zip))&&(zip!="Zip")){

	// 	if (string==""){
	// 		string += "Please enter only numbers for your zip code"
	// 	}
	// 	else {
	// 		string += ", and a valid zip"
	// 	}		
	// }


    var re = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    // console.log(email)
    // console.log(re.test(email));
    if (!re.test(email)){

    	if (string==""){
			string += "Please enter a a valid email"
		}
		else {
			string += ", and a valid email"
		}
			
    };


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