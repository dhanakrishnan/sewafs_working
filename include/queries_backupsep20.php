<?php
require_once("include/db_connection_close.php");

function getUserNameByIDQuery($userID)
{
  return "SELECT userName FROM User WHERE userID = '$userID'";
}

function getRoleNameByIDQuery($roleID)
{
  return "SELECT roleName FROM Role WHERE roleID = '$roleID'";
}

function getUser($emailID)
{
  return "SELECT * FROM User WHERE emailID = '$emailID'";
}

function getUserID($emailID)
{
  include("db_connection.php");
  $connectStr = $dbConnect;

  //$query = "SELECT userID FROM User_Info WHERE emailID = '$emailID'";
  $query = "SELECT userID FROM User WHERE emailID = '$emailID'";

  //echo $query;
  $result = mysqli_query($connectStr, $query);

  if($result->num_rows != 0)
  {
    while($row = mysqli_fetch_array($result))
    {
      return $row['userID'];
    }
  }
  /*else
  {
    echo "Database erro : can't get the userID";
    exit;
  }*/
  closeConnection($dbConnect);
}

function getRoleID($roleName)
{
  //include db_connection.php for making db connection and getting the connection string
  include("db_connection.php");

  //get roleID query for the roleName
  $getRoleIDQuery = "SELECT roleID FROM Role WHERE roleName = '$roleName'";

  $result = mysqli_query($dbConnect, $getRoleIDQuery);

  if($result->num_rows != 0)
  {
    while($row = mysqli_fetch_array($result))
    {
      return $row['roleID'];
    }
  }
}

function getInsertUserRoleQuery($userID, $roleID)
{
  $insertUserRoleQuery = "INSERT INTO User_Role (`userID`, `roleID`) VALUES ('$userID', '$roleID' )";
  return $insertUserRoleQuery;
}

function getUserRole($userID)
{
  //include db_connection.php for making db connection and getting the connection string
  include("db_connection.php");

  //get roleID query for the roleName
  $getUserRoleQuery = "SELECT roleName, rank FROM Role R JOIN User_Role UR ON R.roleID = UR.RoleID WHERE userID = '$userID'";

  //echo $getUserRoleQuery;
  $result = mysqli_query($dbConnect, $getUserRoleQuery);

  $ranks = array();
  if($result->num_rows != 0)
  {
    $index = 0;
    while($row = mysqli_fetch_array($result))
    {
      //echo $row['rank'];
      $ranks[$index] = $row['rank'];
      $index++;
      //return $row['roleName'];
    }
  }
  //var_dump($ranks);
  //echo max($ranks);
  return(min($ranks));
}

//Select username and user ID from user_info table
function getUserNameID()
{
  //return ("SELECT firstName, lastName, userID FROM User_Info");
  return ("SELECT userName, userID FROM User");
}

//Get rolename and ID from the role table
function getRoleNameID()
{
  return("SELECT roleName, roleID FROM Role");
}

function getUserPasswordQuery($emailID)
{
  return "SELECT * FROM User WHERE emailID = '$emailID'";
}

function getUserProfileQuery($userID)
{
  return "SELECT * FROM User_Profile WHERE userID ='$userID'";
}

function getChapterQuery()
{
  return "SELECT * FROM Chapter";
}


function getEmergencyContactID($contactNumber)
{
    include("db_connection.php");

    $emergencyContactIDQuery = "SELECT * FROM Emergency_Contact WHERE contactNumber = $contactNumber";

    //echo $emergencyContactIDQuery;

    $result = mysqli_query($dbConnect, $emergencyContactIDQuery);
    $emergencyContactID ="";
    if($result->num_rows != 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $emergencyContactID = $row['emergencyContactID'];
      }
    

      closeConnection($dbconnect);

      //echo $emergencyContactID;
      return $emergencyContactID;
    }
    else
    {
      return "NULL";
    }
}
///////////////////////////////////          INSERT QUERIES          /////////////////////////////////////////////////

function insertUserRole($userID, $roleID)
{
  return("INSERT INTO User_Role (`userID`, `roleID`) VALUES ('$userID', '$roleID')");
}

function insertUserQuery($userName, $email, $hashedPassword)
{
  return ("insert into User(`userName`,`emailID`,`password`) Values ('$userName','$email','$hashedPassword')");
}

function insertVolunteerUserQuery($userName, $email, $hashedPassword)
{
  return ("insert into User(`userName`,`emailID`,`password`) Values ($userName,$email,$hashedPassword)");
}


function updateUserNameQuery($userName, $userID)
{
  return "UPDATE User SET userName = '$userName' WHERE userID = '$userID'";
}

function insertUsertProfileQuery($userID, $firstName, $lastName, $address1, $address2, $city, $state, $zipcode, $phoneNumber)
{
  $query =  "INSERT INTO User_Profile (`userID`, `firstName`, `lastName`, `address1`, `address2`, `city`, `state`, `zipcode`, `phoneNumber`) 
            VALUES ('$userID', " ;

  $fnstring = empty($firstName)? "NULL":"'".$firstName."'";
  //echo $string;
  $query = $query . $fnstring;//empty($firstName)? "NULL":'$firstName' ;
  $query = $query . "," ;

  $lnString = empty($lastName)? "NULL" :"'".$lastName."'";
  $query = $query . $lnString;//empty($lastName)? "NULL" :'$lastName' ;
  $query = $query  .",";

  $ad1String = empty($address1)? "NULL":"'".$address1."'";
  $query = $query  . $ad1String;;
  $query = $query  .",";

  $ad2String = empty($address2)? "NULL" :"'".$address2."'";
  $query = $query  . $ad2String;
  $query = $query  .",";

  $cityString = empty($city)? "NULL" :"'".$city."'" ;
  $query = $query. $cityString;
  $query = $query  .",";

  $stateString = empty($state)? "NULL" : "'".$state."'";
  $query = $query .  $stateString;
  $query = $query  .",";

  $zipcodeString = empty($zipcode)? "NULL" : "'".$zipcode."'" ;
  $query = $query . $zipcodeString;
  $query = $query  .",";

  $pnString = empty($phoneNumber)? "NULL" :"'".$phoneNumber."'";
  $query = $query  . $pnString ;

  $query = $query .")";
  $query = $query ." ON DUPLICATE KEY UPDATE firstName=COALESCE(";
  $query = $query. $fnstring;
  $query = $query .",firstName),lastName = COALESCE(";
  $query = $query . $lnString;
  $query = $query . ",lastName),address1 = COALESCE( ";
  $query = $query . $ad1String;
  $query = $query . ",address1),address2 = COALESCE(";
  $query = $query. $ad2String;
  $query = $query. ",address2),city = COALESCE(";
  $query = $query . $cityString;
  $query = $query .",city),state = COALESCE(";
  $query = $query. $stateString;
  $query = $query .",state),zipcode = COALESCE(";
  $query = $query. $zipcodeString;
  $query = $query. ",zipcode),phoneNumber = COALESCE(";
  $query = $query. $pnString;
  $query = $query. ",phoneNumber)";

  return $query;
}

function getInsertVolunteerUserProfileQuery($userID, $firstName, $lastName, $phoneNo)
{ 
  $query = "INSERT INTO User_Profile (`userID`,`firstName`, `lastName`, `phoneNumber`) 
            VALUES ('$userID'," . " $firstName, $lastName, $phoneNo) ON DUPLICATE KEY
            UPDATE firstName=$firstName, lastName=$lastName, phoneNumber=$phoneNo";
  return $query;
}

function getInsertVolunteerProfileQuery($userID, $location, $interestStr, $daysAvailableStr, 
                                    $timeAvailableStr, $otherTime, $age, $languageStr, 
                                    $skills, $previousExp, $hearAboutUsThroughStr, $comments,
                                    $emergencyContactID, $emergencyContactID2)
{
  return "INSERT INTO Volunteer_Profile (`userID`,`location`,`volunteerInterest`,`availableDays`,`availableTime`,`otherAvailability`,
                                         `ageGroup`,`languageSpoken`,`skills`,`previousExperience`,`hearAboutUsThrough`,`otherComments`,
                                         `emergencyContactID1`,`emergencyContactID2`) 
          VALUES ('$userID', $location, $interestStr, $daysAvailableStr, 
                                    $timeAvailableStr, $otherTime, $age, $languageStr, 
                                    $skills, $previousExp, $hearAboutUsThroughStr, $comments,
                                    $emergencyContactID, $emergencyContactID2)";
}

function getEmergencyContactInsertQuery($emergencyContactName1, $emergencyContactNo1)
{
    return "INSERT INTO Emergency_Contact (`contactName`,`contactNumber`) VALUES ($emergencyContactName1, $emergencyContactNo1)";
}

function getEmergencyRelInsertQuery($userID, $emergencyContactID, $emergencyContactRelation1)
{
  //$userID = "'".$userID."'";
  return "INSERT INTO Emergency_Contact_Relationship (`userID`,`emergencyContactID`,`relationship`) VALUES ('$userID','$emergencyContactID',$emergencyContactRelation1)";
}
function getUpdatePasswordQuery($userID, $hashedPassword)
{
  return "UPDATE User SET password='$hashedPassword' where userID = '$userID'";
}


?>