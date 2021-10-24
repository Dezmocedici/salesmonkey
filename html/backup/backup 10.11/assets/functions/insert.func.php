<?php

function insertUser($conn, $firstName, $lastName, $email, $password, $phone, $userType)
{
  $created = time();
  $modified = $created;

  $sql = "INSERT INTO users (first_name, last_name, email, password, phone, user_type, created, modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, "ssssssss", $firstName, $lastName, $email, $hashedPassword, $phone, $userType, $created, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function insertBusiness($conn, $businessName, $businessABN, $businessPhone, $businessEmail, $businessAddress, $businessLink)
{
  $created = time();
  $modified = time();

  $sql = "INSERT INTO businesses (name, abn, phone, email, address, url, created, modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    redirectWithMessage("business", "error");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ssssssss", $businessName, $businessABN, $businessPhone, $businessEmail, $businessAddress, $businessLink, $created, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

}

function insertUserQuery($conn, $firstName, $lastName, $email, $phone, $userType) // DONE: 20 Aug 2:52 AM
{
  $businessID = trim($_SESSION['business_id']);
  $password = "#DefaultPassword1";
  $status = 1;
  $created = time();
  $modified = time();

  $sql = "INSERT INTO users (first_name, last_name, email, password, phone, user_type, status created, modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $lastName, $email, $hashedPassword, $phone, $user_type, $status, $created, $modified);
  if (mysqli_stmt_execute($stmt) !== false)
  {
    $uID = checkUserQuery($conn, $email, $phone);

    insertRelationshipQuery($conn, $uID, $businessID);
    mail($email);
  }
  mysqli_stmt_close($stmt);
}

function insertAudience($conn, $email, $firstName, $lastName, $phone, $address, $tag) // DONE: 21 Aug 2:52 PM
{
  $businessID = trim($_SESSION['businessID']);
  $subscribe = 1;
  $created = time();
  $modified = time();

  $sql = "INSERT INTO customers (business_id, first_name, last_name, email, phone, subscribe, address, created, modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    redirectWithMessage("audience", "error");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssssssss", $businessID, $firstName, $lastName, $email, $phone, $subscribe, $address, $created, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function insertCampaignQuery($conn, $name, $content, $start, $end, $status)
{
  $userID = trim($_SESSION['id']);
  $businessID = trim($_SESSION['businessID']);
  $created = time();
  $modified = time();

  $sql ="INSERT INTO campaigns (user_id, business_id, name, content, start, end, status, created, modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    redirectWithMessage("campaigns", "error");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssssssss", $userID, $businessID, $name, $content, $start, $end, $status, $created, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function insertTag($conn, $cID, $name, $desc)
{
  $sql = "INSERT INTO tags (colour_id, name, description, created, modified) VALUES (?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    redirectWithMessage("campaigns", "error");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssss", $cID, $name, $desc, $created, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function insertLog($conn, $activity, $time)
{
  $userID = trim($_SESSION['id']);
  $businessID = trim($_SESSION['businessID']);
  $time = time();

  $sql ="INSERT INTO logs (user_id, business_id, activity, time) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    redirectWithMessage("dashboard", "error");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssss", $userID, $businessID, $activity, $time);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function insertRelationshipQuery($conn, $userID, $businessID)
{
  if(checkRelationship($conn, $userID, $businessID) !== false)
  {
    header("Location: ../business.php?error=relationshipexisted");
    exit();
  }

  $sql = "INSERT INTO relationships (user_id, business_id) VALUES (?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    redirectWithMessage("business", "error");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ss", $userID, $businessID);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function insertTagRegister($conn, $customerID)
{
  $businessID = trim($_SESSION['businessID']);
  $time = time();

  $sql = "INSERT INTO tag_register (customer_id, business_id, tag_id) VALUES (?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    redirectWithMessage("tag", "error");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sss", $customerID, $businessID, $tagID);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function insertTokenQuery($conn, $uID, $selector, $token) // DONE: 20 Aug 2:52 AM
{
  //Store the current date & time in seconds
  $time = time();
  //limit token will be expired in 5 mins
  $expire = $time + 300; // 5 mins = ( 60 secs x 5 times )

  $sql = "INSERT INTO tokens (user_id, selector, token, expire, time) VALUES (?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  $hashedToken = password_hash($token, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssss", $uID, $selector, $hashedToken, $expire, $time);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
