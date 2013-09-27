<?php
  //Create Database connection
  $con = mysqli_connect("localhost", "root", "password", "Family_Services");
  //check Database connection and produce error if not connected
  if(mysqli_connect_errno($con)){
      echo "Failed to connect to MYSQL :" . mysqli_connect_errno($con);
  }

  ?>