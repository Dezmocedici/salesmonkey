<?php

function updatePassword($conn)
{
  if (isset($_POST['update_password_btn']))
  {
    //Retive data from user id
    $checkUser = checkUserProfile($conn);

    //input
    $oldPassword = e($_POST['old_password']);
    $password = e($_POST['password']);
    $passwordRepeat = e($_POST['password_repeat']);

    //Store hashed password
    $passwordHashed = $checkUser['password'];

    //Store uID
    $uID = $checkUser['id'];

    //Compare hashed password with old password
    $checkPassword = password_verify($oldPassword, $passwordHashed);

    if ($checkPassword == false)
    {
      header("Location: ../profile.php?error=incorrect-password=$passwordHashed");
      exit();
    }

    if ($checkPassword == true)
    {
      if(matchPassword($password, $passwordRepeat) == false)
      {
        header("Location: ../profile.php?error=new-password-not-match");
        exit();
      }

      if(matchPassword($password, $passwordRepeat) == true)
      {
        updatePasswordQuery($conn, $password, $uID);
        header("Location: ../profile.php?sucess=update-password");
        exit();
      }
    }
  }
}


function updateUserProfile($conn)
{
  if (isset($_POST['update_profile_btn']))
  {
    //input fields
    $firstName = e(ucfirst($_POST['first_name']));
    $lastName = e(ucfirst($_POST['last_name']));
    $email = e($_POST['email']);
    $phone = e($_POST['phone']);

    //error handler
    if(emptyProfileFields($firstName, $lastName, $email, $phone) !== false)
    {
      header("Location: ../profile.php?error=empty-fields");
      exit();
    }
    if(invalidEmail($email) !== false)
    {
      header("Location: ../profile.php?error=invalid-email");
      exit();
    }
    if(invalidTypeNumber($phone) !== false)
    {
      header("Location: ../profile.php?error=invalid-phone-number");
      exit();
    }

    if(updateUserProfileQuery($conn, $firstName, $lastName, $email, $phone) !== false)
    {
      header("Location: ../profile.php?sucess=update-profile");
      exit();
    }
    else
    {
      header("Location: ../profile.php?error=updateUserProfileQuery-broken");
      exit();
    }
  }
}

function updateBusinessProfile($conn)
{
  if (isset($_POST['update_business_btn']))
  {
    //input fields
    $businessName = mysqli_real_escape_string($conn, ucfirst($_POST['business_name']));
    $businessABN = e($_POST['business_abn']);
    $businessPhone = e($_POST['business_phone']);
    $businessAddress = e($_POST['business_address']);
    $businessEmail = e($_POST['business_email']);
    $businessLink = e($_POST['business_link']);

    //error handler
    if(invalidEmail($businessEmail) !== false)
    {
      header("Location: ../business.php?error=invalid-email");
      exit();
    }

    if(invalidTypeNumber($businessABN) !== false)
    {
      header("Location: ../business.php?error=invalid-ABN-number");
      exit();
    }

    if(invalidTypeNumber($businessPhone) !== false)
    {
      header("Location: ../business.php?error=invalid-phone-number");
      exit();
    }

    if(updateBusinessProfileQuery($conn, $businessName, $businessABN, $businessPhone, $businessAddress, $businessEmail, $businessLink) !== false)
    {
      header("Location: ../organisation.php?successfully=update-organisation-profile");
      exit();
    }
    else
    {
      header("Location: ../organisation.php?error=updateBusinessProfileQuery-function-is-broken");
      exit();
    }
  }
}

function updateBusinessProfileQuery($conn, $name, $abn, $phone, $address, $email, $url)
{
  $businessID = trim($_SESSION['businessID']);
  $modified = time();

  $sql = "UPDATE businesses SET name = IF(LENGTH('$name') = 0, name, ?),
                                 abn = IF(LENGTH('$abn') = 0, abn, ?),
                               phone = IF(LENGTH('$phone') = 0, phone, ?),
                             address = IF(LENGTH('$address') = 0, address, ?),
                               email = IF(LENGTH('$email') = 0, email, ?),
                                 url = IF(LENGTH('$url') = 0, url, ?),
                            modified = IF(LENGTH('$modified') = 0, modified, ?)
   WHERE id = $businessID;";

  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "sssssss", $name, $abn, $phone, $address, $email, $url, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function updatePasswordQuery($conn, $password, $uID)
{
    $sql = "UPDATE users SET password = ? WHERE id = $uID;";
    $stmt = mysqli_stmt_init($conn);

    checkSQL($stmt, $sql);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "s", $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function updateUserProfileQuery($conn, $firstName, $lastName, $email, $phone, $status = null)
{
  $modified = time();

  $sql = "UPDATE users SET first_name = IF(LENGTH('$firstName') = 0, first_name, ?),
                            last_name = IF(LENGTH('$lastName') = 0, last_name, ?),
                                email = IF(LENGTH('$email') = 0, email, ?),
                                phone = IF(LENGTH('$phone') = 0, phone, ?),
                             modified = IF(LENGTH('$modified') = 0, modified, ?)
                             WHERE id = $_SESSION[id];";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $phone, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  $_SESSION['first_name'] = $firstName;
  $_SESSION['last_name'] = $lastName;
  $_SESSION['email'] = $email;
}

function updateTagQuery($conn, $id, $cID, $name, $description)
{
  $modified = time();

  $sql = "UPDATE tags SET name = IF(LENGTH('$name') = 0, name, ?),
                   description = IF(LENGTH('$description') = 0, description, ?),
                     colour_id = IF(LENGTH('$cID') = 0, colour_id, ?),
                      modified = IF(LENGTH('$modified') = 0, modified, ?)
                      WHERE id = $id;";

  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $description, $cID, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header('LOCATION: ' . $_SERVER['PHP_SELF'] . '?message=success');
  exit();
}

function updateUserQuery($conn, $id, $fName, $lName, $email, $phone)
{
  $modified = time();

  $sql = "UPDATE users SET first_name = IF(LENGTH('$fName') = 0, first_name, ?),
                            last_name = IF(LENGTH('$lName') = 0, last_name, ?),
                                email = IF(LENGTH('$email') = 0, email, ?),
                                phone = IF(LENGTH('$phone') = 0, phone, ?),
                             modified = IF(LENGTH('$modified') = 0, modified, ?)
                             WHERE id = $id;";

  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "sssss", $fName, $lName, $email, $phone, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header('LOCATION: ' . $_SERVER['PHP_SELF'] . '?message=success');
}

function updateCampaignQuery($conn, $id, $name, $content, $start, $end, $status)
{
  $modified = time();

  $sql = "UPDATE campaigns SET name = IF(LENGTH('$name') = 0, name, ?),
                   content = IF(LENGTH('$content') = 0, content, ?),
                     start = IF(LENGTH('$start') = 0, start, ?),
                       end = IF(LENGTH('$end') = 0, end, ?),
                    status = IF(LENGTH('$status') = 0, status, ?),
                  modified = IF(LENGTH('$modified') = 0, modified, ?)
                  WHERE id = $id;";

  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "ssssss", $name, $content, $start, $end, $status, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

}

function updateAudienceQuery($conn, $id, $fName, $lName, $email, $phone, $address)
{
  $modified = time();

  $sql = "UPDATE customers SET first_name = IF(LENGTH('$fName') = 0, first_name, ?),
                                last_name = IF(LENGTH('$lName') = 0, last_name, ?),
                                    email = IF(LENGTH('$email') = 0, email, ?),
                                    phone = IF(LENGTH('$phone') = 0, phone, ?),
                                  address = IF(LENGTH('$address') = 0, address, ?),
                                 modified = IF(LENGTH('$modified') = 0, modified, ?)
                                 WHERE id = $id;";

  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "ssssss", $fName, $lName, $email, $phone, $address, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function updateUserStatusQuery($conn, $id, $status = 1)
{
  $modified = time();

  $sql = "UPDATE users SET status = ?, modified = ? WHERE id = $id;";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "ss", $status, $modified);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
