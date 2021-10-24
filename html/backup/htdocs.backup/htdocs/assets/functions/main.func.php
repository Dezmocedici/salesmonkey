<?php
if (!defined("permit"))
{
  header('LOCATION: ' . 'http://' . $_SERVER['SERVER_NAME']  . '/404.php' . '?alert=bad-request-direct-access-not-permitted');
  exit();
}

function e($val)
{
  global $conn;
  return mysqli_real_escape_string($conn, trim($val));
}

function dataTablesLink($val) // Improve by Jay 22 Aug 10:49 PM
{
  $url = $_SERVER['PHP_SELF'];
  $page = array("/home/i", "/organisation/i","/business/i", "/campaigns/i", "/audience/i"); //new apporch making code shorter
  $array = trim(count($page));

  for ($i = 0; $i < $array; $i++)
  {
    if ($val == "link" && preg_match($page[$i], $url))
    {
      echo '<link rel="stylesheet" type="text/css" href="assets/datatables/dataTables.bootstrap4.min.css"/>';
    }
    else if ($val == "script" && preg_match($page[$i], $url))
    {
      echo '<script type="text/javascript" src="assets/datatables/table.function.js"></script>';
    }
  }
}

function buildUserTypeSelector()
{
  if ($_SESSION['user_type'] == 0)
  {
    echo '<option value="0">Staff</option>';
  }
  if ($_SESSION['user_type'] == 1)
  {
    echo '<option value="0">Staff</option>';
    echo '<option value="1">Manager</option>';
  }
}

function redirect($page)
{
  echo '<script>window.location.href="' . 'http://' . $_SERVER['SERVER_NAME'] . '/' . $page .  '.php' . '"</script>';
}

function redirectWithMessage($page, $error)
{
  echo '<script>window.location.href="' . 'http://' . $_SERVER['SERVER_NAME'] . '/' . $page .  '.php?' . $error . '"</script>';
}

//generate left sidebar only for pages that required login
function generateSidebar()
{
  $url = $_SERVER['PHP_SELF'];
  $login = "/index/i";
  $register = "/register/i";
  $resetPassword = "/resetPassword/i";
  $forgetPassword = "/forgetPassword/i";

  if(!preg_match($login, $url) && !preg_match($register, $url) && !preg_match($resetPassword, $url) && !preg_match($forgetPassword, $url))
  {
    include ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/sidebar.inc.php");
  }
}

function generateValidator()
{
  $url = $_SERVER['PHP_SELF'];
  $profile = "/profile/i";
  $register = "/register/i";
  $resetPassword = "/resetPassword/i";

  if(preg_match($profile, $url) || preg_match($register, $url) || preg_match($resetPassword, $url))
  {
    echo '<script src="assets/js/validator.js"></script>';
  }
}

function generateTags($conn)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT tags.name, colours.colour, colours.class FROM tag_register INNER JOIN tags ON tag_register.tag_id = tags.id INNER JOIN colours ON tags.colour_id = colours.id WHERE tag_register.business_id = $businessID GROUP BY tags.name;";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result))
  {
    echo '<li><input type="checkbox" id="' . $row["name"] . '" value="' .$row["name"] . '"><label for="' . $row["name"] . '">' . $row["name"] . '</label> <a> </a></li>';
  }
  mysqli_free_result($result);
}

function generateEmailBuilder()
{
  $url = $_SERVER['PHP_SELF'];
  $campaigns = "/campaigns/i";

  if(preg_match($campaigns, $url))
  {
    echo '<script src="assets/js/react.development.js"></script>';
    echo '<script src="assets/js/react-dom.development.js"></script>';
    echo '<script src="assets/js/react-email-editor.js"></script>';
    echo '<script src="assets/js/email-builder.js"></script>';
  }
}

function emptyRegisterFields($firstName, $lastName, $email, $phone, $password, $passwordRepeat)
{
  $result;
  if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($passwordRepeat) || empty($phone))
  {
    $result = true;
  }
  else
  {
    $result = false;
  }
  return $result;
}

function emptyRegisterBusiness($businessName, $businessABN, $businessEmail, $businessPhone, $businessAddress)
{

  $result;

  if(empty($businessName) || empty($businessABN) || empty($businessEmail) || empty($businessPhone) || empty($businessAddress))
  {
    $result = true;
  }
  else
  {
    $result = false;
  }
  return $result;
}

function emptyLoginFields($username, $password)
{
  $result;
  if(empty($username) || empty($password))
  {
    $result = true;
  }
  else
  {
    $result = false;
  }
  return $result;
}

function emptyProfileFields($firstName, $lastName, $email, $phone)
{
  $result;
  if(empty($firstName) || empty($lastName) || empty($email) || empty($phone))
  {
    $result = true;
  }
  else
  {
    $result = false;
  }
  return $result;
}

function invalidEmail($email)
{
  $result;
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    $result = true;
  }
  else
  {
    $result = false;
  }
  return $result;
}

function invalidTypeNumber($number)
{
  $result;

  if(!preg_match("/^[0-9]*$/", $number))
  {
    $result = true;
  }
  else
  {
    $result = false;
  }
  return $result;
}

function matchPassword($password, $passwordRepeat)
{
  $result;

  if($password == $passwordRepeat)
  {
    $result = true;
  }
  else
  {
    $result = false;
  }
  return $result;
}

function register($conn, $userType)
{
  if (isset($_POST['register_btn']))
  {

    $firstName = e(ucfirst($_POST['first_name']));
    $lastName = e(ucfirst($_POST['last_name']));
    $email = e($_POST['email']);
    $password = e($_POST['password']);
    $passwordRepeat = e($_POST['password_repeat']);
    $phone = e($_POST['phone']);

    if(emptyRegisterFields($firstName, $lastName, $email, $phone, $password, $passwordRepeat) !== false)
    {
      header("Location: ../register.php?error=emptyfields");
      exit();
    }
    if(invalidEmail($email) !== false)
    {
      header("Location: ../register.php?error=invalidemail");
      exit();
    }
    if(invalidTypeNumber($phone) !== false)
    {
      header("Location: ../register.php?error=invalidphonenumber");
      exit();
    }

    if(matchPassword($password, $passwordRepeat) == false)
    {
      header("Location: ../register.php?error=password-not-match.php");
      exit();
    }
    if(checkUserQuery($conn, $email, $phone) !== false)
    {
      header("Location: ../register.php?error=userexisted");
      exit();
    }

    if (insertUser($conn, $firstName, $lastName, $email, $password, $phone, $userType) !== false)
    {
      if(signIn($conn, $email, $password) !== false)
      {
        header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/business.php');
        exit();
      }
    }
  }
}

function registerBusiness($conn)
{
  if (isset($_POST['register_business_btn']))
  {
    $url = $_SERVER['PHP_SELF'];
    $business = "/business/i";

    $businessName = mysqli_real_escape_string($conn, ucfirst($_POST['business_name']));
    $businessABN = e($_POST['business_abn']);
    $businessPhone = e($_POST['business_phone']);
    $businessAddress = e($_POST['business_address']);
    $businessEmail = e($_POST['business_email']);
    $businessLink = e($_POST['business_link']);

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

    if(checkBusiness($conn, $businessName, $businessABN, $businessPhone, $businessEmail) !== false)
    {
      header("Location: ../business.php?error=business-existed");
      exit();
    }

    //Insert business into business table
    if(insertBusiness($conn, $businessName, $businessABN, $businessPhone, $businessEmail, $businessAddress, $businessLink) !== false)
    {
      //Check for new business that inserted into database
      if(checkBusiness($conn, $businessName, $businessABN, $businessPhone, $businessEmail) !== false)
      {
        //Store result from function as checkBusiness
        $checkBusiness = checkBusiness($conn, $businessName, $businessABN, $businessPhone, $businessEmail);

        //Set bID by checking business detail from checkBusiness function
        $_SESSION['businessID'] = $checkBusiness['id'];

        //Store uID from session
        $uID = $_SESSION['id'];

        //Store bID from session
        $bID = $_SESSION['businessID'];

        //Insert relationship between uID and bId into relationships table
        if (insertRelationshipQuery($conn, $uID, $bID) !== false)
        {
          //Store email from session
          $email = $_SESSION['email'];

          //Send activate link to email
          sendLink($conn, "activateAccount", $email);

          //Redirect user to active page with success message
          header('Location: http://'. $_SERVER['SERVER_NAME'] . '/active.php?successfully-register-business');
          exit();
        }
      }
    }
  }
}

function signIn($conn, $username, $password)
{
  $checkUser = checkUserQuery($conn, $username, $username);
  $checkRelationship = checkRelationship($conn, $checkUser['id']);

  if ($checkUser == false)
  {
    header("Location: ../index.php?error=user-does-not-exists");
    exit();
  }

  $passwordHashed = $checkUser["password"];
  $checkPassword = password_verify($password, $passwordHashed);

  if ($checkPassword == false)
  {
    header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/index.php?error=incorrect-password');
    exit();
  }
  else if ($checkPassword == true)
  {
    session_start();
    $_SESSION['id'] = $checkUser['id'];
    $_SESSION['first_name'] = $checkUser['first_name'];
    $_SESSION['last_name'] = $checkUser['last_name'];
    $_SESSION['email'] = $checkUser['email'];
    $_SESSION['user_type'] = $checkUser['user_type'];
    $_SESSION['status'] = $checkUser['status'];

    if ($checkRelationship == true)
    {
      $_SESSION['businessID'] = $checkRelationship['business_id'];
    }
  }
}

function login($conn)
{
  if (isset($_POST['login_btn']))
  {
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    if (emptyLoginFields($username, $password) !== false)
    {
      header("Location: ../index.php?error=emptyfields");
      exit();
    }

    signIn($conn, $username, $password);

    if (!isset($_SESSION['businessID']))
    {
      header("Location: ../business.php?business-required");
      exit();
    }
    if ($_SESSION['status'] == 0)
    {
      header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/business.php');
      exit();
    }

    if ($_SESSION['status'] !== 0 && $_SESSION['businessID'])
    {
      header("Location: ../dashboard.php?loginsucess");
      exit();
    }

  }
}

function loggedIn() //DONE 21 Aug 12:44
{
  $url = $_SERVER['PHP_SELF'];
  $loggedIn = array("/dashboard/i", "/active/i", "/audiences/i", "/campaigns/i", "/organisation/i", "/profile/i", "/business/i");
  $notLogIn = array("/index/i", "/register/i", "/passwordReset/i");

  for($i = 0; $i < count($loggedIn) ; $i++)
  {
    if (preg_match($loggedIn[$i], $url) && !isset($_SESSION['id']))
    {
      header("Location: ../index.php");
      exit();
    }
  }

  for ($i=0; $i < count($notLogIn); $i++)
  {
    if (preg_match($notLogIn[$i], $url) && isset($_SESSION['id']))
    {
      header("Location: ../dashboard.php");
      exit();
    }
  }
}


function logout()
{
  if (isset($_POST["logout_btn"]))
  {
    session_unset();
    session_destroy();
    header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/index.php');
    exit();
  }
}


function sendLink($conn, $type, $email = null)
{

  if ($type == "resetPassword")
  {
    if(isset($_POST["send_link_button"]))
    {
      $email = e($_POST["email"]);

      $checkUser = checkUserQuery($conn, $email, $email);

      if ($checkUser == false)
      {
        header('LOCATION:' . $_SERVER['PHP_SELF'] . '?alert=user-does-not-exists');
        exit();
      }
      else if ($checkUser !== fales)
      {
        $uID = $checkUser["id"];

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/resetPassword.php?email=' . $email . '&selector=' . $selector . '&token=' . bin2hex($token);

        $sendTo = $checkUser["email"];
        $subject = "Password Reset | SalesMonkey";
        $message =  '<html><body>';
        $message .= "<p>We have received a request for for password reset. The link to authenticate your user account is below.</p>";
        $message .= "<p>If you are not making this request, please contact our staff to report unauthorised activity.</p>";
        $message .= '<p>Here is your user confirm link: </p><a href="' . $url . '">' . $url . '</a>';
        $message .= '</body></html>';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <no-reply@salesmonkey.local>' . "\r\n";
        $headers .= 'Cc: no-reply@salesmonkey.local' . "\r\n";

        //Delete if token exists
        if (checkTokenQuery($conn, "user_id", $uID) !== false)
        {
          deleteTokenQuery($conn, $uID);
        }

        if (insertTokenQuery($conn, $uID, $selector, $token) !== false)
        {
          mail($sendTo, $subject, $message, $headers);
          header('LOCATION: ' . '/forgetPassword.php' . '?alert=email-successfully');
          exit();
        }
      }
    }
  }

  if ($type == "activateAccount")
  {
    $checkUser = checkUserQuery($conn, $email, $email);

    $uID = $checkUser["id"];

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/active.php?email=' . $email . '&selector=' . $selector . '&token=' . bin2hex($token);

    $sendTo = $email;
    $subject = "Activate your account | SalesMonkey";
    $message =  '<html><body>';
    $message .= "<p>We have received a request for activate user account. The link to authenticate your user account is below.</p>";
    $message .= "<p>If you are not making this request, please contact our staff to report unauthorised activity.</p>";
    $message .= '<p>Here is your user confirm link: </p><a href="' . $url . '">' . $url . '</a>';
    $message .= '</body></html>';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: <no-reply@salesmonkey.local>' . "\r\n";
    $headers .= 'Cc: no-reply@salesmonkey.local' . "\r\n";

    //Delete if token exists
    if (checkTokenQuery($conn, "user_id", $uID) !== false)
    {
      deleteTokenQuery($conn, $uID);
    }

    if (insertTokenQuery($conn, $uID, $selector, $token) !== false)
    {
      mail($sendTo, $subject, $message, $headers);
    }
  }
}

function navitem($attribute)
{
    if($attribute == "class")
    {
      if ($_SESSION['status'] == 0 && empty($_SESSION['businessID']))
      {
          printActive("business");
      }
      if(!empty($_SESSION['businessID']))
      {
          printActive("active");
      }
    }

    if($attribute == "link")
    {
      if ($_SESSION['status'] == 0 && empty($_SESSION['businessID']))
      {
        printLink("business");
      }
      if (!empty($_SESSION['businessID']))
      {
        printLink("active");
      }
    }

    if($attribute == "text")
    {
      if ($_SESSION['status'] == 0 && empty($_SESSION['businessID']))
      {
        echo "Business";
      }

      if (!empty($_SESSION['businessID']))
      {
        echo "Active";
      }
    }


}

//Check Section Created by Jiahao Rong
require_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/functions/check.func.php");

//Modal Section Created by Jedsomboon Promlueng
require_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/functions/modal.func.php");

//Delete Section Created by Trung Thắng
require_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/functions/delete.func.php");

//Fetch Section Created by Aziz Surani
require_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/functions/fetch.func.php");

//Insert Section Created by Shaochen Huang
require_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/functions/insert.func.php");

//Update Section Created by Ryan Shen
require_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/functions/update.func.php");

//Print Section Created by Renee Huang
require_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/functions/print.func.php");


function sendMail($page = null)
{
  $checkUser = checkUserQuery($conn, $email, $email);
  $uID = $checkUser["id"];
  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);
  if($page == "active")
  {
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/passwordreset.php?email=' . $email . '&selector=' . $selector . '&token=' . bin2hex($token);

    $sendTo = $checkUser["email"];
    $subject = "Activate your account| SalesMonkey";
    $message =  '<html><body>';
    $message .= "<p>We have received a user activate request. The link to authenticate your user account is at below.</p>";
    $message .= "<p>If you are not making this request, please contact our staff to report unauthorised activity.</p>";
    $message .= '<p>Here is your user confirm link: </p><a href="' . $url . '">' . $url . '</a>';
    $message .= '</body></html>';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: <no-reply@salesmonkey.local>' . "\r\n";
    $headers .= 'Cc: no-reply@salesmonkey.local' . "\r\n";
  }



  //Delete if token exists
  if (checkTokenQuery($conn, "user_id", $uID) !== false)
  {
    deleteTokenQuery($conn, $uID);
  }

  if (insertTokenQuery($conn, $uID, $selector, $token) !== false)
  {
    mail($sendTo, $subject, $message, $headers);
    header('LOCATION: ' . '/passwordreset.php' . '?alert=email-successfully-sent&selector=' . $selector);
    exit();
  }
}

function resetPassword($conn)
{
  if (!isset($_GET['selector']) || empty($_GET['selector']))
  {
    header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/index.php?error=redirect-from-resetPassword-page&no-selector');
    exit();
  }

  if ($_GET['selector'])
  {
    //Getting selector from URL via GET method
    $selector = e($_GET['selector']);

    $checkToken = checkTokenQuery($conn, "selector", $selector);

    if ($checkToken == false)
    {
      header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/index.php?error=redirect-from-resetPassword-page&incorrect-selector');
      exit();
    }
  }

  if (isset($_POST['reset_password_btn']))
  {
    //form inputs
    $password = e($_POST['password']);
    $passwordRepeat = e($_POST['password_repeat']);

    if ($_GET['selector'])
    {
      //Getting selector from URL via GET method
      $selector = e($_GET['selector']);

      //Getting uID from selector in tokens table
      $checkUser = checkTokenQuery($conn, "selector", $selector);

      //Store uID
      $uID = $checkUser['user_id'];

      if (matchPassword($password, $passwordRepeat) == false)
      {
        header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/resetPassword.php?error=password-do-not-match&selector=' . $selector);
        exit();
      }

      if (updatePasswordQuery($conn, $password, $uID) !== false)
      {
        header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/index.php?successfully-updated-password');
        exit();
      }
    }
  }
}

function activateAccount($conn)
{
  if ($_GET['selector'])
  {
    //Getting selector from URL via GET method
    $selector = e($_GET['selector']);

    $checkToken = checkTokenQuery($conn, "selector", $selector);

    if ($checkToken == false)
    {
      header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/active.php?alert=incorrect-selector');
      exit();
    }

    if ($checkToken == true)
    {
      $uID = $checkToken['user_id'];
      updateUserStatusQuery($conn, $uID);

      $_SESSION['status'] = 1;
      header('LOCATION: http://' . $_SERVER['SERVER_NAME'] . '/dashboard.php?sucess=activated-account');
      exit();
    }
  }
}
