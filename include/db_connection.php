<?php

	include("constants.php");
	//Connect to Databse
	$dbConnect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	//check Database connection and produce error if not connected
    if(!$dbConnect){
      echo "Error - Could not connect to MySQL,Database access restricted";
      exit;
	}

	$dbName = mysqli_select_db($dbConnect, DB_NAME);
	if(!$dbName)
	{
		echo "Error - Could not connect to MySQL:Database not found";
      exit;
	}


?>