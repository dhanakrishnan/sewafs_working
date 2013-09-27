<?php

  require_once("include/registration_check.php");
  require_once("include/session.php");
  require_once("include/queries.php");
  require_once("include/db_connection_close.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $password1 = trim($_POST['password']);
    $password2 = trim($_POST['password2']);


    if(!passwardConfirmed($password1, $password2)){
       header('Location:user_role_view.php?status=passwordmismatch&page=password');
      exit;
    }

    if(!loginRequiredField($password1, $password2))
      {
        //echo "inside if";
        header("Location:user_role_view.php?status=empty&page=password");
        exit;
      }
    $hashedPassword = sha1($password1);
    $updatePasswordQuery = getUpdatePasswordQuery($_SESSION['sewafs_user_userID'], $hashedPassword);

    include("include/db_connection.php");
    mysqli_query($dbConnect, $updatePasswordQuery);

    closeConnection($dbconnect);
    header('Location:user_role_view.php?status=success&page=password');
  }
?>