<?php
	  require_once("include/session.php");
  	require_once("include/queries.php");

  	if($_SERVER["REQUEST_METHOD"] == "POST")
  	{
  		
  		$userID = $_SESSION[sewafs_user_userID];

  		//$nullvariable = NULL;
  		//assign null value to all the fields, in which user dint type anything. And insert as null in database
  		$firstName = $_POST['firstName'];//($_POST['firstName'])? $_POST['firstName']: NULL;
  		$lastName = $_POST['lastName'];//($_POST['lastName']) ? $_POST['lastName'] : NULL;
  		$userName = ($_POST['userName']) ? $_POST['userName'] : NULL;

  		$address1 = $_POST['address1'];//($_POST['address1']) ? $_POST['address1'] : NULL;
  		$address2 = $_POST['address2'];//!empty($_POST['address2']) ? $_POST['address2'] : NULL;

  		$city = $_POST['city']; //!empty($_POST['city']) ? $_POST['city'] : NULL;
  		$state = $_POST['state']; //!empty($_POST['state']) ? $_POST['state'] : NULL;

  		$zipcode = $_POST['zipcode']; //!empty($_POST['zipcode']) ? $_POST['zipcode'] : NULL;
  		$phoneNumber = $_POST['phoneNumber']; //!empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : NULL;

  		//echo( '$firstName');
		require_once("include/db_connection_close.php");

  		//echo $userID;
  		//if username is not null update the user table and change the userName
  		if(!is_null($userName))
  		{
  			include("include/db_connection.php");

  			$updateUserNameQuery = updateUserNameQuery($userName, $userID);

  			mysqli_query($dbConnect, $updateUserNameQuery);

  			$_SESSION['sewafs_user_userName'] = $userName;
  			closeConnection($dbConnect);

  		}
  		
  		include("include/db_connection.php");
  		//Update everything else in User_Profile Table
  		$insertUserProfileQuery = insertUsertProfileQuery($userID, $firstName, $lastName, $address1, $address2, $city, $state, $zipcode, $phoneNumber);
  		//var_dump( $insertUserProfileQuery);
  		mysqli_query($dbConnect, $insertUserProfileQuery);
  		closeConnection($dbConnect);

  		header("Location:user_role_view.php?status=success");

  	}

?>
