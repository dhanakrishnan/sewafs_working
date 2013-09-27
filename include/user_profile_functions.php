<?php

  require_once("queries.php");
  require_once("db_connection_close.php");

  function getUserProfile($userID)
  {
    include("db_connection.php");
    

    //Select query from queries.php
    $getUserProfileQuery = getUserProfileQuery($userID);

    //Run the query in DB - $dbConnect is from db_connection.php file
    $result = mysqli_query($dbConnect, $getUserProfileQuery);

    $userProfile = array();

    if($result->num_rows != 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
          $userProfile['firstName'] = !is_null($row['firstName']) ? $row['firstName'] : "";
          $userProfile['lastName'] = !is_null($row['lastName'])? $row['lastName']: "";
          $userProfile['address1'] = !is_null($row['address1'])?$row['address1']:"";
          $userProfile['address2'] = !is_null($row['address2'])?$row['address2']:"";
          $userProfile['city'] = !is_null($row['city'])?$row['city']:"";
          $userProfile['state'] = !is_null($row['state'])?$row['state']:"";
          $userProfile['zipcode'] = !is_null($row['zipcode'])?$row['zipcode']:"";
          $userProfile['phoneNumber'] = !is_null($row['phoneNumber'])?$row['phoneNumber']:"";
      }
    }
    //var_dump($userProfile);
    closeConnection($dbconnect);
    return $userProfile;

  } 

  function getVolunteerProfile($userID)
  {
    include("db_connection.php");
    

    //Select query from queries.php
    $getVolunteerProfileQuery = getVolunteerProfileQuery($userID);
    

    //Run the query in DB - $dbConnect is from db_connection.php file
    $result = mysqli_query($dbConnect, $getVolunteerProfileQuery);

    $volunteerProfile = array();

    if($result->num_rows != 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
          $volunteerProfile['location'] = !is_null($row['location']) ? $row['location'] : "";
          $volunteerProfile['volunteerInterest'] = !is_null($row['volunteerInterest'])? $row['volunteerInterest']: "";
          $volunteerProfile['availableDays'] = !is_null($row['availableDays'])?$row['availableDays']:"";
          $volunteerProfile['availableTime'] = !is_null($row['availableTime'])?$row['availableTime']:"";
          $volunteerProfile['otherAvailability'] = !is_null($row['otherAvailability'])?$row['otherAvailability']:"";
          $volunteerProfile['ageGroup'] = !is_null($row['ageGroup'])?$row['ageGroup']:"";
          $volunteerProfile['gender'] = !is_null($row['gender'])?$row['gender']:"";
          $volunteerProfile['languageSpoken'] = !is_null($row['languageSpoken'])?$row['languageSpoken']:"";
          $volunteerProfile['skills'] = !is_null($row['skills'])?$row['skills']:"";
          $volunteerProfile['previousExperience'] = !is_null($row['previousExperience'])?$row['previousExperience']:"";
          $volunteerProfile['hearAboutUsThrough'] = !is_null($row['hearAboutUsThrough'])?$row['hearAboutUsThrough']:"";
          $volunteerProfile['otherComments'] = !is_null($row['otherComments'])?$row['otherComments']:"";
          $volunteerProfile['contactName'] = !is_null($row['contactName'])?$row['contactName']:"";
          $volunteerProfile['emergencyContactID'] = $row['emergencyContactID'];
          $volunteerProfile['contactNumber'] = !is_null($row['contactNumber'])?$row['contactNumber']:"";
          $volunteerProfile['contactRel'] = !is_null($row['relationship'])?$row['relationship']:"";

      }
      //var_dump($userProfile);
    closeConnection($dbconnect);
    return $volunteerProfile;
    }
    return NULL;
    

  } 

  function getEmergencyContact2($userID, $emergencyContactID)
  {
    include("db_connection.php");
    

    //Select query from queries.php
    $getEmergencyContact2Query = getEmergencyContact2Query($userID, $emergencyContactID);
    

    //Run the query in DB - $dbConnect is from db_connection.php file
    $result = mysqli_query($dbConnect, $getEmergencyContact2Query);

    $emergencyContact2 = array();

    if($result->num_rows != 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
          $emergencyContact2['contactName'] = $row['contactName'];
          $emergencyContact2['contactNumber'] = $row['contactNumber'];
          $emergencyContact2['relationship'] = $row['relationship'];

      }
    }
    //var_dump($userProfile);
    closeConnection($dbconnect);
    return $emergencyContact2;
  }
  
  function getVolunteers()
  {
    include("db_connection.php");
    

    //Select query from queries.php
    $getVolunteersQuery= getVolunteersQuery();
    
    //echo $getVolunteersQuery;
    //Run the query in DB - $dbConnect is from db_connection.php file
    $result = mysqli_query($dbConnect, $getVolunteersQuery);

    $volunteers = array();

    if($result->num_rows != 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $volunteers[$row['userID']] = array(  'firstName' => !is_null($row['firstName']) ? $row['firstName'] : "",
                            'lastName' => !is_null($row['lastName'])? $row['lastName']: "",
                            'userName' => !is_null($row['userName'])? $row['userName']: "",
                            'fullName' => (($row['firstName']. " " . $row['lastName']) != " ")? $row['firstName']. " " . $row['lastName'] : $row['userName'],
                            'phoneNumber' => !is_null($row['phoneNumber'])?$row['phoneNumber']:"",
                            'location' => !is_null($row['location']) ? $row['location'] : "",
                            'volunteerInterest' => !is_null($row['volunteerInterest'])? $row['volunteerInterest']: "",
                            'availableDays' => !is_null($row['availableDays'])?$row['availableDays']:"",
                            'availableTime' => !is_null($row['availableTime'])?$row['availableTime']:"",
                            'otherAvailability'  =>!is_null($row['otherAvailability'])?$row['otherAvailability']:"",
                            'ageGroup'  =>!is_null($row['ageGroup'])?$row['ageGroup']:"",
                            'gender' => !is_null($row['gender'])?$row['gender']:"",
                            'languageSpoken' => !is_null($row['languageSpoken'])?$row['languageSpoken']:"",
                            'skills' => !is_null($row['skills'])?$row['skills']:"",
                            'previousExperience' => !is_null($row['previousExperience'])?$row['previousExperience']:"",
                            'hearAboutUsThrough' => !is_null($row['hearAboutUsThrough'])?$row['hearAboutUsThrough']:"",
                            'otherComments' => !is_null($row['otherComments'])?$row['otherComments']:"",
                            'contactName' => !is_null($row['contactName'])?$row['contactName']:"",
                            'emergencyContactID' => $row['emergencyContactID'],
                            'contactNumber' => !is_null($row['contactNumber'])?$row['contactNumber']:"",
                            'contactRel' => !is_null($row['relationship'])?$row['relationship']:""

                          );
        

      }
      //var_dump($userProfile);
    closeConnection($dbconnect);
    return $volunteers;
    }
    return NULL;
  }
?>