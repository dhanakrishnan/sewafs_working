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
  function requiredFieldValidation($un, $email, $pass1, $pass2)
  {

    if($un == "" || $email == "" || $pass1 == "" || $pass2 == "" )
    {
      return false;
    }
    return true;
  }

  //check for userName and password for the login page
  function loginRequiredField($userName, $password){

    if($userName == "" || $password == ""){
      return false;
    }
    return true;
  }

  //validate role assignment 
  function assignRoleRequiredField($userName, $roleName)
  {
    if ($userName == "userName" || $roleName == "role")
    {
      return false;
    }
    return true;
  }

  //check for the required field on contact us form
  function contactRequiredField($name, $emailID, $message)
  {
    if($name == "" || $emailID == "" || $message == "")
    {
      return false;
    }
    return true;
  }
  
  function volunteerRegReqFieldValidation($fn, $ln, $emailID, $phoneno, $location, $age, $language, $emcName1, $emcNo1, $emcRel1)
  {
    if( 
      is_null($fn) || $fn == "" ||
      is_null($ln) || $ln == "" ||
      is_null($emailID) || $emailID == "" ||
      is_null($phoneno) || $phoneno == "" ||
      is_null($location) || $location == "" ||
      is_null($age) || $age == "" ||
      is_null($language) || $language =="" ||
      is_null($emcName1) || $emcName1 == "" ||
      is_null($emcNo1) || $emcNo1 =="" ||
      is_null($emcRel1) ||  $emcRel1 == "")
    {
      return false;
    }
    else
      return true;
  }

  function validPhoneNumber($phoneNo)
  {
    $phoneNumberRegex = '/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/';

    if(preg_match($phoneNumberRegex, $phoneNo))
    {
      return true;
    }
    return false;
  }

  function generateTemporaryPassword($passwordLength)
  {

    $char = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $length = strlen($char);
    $str = "";
    //Use this version if the length of the randomly generated string is bigger than the $char
    /*for( $i = 0; $i < $passwordLength; $i++ ) 
    {
      echo rand( 0, $length - 1 );
      $str = $str . $char[ rand( 0, $size - 1 ) ];
    }

    echo $str;*/
    $str = substr( str_shuffle( $char ), 0, $passwordLength );
    //echo $str;
    return $str;
  }

?>