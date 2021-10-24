<?php

function checkSQL($stmt, $sql)
{
  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header('LOCATION: ' . $_SERVER['PHP_SELF'] . '?error=invalidsql');
    exit();
  }
}


function checkUserQuery($conn, $email, $phone)
{
  $sql = "SELECT * FROM users WHERE email = ? OR phone = ?;";
  $stmt = mysqli_stmt_init($conn);
  checkSQL($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $email, $phone);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {
    return $row;
  }
  else
  {
    return false;
  }
  mysqli_stmt_close($stmt);
}

function checkRelationship($conn, $userID)
{
  $sql = "SELECT business_id FROM relationships WHERE user_id = ?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("Location:../404.php");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $userID);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {
    return $row;
  }
  else
  {
    return false;
  }
  mysqli_stmt_close($stmt);
}

function checkTag($conn, $colourID)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT customer_id FROM tag_register WHERE business_id = ? and tag_colour = ?;";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("Location:../404.php");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $businessID, $colourID);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {
    return $row;
  }
  else
  {
    return false;
  }
  mysqli_stmt_close($stmt);
}

function checkUserProfile($conn)
{
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM users WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);
  checkSQL($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {
    return $row;
  }
  else
  {
    return false;
  }
  mysqli_stmt_close($stmt);
}

function checkBusinessProfile($conn)
{
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM business WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);
  checkSQL($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {
    return $row;
  }
  else
  {
    return false;
  }
  mysqli_stmt_close($stmt);
}

function checkCustomer($conn, $businessID, $email, $phone)
{
  $sql = "SELECT * FROM customers WHERE email = ? OR phone = ? AND business_id = ?;";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql))
  {
    header("Location:../404.php");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "sss", $email, $phone, $businessID);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {
    return $row;
  }
  else
  {
    return false;
  }
  mysqli_stmt_close($stmt);
}

function checkBusiness($conn, $businessName, $businessABN, $businessPhone, $businessEmail)
{
  $sql = "SELECT * FROM businesses WHERE name = ? OR abn = ? OR phone = ? OR email = ?;";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "ssss", $businessName, $businessABN, $businessPhone, $businessEmail);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {
    return $row;
  }
  else
  {
    return false;
  }
  mysqli_stmt_close($stmt);
}

function checkTokenQuery($conn, $col, $uID)
{
  $sql = "SELECT * FROM tokens WHERE $col = ?;";
  $stmt = mysqli_stmt_init($conn);
  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "s", $uID);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {
    return $row;
  }
  else
  {
    return false;
  }
  mysqli_stmt_close($stmt);
}

function checkIfTaken($conn, $col = "*", $param)
{
  $sql = "SELECT $val FROM users WHERE $param != ? ;";
  $stmt = mysqli_stmt_init($conn);
  checkSQL($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
  {
    return $row;
  }
  else
  {
    return false;
  }
  mysqli_stmt_close($stmt);
}
