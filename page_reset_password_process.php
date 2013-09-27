<?php
  //var_dump($_POST);
  require_once("include/registration_check.php");
  require_once("include/queries.php");
  require_once("include/db_connection_close.php");
  require_once("include/sewafs_functions.php");
  //var_dump($_POST);

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $emailID = trim($_POST['emailID']);
    //Check required field validation
    //check for email Address validation
    //echo $emailID;
    if(!validEmail($emailID))
    {
      header("Location:page_reset_password.php?status=invalidEmail");
      exit;
    }
    
    $userID = getUserID($emailID);
    if(is_null($userID))
    {
      header("Location:page_reset_password.php?status=nonmember");
      exit;
    }

    //Create a temporary password
    $passwordLength = 6;
      $password = generateTemporaryPassword($passwordLength);
      //echo $password . "<br>";
      $hashedPassword = sha1($password);
      //echo $hashedPassword;
    //Update User table with the  new password
    include("include/db_connection.php");

    $updatePasswordQuery = getUpdatePasswordQueryByEmailID($emailID, $hashedPassword);
    //echo $updatePasswordQuery;
    mysqli_query($dbConnect, $updatePasswordQuery);


    //send email

    $email_body = "Your Temporary Password : ". $password;
    send_emailto_the_volunteer($emailID, $email_body);

    header("Location:page_reset_password.php?status=success");
     
  }
?>