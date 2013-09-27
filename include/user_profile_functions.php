<?php

	require_once("queries.php");

	function getUserProfile($userID)
	{
		include("db_connection.php");
		require_once("db_connection_close.php");

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
?>