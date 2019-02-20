<?php
	$errorMessage = '';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$messageVal = $_POST['message'];

	$message = $messageVal;
	$message .= "\n\n" . $name;
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$headers .= 'From: '. $email . "\r\n" .
    'Reply-To: '. $email .  "\r\n" .
    'X-Mailer: PHP/' . phpversion();
       
	$success =  mail('officialcodeharbour@gmail.com', 'Website Enquiry', $message, $headers);
	if (!$success) {
		$errorMessage = error_get_last()['message'];
	}

	echo $errorMessage;
?>