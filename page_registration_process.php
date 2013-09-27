<?php
require_once("include/registration_check.php");
require_once("include/session.php");
require_once("include/queries.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

$email = trim($_POST['emailID']);
/*$firstName =trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);*/
$userName = trim($_POST['userName']);
$password1 = trim($_POST['password1']);
$password2 = trim($_POST['password2']);
$policy = $_POST["policy"];
//echo $email . <br /> . $firstName .<br />.$lastName . <br />.$pa
if(!requiredFieldValidation($userName, $email,$password1, $password2)){
  header('Location:page_registration.php?status=blank');
  exit;
}
if(!validEmail($email)){
  header('Location:page_registration.php?status=invalidEmail');
  exit;
}
if(!passwardConfirmed($password1, $password2)){
  header('Location:page_registration.php?status=passwordmismatch');
  exit;
}

if(!isset($policy)){
  header('Location:page_registration.php?status=nopolicy');
  exit;
}

include("include/db_connection.php");
require_once("include/db_connection_close.php");

$hashedPassword = sha1($password1);

//Check for the duplication before adding a user into the usertable
//$query = "SELECT * FROM User_Info WHERE emailID = '$email'";
$getUserQuery = getUser($email);
$result = mysqli_query($dbConnect, $getUserQuery);
if($result->num_rows == 0){
    //$insert_query = "insert into User_Info(`firstName`,`lastName`,`emailID`,`password`) Values ('$firstName','$lastName','$email','$hashedPassword')";
    $insertUserQuery = insertUserQuery($userName, $email, $hashedPassword);
    mysqli_query($dbConnect, $insertUserQuery);
    
    /* Change everything to final sewafs session state variables. 
    Once everything is changes this section can be commented*/
    $_SESSION['loginID'] = $email;
    $_SESSION['userName'] = $userName;
    $_SESSION['role'] = "guest";

    /* This is the final session state variables*/
    $_SESSION['sewafs_user_emailID'] = $email;
    $_SESSION['sewafs_user_role'] = "guest";
    $_SESSION['sewafs_user_userName'] = $userName;

    //Assign Guest Role to the registered user.
    $userID = getUserID($email);
    //echo $userID;
    $_SESSION['sewafs_user_userID'] = $userID;
    $roleID = getRoleID("guest");
    //echo $roleID;

    $insertUserRoleQuery = getInsertUserRoleQuery($userID, $roleID);
    //echo $insertUserRoleQuery;

    mysqli_query($dbConnect, $insertUserRoleQuery);

    //header('Location:page_guest.php');
    header('Location:user_role_view.php');
    exit;
}
closeConnection($dbConnect);
header('Location:page_registration.php?status=member');
}
?>