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

 