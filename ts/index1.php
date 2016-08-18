<!DOCTYPE html>
<html>
<head>
	<title>M Webfom</title>


	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

	<style type="text/css">
	

	body {
		margin:0;
		background: url(Air.svg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}



	form {
		width: 450px;
		text-align: center
	}


	input {
		font-family: 'Open Sans', sans-serif;
		font-size: 20px;
		/*color: white;*/
	}

	.radio{
	    background-color:white;
	    display:inline-block;
	    width:20%;
	    height:50px;
	    text-align:center;
	    line-height: 50px;
	    font-family:sans-serif;
	    border: 1px solid #D3D3D3;
	    margin:50px 20px;
	}

	input[type=radio]{
	    display:none
	}

	input[type=radio]:checked + .radio{
	    background-color:#4271DE;
	    color: white;
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
		margin: 50px 0;
		border: 0 none;
		background-color: #4271DE;

		color: white;
	}


	input:focus, textarea:focus {
    outline: none;
    border-bottom-color: #4271DE;
	}


	#maindiv{
		height: 100vh;
		width: 100%;
		position: relative;
	}

	#form {
		width: 450px;
		/*margin: auto;*/
		position: absolute;
		top:50%;
		left: 50%;
		transform: translate(-50%,-60%);
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		background-color: white;
		/*background-color: #00B3B0;*/
	}

	#city {
		width: 200px;
	}
	#state, #zip {
		width: 60px;
		text-align: center

	}



	</style>




</head>
<body>	









<div id="maindiv">

	<div id="form">
	<form method="post" action="ts/thanks.php">
	    <input type="radio" name="gift" value="tshirt" id="r1" checked="checked" />
    	<label class="radio" for="r1">T-Shirt</label>
    	<input type="radio" name="gift" value="sticker" id="r2" />
    	<label class="radio" for="r2">Sticker</label>
		<input type="text"  value="Name" onfocus="if(this.value == 'Name') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Name'}" name="name" id="name" ></input><br>
		<input type="text"  value="Email" onfocus="if(this.value == 'Email') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Email'}" name="email" id="email"><br>
		<input type="text"  value="Address" onfocus="if(this.value == 'Address') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Address'}" name="address" id="address"><br>
		<input type="text"  value="City" onfocus="if(this.value == 'City') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'City'}" name="city" id="city">
		<input type="text"  value="State" onfocus="if(this.value == 'State') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'State'}" name="state" id="state" maxlength="2">
		<input type="text"  value="Zip" onfocus="if(this.value == 'Zip') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Zip'}" name="zip" id="zip" maxlength="5">
		<input type="submit" value="Submit">
	</form>
	</div>

</div>






</body>
</html>