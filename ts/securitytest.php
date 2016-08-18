<?php 
	session_start();
?>



<?php

	function generateFormToken($form) {
	    
	       // generate a token from an unique value
	    	$token = md5(uniqid(microtime(), true));  
	    	
	    	// Write the generated token to the session variable to check it against the hidden field when the form is sent
	    	$_SESSION[$form.'_token'] = $token; 
	    	
	    	return $token;
	}

	function verifyFormToken($form) {
	    
	    // check if a session is started and a token is transmitted, if not return an error
		if(!isset($_SESSION[$form.'_token'])) { 
			return false;
	    }
		
		// check if the form is sent with token in it
		if(!isset($_POST['token'])) {
			return false;
	    }
		
		// compare the tokens against each other if they are still the same
		if ($_SESSION[$form.'_token'] !== $_POST['token']) {
			return false;
	    }
		
		return true;
	}

	function writeLog($where) {

	$ip = $_SERVER["REMOTE_ADDR"]; // Get the IP from superglobal
	$host = gethostbyaddr($ip);    // Try to locate the host of the attack
	$date = date("d M Y");
	
	// create a logging message with php heredoc syntax
	$logging = <<<LOG
		\n
		<< Start of Message >>
		There was a hacking attempt on your form. \n 
		Date of Attack: {$date}
		IP-Adress: {$ip} \n
		Host of Attacker: {$host}
		Point of Attack: {$where}
		<< End of Message >>
LOG;
        
        // open log file
		if($handle = fopen('hacklog.log', 'a')) {
		
			fputs($handle, $logging);  // write the Data to file
			fclose($handle);           // close the file
			
		} else {  // if first method is not working, for example because of wrong file permissions, email the data
		
        	$to = 'bbogin@thinksmart.com';  
        	$subject = 'HACK ATTEMPT';
        	$header = 'From: bbogin@thinksmart.com';
        	if (mail($to, $subject, $logging, $header)) {
        		echo "Sent notice to admin.";
        	}

	}
}
?>




<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Building a whitelist array with keys which will send through the form, no others would be accepted later on
	$whitelist = array('token','submit');



	if (verifyFormToken('form')) {


		// Building an array with the $_POST-superglobal 
		foreach ($_POST as $key=>$item) {
		        
		        // Check if the value $key (fieldname from $_POST) can be found in the whitelisting array, if not, die with a short message to the hacker
				if (!in_array($key, $whitelist)) {
					
					writeLog('Unknown form fields');
					die("Hack-Attempt detected. Please use only the fields in the form");
					
					}
		}


	} else {
	   
	   echo "Hack-Attempt detected. Got ya!.";
	   writeLog('Formtoken');

	}







}

?>









<?php
   // generate a new token for the $_SESSION superglobal and put them in a hidden field
   $newToken = generateFormToken('form');

?>
















<form method="post" action="securitytest.php">
	<input type="hidden" name="token" value="<?php echo $newToken; ?>">
	<input type="submit" value="Send me a sticker!" id="submit">

</form>



















