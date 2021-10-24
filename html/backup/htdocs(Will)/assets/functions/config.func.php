<?php
//Start Connection Function//
  $serverName = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "salesmonkey";

  $conn = mysqli_connect($serverName, $username, $password, $databaseName);

  //Check if connection is failed
  if (!$conn)
  {
     die("Connection failed: " . mysqli_connect_error());
  }
  //End Connection Function//
 ?>
