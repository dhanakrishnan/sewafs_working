<?php
  //var_dump($_POST);
  require_once("include/registration_check.php");
  require_once("include/queries.php");
  require_once("include/db_connection_close.php");
  require_once("include/sewafs_functions.php");

  //echo sizeof($_POST['field']);
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $firstName = trim($_POST['firstName']);
    $firstName = !empty($firstName) ? "'" . $firstName."'": "NULL";
    //echo($firstName);

    $lastName = trim($_POST['lastName']);
    $lastName = !empty($lastName) ? "'" . $lastName."'": "NULL";
    //echo($lastName);

    $emailAddress = trim($_POST['emailID']);
    $emailID = !empty($emailAddress) ? "'" . $emailAddress."'": "NULL";
    //echo($emailID);

    $phoneNo = trim($_POST['phoneNo']);
    $phoneNo = !empty($phoneNo) ? "'" . $phoneNo."'": "NULL";
    //echo($phoneNo);


    $location = trim($_POST['location']);
    $location = !empty($location) ? "'" . $location."'": "NULL";
    //echo($location);


    $otherLocation = trim($_POST['otherLocation']);
    if($otherLocation != "" && $otherLocation != "NULL")
    {
      $location = !empty($otherLocation) ? "'" . $otherLocation."'": "NULL";
    }
    //var_dump($otherLocation);


    $interests = $_POST['field'];
    $interestStr = commaSeparatedString($interests);
    $interestStr = !empty($interestStr) ? "'" . $interestStr."'": "NULL";
    //echo $interestStr;

    $daysAvailable = $_POST['days'];
    $daysAvailableStr = commaSeparatedString($daysAvailable);
    $daysAvailableStr = !empty($daysAvailableStr) ? "'" . $daysAvailableStr."'": "NULL";
    //echo $daysAvailableStr;

    $timeAvailable = $_POST['time'];
    $timeAvailableStr = commaSeparatedString($timeAvailable);
    $timeAvailableStr = !empty($timeAvailableStr) ? "'" . $timeAvailableStr."'": "NULL";
    //echo $timeAvailableStr;

    $otherTime = $_POST['otherTime'];
    $otherTime = !empty($otherTime) ? "'" . $otherTime."'": "NULL";

    $userName = trim($_POST['userName']);
    $userName = !empty($userName) ? "'" . $userName."'": "NULL";
    //var_dump($userName);

    $age = trim($_POST['age']);
    $age = ($age != "---") ? "'" . $age . "'" : "NULL";


    $gender = trim($_POST['gender']);
    $gender = !empty($gender) ? "'" . $gender."'": "NULL";
    //var_dump($gender);  

    $language = $_POST['language'];
    //svar_dump($language);
    $languageStr = commaSeparatedString($language);

    //echo $languageStr;

    $otherLanguage = trim($_POST['otherLanguage']);

    if($otherLanguage != "" && $otherLanguage != "NULL")
    {
      if($languageStr != "" && $languageStr != "NULL")
        $languageStr = $languageStr . "," . $otherLanguage;
      else
        $languageStr =  $otherLanguage;
    }
    //$otherLanguage = !empty($otherLanguage) ? "'" . $otherLanguage."'": "NULL";
    //var_dump($otherLanguage);  
    $languageStr = !empty($languageStr) ? "'" . $languageStr."'": "NULL";

    $hearAboutUsThrough = $_POST['hearAbout'];
    //var_dump($hearAboutUsThrough);
    //exit;
    $hearAboutUsThroughStr = commaSeparatedString($hearAboutUsThrough);
    

    $otherResource = trim($_POST['otherResource']);

    if($otherResource != "" && $otherResource != "NULL")
    {
      if($hearAboutUsThroughStr != "" && $hearAboutUsThroughStr != "NULL")
        $hearAboutUsThroughStr = $hearAboutUsThroughStr . "," . $otherResource;
      else
        $hearAboutUsThroughStr =  $otherResource;
    }

    $hearAboutUsThroughStr = !empty($hearAboutUsThroughStr) ? "'" . $hearAboutUsThroughStr."'": "NULL";

    $skills = trim($_POST['skills']);
    $skills = !empty($skills) ? "'" . $skills."'": "NULL";
    //var_dump($skills);  

    $previousExp = trim($_POST['previousExp']);
    $previousExp = !empty($previousExp) ? "'" . $previousExp."'": "NULL";
    //var_dump($previousExp);  

    $comments = trim($_POST['comments']);
    $comments = !empty($comments) ? "'" . $comments."'": "NULL";
    //var_dump($comments);  

    $emergencyContactName1 = trim($_POST['emergencyContactName1']);
    $emergencyContactName1 = !empty($emergencyContactName1) ? "'" . $emergencyContactName1."'": "NULL";
    //var_dump($emergencyContactName1);

    $emergencyContactNo1 = trim($_POST['emergencyContactNo1']);
    $emergencyContactNo1 = !empty($emergencyContactNo1) ? "'" . $emergencyContactNo1."'": "NULL";
    //var_dump($emergencyContactNo1);


    $emergencyContactRelation1 = trim($_POST['emergencyContactRelation1']);
    $emergencyContactRelation1 = !empty($emergencyContactRelation1) ? "'" . $emergencyContactRelation1."'": "NULL";
    //r_dump($emergencyContactRelation1);

    $emergencyContactName2 = trim($_POST['emergencyContactName2']);
    $emergencyContactName2 = !empty($emergencyContactName2) ? "'" . $emergencyContactName2."'": "NULL";
    //var_dump($emergencyContactName2);

    $emergencyContactNo2 = trim($_POST['emergencyContactNo2']);
    $emergencyContactNo2 = !empty($emergencyContactNo2) ? "'" . $emergencyContactNo2."'": "NULL";
    //var_dump($emergencyContactNo2);


    $emergencyContactRelation2 = trim($_POST['emergencyContactRelation2']);
    $emergencyContactRelation2 = !empty($emergencyContactRelation2) ? "'" . $emergencyContactRelation2."'": "NULL";
    //var_dump($emergencyContactRelation2);


    /*------------ Server Side validation  ------------
      1.  Required Field Validation - (firstName, LastName, emailID, location, emergencyContactName1, emergencyContactNo1, emergencyContactRel1)
      2.  Email Validation
      3.  Phone Number Validation
    */

    if ( !volunteerRegReqFieldValidation($firstName, $lastName, $emailID, $phoneNo, $location, $age, $language, $emergencyContactName1, $emergencyContactNo1, $emergencyContactRelation1))
    {
      header("Location:page_volunteer_registration.php?status=empty");
      exit;
    }
    
    if(!validEmail(trim($_POST['emailID']))){
      header('Location:page_volunteer_registration.php?status=invalidEmail');
      exit;
    }

    if(!validPhoneNumber(trim($_POST['phoneNo'])) || !validPhoneNumber(trim($_POST['emergencyContactNo1']))){
      header('Location:page_volunteer_registration.php?status=invalidPhoneNo');
      exit;
    }




    /*------------ Display the prefilled data in the form when the user is  already registered ------------
      1.  User - userName and emaildID
      2.  User_Profile - firstName, LastName, Phone Number
      3.  Emergency_Contact Table (emergency contact1 and emergency contact2 - if the phone number is given)
      4.  User_Role (userID and roleID) - find the roleID for volunteer role before inserting.
      5.  Volunteer_Profile Table
    */

    /*------------ Insert Following Tables when the user is not already registered ------------
      1.  User - userName and emaildID
      2.  User_Profile - firstName, LastName, Phone Number
      3.  Emergency_Contact Table (emergency contact1 and emergency contact2 - if the phone number is given)
      4.  User_Role (userID and roleID) - find the roleID for volunteer role before inserting.
      5.  Volunteer_Profile Table
    */


      /*----- Insert into User Table -------
        1. Include db_connection.php
        2. Generate a temporary password and mail it to the user.
        3. Get query string
        4. execute the query
        5. get the userID - put it in session variable
      */

      include ("include/db_connection.php");


      //Temporary password generation
      $passwordLength = 6;
      $password = generateTemporaryPassword($passwordLength);
      $hashedPassword = "'" . sha1($password). "'";

      $insertUserQuery = insertVolunteerUserQuery($userName, $emailID, $hashedPassword);
      mysqli_query($dbConnect, $insertUserQuery);

      //echo "UserTable is inserted";
      //echo $password;
      //echo $insertUserQuery;

      /* This is the final session state variables*/
      /*$_SESSION['sewafs_user_emailID'] = $email;
      $_SESSION['sewafs_user_role'] = "volunteer";

      if($userName != "NULL")
        $_SESSION['sewafs_user_userName'] = $userName;
      else
        $_SESSION['sewafs_user_userName'] = $firstName . " " . $lastName;*/

      //Assign Guest Role to the registered user.
      $userID = getUserID($emailAddress);
      //echo $userID;
      $roleID = getRoleID("volunteer");
      //echo $roleID;

      $insertUserRoleQuery = getInsertUserRoleQuery($userID, $roleID);
      //echo $insertUserRoleQuery;

      mysqli_query($dbConnect, $insertUserRoleQuery);

      /*------- Insert User_Profile Table -------- 
         1. get query string
         2. execute the query*/

      $insertVolunteerUserProfileQuery = getInsertVolunteerUserProfileQuery($userID, $firstName, $lastName, $phoneNo);
      //echo $insertVolunteerUserQuery;
      mysqli_query($dbConnect, $insertVolunteerUserProfileQuery);

      //$userProfileID = getUserProfileID($userID);

      /* ////////////////Not Tested Yet//////////////////*/
    /* Emergency Contact Insert */
    $emergencyContactInsertQuery = getEmergencyContactInsertQuery($emergencyContactName1, $emergencyContactNo1);  
    //echo $emergencyContactInsertQuery;
    mysqli_query($dbConnect, $emergencyContactInsertQuery);

    //$emergencyContactIDQuery = getEmergencyContactIDQuery($emergencyContactNo1);
    $emergencyContactID = getEmergencyContactID($emergencyContactNo1);

    $emergencyRelInsertQuery = getEmergencyRelInsertQuery($userID, $emergencyContactID, $emergencyContactRelation1);
    //echo $emergencyRelInsertQuery;
    mysqli_query($dbConnect, $emergencyRelInsertQuery);

    $emergencyContactID2 = "NULL";

    if($emergencyContactNo2 != "" || $emergencyContactNo2 != "NULL")
    {
      $emergencyContactInsertQuery =  getEmergencyContactInsertQuery($emergencyContactName2, $emergencyContactNo2);  
      mysqli_query($dbConnect, $emergencyContactInsertQuery);

      //$emergencyContactIDQuery = getEmergencyContactIDQuery($emergencyContactNo1);
      $emergencyContactID2 = getEmergencyContactID($emergencyContactNo2);

      $emergencyRelInsertQuery = getEmergencyRelInsertQuery($userID, $emergencyContactID2, $emergencyContactRelation2);
      //echo $emergencyRelInsertQuery;
      mysqli_query($dbConnect, $emergencyRelInsertQuery);
    }

    //INsert into Volunteer Table

    $insertVolunteerProfileQuery = getInsertVolunteerProfileQuery($userID, $location, $interestStr, $daysAvailableStr, 
                                    $timeAvailableStr, $otherTime, $age, $languageStr, 
                                    $skills, $previousExp, $hearAboutUsThroughStr, $comments,
                                    $emergencyContactID, $emergencyContactID2);

    //echo $insertVolunteerProfileQuery;
    mysqli_query($dbConnect, $insertVolunteerProfileQuery);

      //////////You have to make it work - send email at the end
      /*$email_body = "Your Temporary Password : ". $password;
      $email_body = $email_body  . "<br> Please login to sewafs.org using your emailID and password.";
      $email_body = $email_body . "<br> Thank You.";*/

      $email_body = "Your Temporary Password : ". $password;
    send_emailto_the_volunteer(trim($_POST['emailID']), $email_body);

    header("Location:page_volunteer_registration.php?status=success");



    /*------------ Update the tables when user is already registered ------------
      1.  User - userName and emaildID
      2.  User_Profile - firstName, LastName, Phone Number
      3.  Emergency_Contact Table (emergency contact1 and emergency contact2 - if the phone number is given)
      4.  User_Role (userID and roleID) - find the roleID for volunteer role before inserting.
      5.  Volunteer_Profile Table - update it when user is already a volunteer
    */


  }

















?>