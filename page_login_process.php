<?php
  require_once("include/registration_check.php");
  require_once("include/session.php");
  require_once("include/queries.php");

  //Check for the server request. If it is Post continue with the login process
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $emailID = trim($_POST['emailID']);
    $password = trim($_POST['password']);

    if(!loginRequiredField($emailID, $password))
    {
      //echo "inside if";
      header("Location:page_login.php?status=blank");
      exit;
    }
    include("include/db_connection.php");
    require_once("include/db_connection_close.php");

    $hashedPassword = sha1($password);
    //echo $hashedPassword;

    //$getUserPasswordQuery = "SELECT * FROM User_Info WHERE emailID = '$emailID'";
    $getUserPasswordQuery = getUserPasswordQuery($emailID);

    //echo $getUserPasswordQuery;
      
       include("include/db_connection.php");
       require_once("include/db_connection_close.php");
    $result = mysqli_query($dbConnect, $getUserPasswordQuery);

    //var_dump($result);
    //Check the user login information against every row in the database

    if($result->num_rows != 0)
    {
      //echo "inside if";
         while($row = mysqli_fetch_array($result))
         {
            //echo "inside while";
           //echo $row['password'] . '<br />' . $hashedPassword;
              if($row['password'] == $hashedPassword)
              {
                //echo "inside if";
                //user who is assigned the role other than admin is redirected to the index page.
                $_SESSION['loginID'] = $emailID; //Basically emailID
                $_SESSION['userName'] = $row['userName']; //Name to be shown on the user page
                $_SESSION['userID'] = $row['userID']; //Date base Id on the user table
                //echo $_SESSION['userID'];
                $rank = getUserRole($_SESSION['userID']);

                /* This is the final session state variables*/
                $_SESSION['sewafs_user_emailID'] = $emailID;
                $_SESSION['sewafs_user_userName'] = $row['userName'];
                $_SESSION['sewafs_user_userID'] = $row['userID'];

                $userRole = "";
                switch ($rank) {
                  case '1':
                    $userRole = "admin";
                    break;
                  case '2':
                    $userRole = "volunteer";
                    break;
                  case '3':
                    $userRole = "family";
                    break;
                  case '4':
                    $userRole = "guest";
                    break;
                  default:
                    $userRole = "guest";
                    break;
                }


                $_SESSION['role'] = $userRole;
                $_SESSION['sewafs_user_role'] = $userRole;

                header('Location:user_role_view.php');
                exit;
             }
             else
             {
              header('Location:page_login.php?status=passwordInCorrect');
              exit;
             }
         }
     }      
    //if the user name doesnt exist postbact to the same page with the status variable
    header('Location:page_login.php?status=notamember');
    closeConnection($dbConnect);
  }
?>