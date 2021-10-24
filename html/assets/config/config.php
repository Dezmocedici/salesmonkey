<?php

//Config 
  $type = "Mysql";
  $serverName = "localhost";
  $username = "root";
  $password = "#Password1";
  $databaseName = "salesmonkey";


//Start Connection for function in main.func.php
  $conn = mysqli_connect($serverName, $username, $password, $databaseName);

  //Check if connection is failed
  if (!$conn)
  {
     die("Connection failed: " . mysqli_connect_error());
  }
  //End Connection Function//

//Start Connection for DataTable Editor function
if (defined('DATATABLES'))
{
  $sql_details = array
  (
  	"type" => $type,              // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
  	"user" => $username,               // Database user name
  	"pass" => $password,         // Database password
  	"host" => "",                   // Database host
  	"port" => "",                   // Database connection port (can be left empty for default)
  	"db"   => $databaseName,        // Database name
  	"dsn"  => "",                   // PHP DSN extra information. Set as `charset=utf8mb4` if you are using MySQL
  	"pdoAttr" => array()            // PHP PDO attributes array. See the PHP documentation for all options
  );
}
