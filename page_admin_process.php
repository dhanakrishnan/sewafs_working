<?php
    require_once("include/queries.php");
    require_once("include/registration_check.php");
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    //var_dump($_POST);
    $userID = $_POST['userID'];
    $roleID = $_POST['roleID'];

    $userName = "";
    $roleName = "";

    if(!assignRoleRequiredField($userID, $roleID))
    {
        header("Location:user_role_view.php?status=selected&page=roleAssignment");
        exit;
    }
    include('include/db_connection.php');
    //Get userID from User Table and assign it to a local variable
    
    //Assign the user to the role and store i the User_Role table
    $query =  insertUserRole($userID, $roleID);
    //echo $query;
    mysqli_query($dbConnect,$query);
    

    $getUserNameByIDQuery = getUserNameByIDQuery($userID);
    $result = mysqli_query($dbConnect, $getUserNameByIDQuery);
    if($result->num_rows != 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $userName = $row['userName'];
      }
    }

    $getRoleNameByIDQuery = getRoleNameByIDQuery($roleID);
    $result = mysqli_query($dbConnect, $getRoleNameByIDQuery);
    if($result->num_rows != 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $roleName = $row['roleName'];
      }
    }
    mysqli_close($dbConnect);

    header("Location:user_role_view.php?page=roleAssignment&status=success&userName=".$userName."&roleName=".$roleName);
  
  }
?>

<?php
 /*require_once("include/registration_check.php");
  require_once("include/session.php");
  require_once("include/queries.php");

  //Check for the server request. If it is Post continue with the login process
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $emailID = trim($_POST['emailID']);
    $password = trim($_POST['password']);

    if(!loginRequiredField($emailID, $password))
    {
      header("Location:page_login.php?status=notamember");
      exit;
    }
    include("include/db_connection.php");
    require_once("include/db_connection_close.php");

    $hashedPassword = sha1($password);
    //echo $hashedPassword;

    $getUserPasswordQuery = "SELECT * FROM User_Info WHERE emailID = '$emailID'";
    
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
           //echo $row['password'] . '<br />' . $hashedPassword;
              if($row['password'] == $hashedPassword)
              {
                //echo "inside if";
                //user who is assigned the role other than admin is redirected to the index page.
                $_SESSION['loginID'] = $emailID; //Basically emailID
                $_SESSION['userName'] = $row['firstName'] . " " . $row['lastName']; //Name to be shown on the user page
                $_SESSION['userID'] = $row['userID']; //Date base Id on the user table
                //echo $_SESSION['userID'];
                $rank = getUserRole($_SESSION['userID']);
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
                /*if($_SESSION['role'] == "")
                {
                  $_SESSION['role'] = getUserRole($_SESSION['userID']);
                  //echo $_SESSION['role'];
                }
                closeConnection($dbConnect);

                if($_SESSION['role'] == 'guest')
                {
                  header('Location:page_guest_user.php');
                }*/
                //echo $userRole;
               /* if($userRole == 'guest')
                {
                  header('Location:page_guest_user.php');
                }
                if($userRole == 'admin')
                {
                  header('Location:page_admin.php');
                }
                exit;
             }
         }
     }      
    //if the user name doesnt exist postbact to the same page with the status variable
    header('Location:page_login.php?status=notamember');
    closeConnection($dbConnect);
  }*/
?> 