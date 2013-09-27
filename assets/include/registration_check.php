<?php


	//Check whether the both password and confirmaiton password are same
	function passwardConfirmed($password1, $password2){
		return  $password1 == $password2;
	}

	//Check for the email validation
	function validEmail($email)
	{
		require_once("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
		if(!$mail->ValidateAddress($email)){
			return false;
		}
		return true;
    }

	//Check for the required field
	function requiredFieldValidation($fn, $ln, $email, $pass1, $pass2)
	{

		if($fn == "" || $ln == "" || $email == "" || $pass1 == "" || $pass2 == "" )
		{
			return false;
		}
		return true;
	}

?>