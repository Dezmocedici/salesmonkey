<?php

function printTitle() // Fix 21 Aug 1:33 PM
{
  $url = $_SERVER['PHP_SELF'];
  $pages = array("/index/i", "/organisation/i", "/home/i", "/register/i", "/passwordReset/i", "/audiences/i", "/campaigns/i", "/profile/i", "/business/i", "/active/i");
  $strings = array("login", "organisation", "dashboard", "register", "password reset", "audiences", "campaigns", "profile", "business", "active");

  for ($i = 0; $i < count($pages); $i++)
  {
    if (preg_match($pages[$i], $url))
    {
      echo ucfirst($strings[$i]) . " | SalesMonkey";
    }
  }
}

function printInitial()
{
  if(!empty($_SESSION))
  {
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    echo ucfirst($firstName) . " " . ucfirst($lastName[0]);
  }
}

function printEmail()
{
  if(!empty($_SESSION))
    {
      if (strlen($_SESSION['email']) > 22)
      {
        $email =  strlen($_SESSION['email']) > 22 ? substr($_SESSION['email'], 0, 22) . "..." : $email;
         echo $email;
      }
      else
      {
        echo $_SESSION['email'];
      }
    }
}

function printStats($conn, $val)
{
  $businessID = trim($_SESSION['businessID']);

  if ($val == 1)
  {
    $sql = "SELECT COUNT(*) AS count FROM campaigns WHERE business_id = $businessID;";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
      $row = mysqli_fetch_assoc($result);
      echo $row["count"];
    }
    mysqli_free_result($result);
  }

  if ($val == 2)
  {
    $sql = "SELECT COUNT(users.id) AS count FROM relationships INNER JOIN users ON relationships.user_id = users.id WHERE relationships.business_id = $businessID ;";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
      $row = mysqli_fetch_assoc($result);
      echo $row["count"];
    }
    mysqli_free_result($result);
  }

  if ($val == 3)
  {
    $sql = "SELECT COUNT(customers.subscribe) AS count FROM customers WHERE customers.business_id = $businessID ;";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
      $row = mysqli_fetch_assoc($result);
      echo $row["count"];
    }
    mysqli_free_result($result);
  }

  if ($val == 4)
  {
    $sql = "SELECT COUNT(tags.name) AS count FROM tag_register INNER JOIN tags ON tag_register.tag_id = tags.id WHERE tag_register.business_id = $businessID;";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
      $row = mysqli_fetch_assoc($result);
      echo $row["count"];
    }

    mysqli_free_result($result);
  }
}

function printAudiences($conn)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT COUNT(*) AS count FROM customers WHERE business_id = $businessID;";
  if ($result = mysqli_query($conn, $sql))
  {
    $row = mysqli_fetch_assoc($result);

    $row = implode($row);

    if ($row > 1)
    {
      echo 'You has ' . $row . ' contacts.';
    }
    else if($row == 1)
    {
      echo 'You has ' . $row . ' contact.';
    }
    else if($row == 0)
    {
      echo 'You has ' . $row . ' contact.';
    }
  }
  mysqli_free_result($result);
}

function printSubscriber($conn)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT subscribe FROM customers WHERE business_id = $businessID AND subscribe = 1;";
  if ($result = mysqli_query($conn, $sql))
  {

    $rowcount = mysqli_num_rows($result);

    if ($rowcount > 1)
    {
      echo ' ' . $rowcount . ' of these are subscribers.';
    }
    else if($rowcount == 1)
    {
      echo " $rowcount of this is subscriber.";
    }
    else if($rowcount == 0)
    {
      echo " There is $rowcount subscriber.";
    }
    else
    {
      echo " Unknown Error.";
    }
    mysqli_free_result($result);
  }
}

function printLink($page)
{
   $page = strtolower($page);
   $link = "http://" . $_SERVER['SERVER_NAME'] . "/" . $page . ".php";
   echo $link;
}

function printBusiness($conn)
{
  if ($_SESSION['id'])
  {
    $id = trim($_SESSION['id']);
    $sql = "SELECT businesses.name FROM relationships INNER JOIN businesses ON relationships.business_id = businesses.id INNER JOIN users ON relationships.user_id = $id LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row)
    {
      echo $row['name'];
      // Free result set
      mysqli_free_result($result);
    }
  }
}

function printActive($page)
{
  $page = strtolower($page);

  $url = $_SERVER['PHP_SELF'];
  $page = "/$page/i";

  if (preg_match($page, $url))
  {
    echo "nav-active";
  }
}
