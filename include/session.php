<?php

// This file is to maintain user session
// A user logs in and closes the browser without logging out, 
//when he enters into the website next time he should directly be send to his home page.

session_start();

function loggedIn()
{
	//Check whether the session is already open.
	return isset($_SESSION[userID]);
}

function confirmloggedIn()
{
	//If user already not logged in, rediect him to the home page.
	if(!loggedIn())
	{
		header("Location:../index.php");

		// or
		//http_redirect("index.php");
	}
}

?>