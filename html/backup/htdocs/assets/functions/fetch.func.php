<?php

function fetchAudiences($conn)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT DISTINCT customers.*, users.first_name AS fName, users.last_name AS lName FROM customers INNER JOIN users ON customers.user_id = users.id WHERE business_id = $businessID;";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result))
  {
    $initLastname = str_split(ucfirst($row["lName"]), 1);
    $customerID = $row["id"];

    echo "<tr>";
    echo '<td class="align-middle">' . $row["email"] . '</td>';
    echo '<td class="align-middle">' . ucfirst($row["first_name"]) . " " . ucfirst($row["last_name"]) . '</td>';
    echo '<td class="align-middle">' . $row["phone"] . '</td>';
    fetchTags($conn, $businessID, $customerID);
    if ($row["subscribe"] == 0)
    {
      echo '<td class= "align-middle text-danger">' . 'Not Subscribed' . '</td>';
    }
    else if ($row["subscribe"] == 1)
    {
      echo '<td class= "align-middle text-success">' . 'Subscribed' . '</td>';
    }
    echo '<td class="align-middle">' . $row["fName"] . " " . $initLastname[0] . '</td>';
    echo '<td class="align-middle">' . $row["created"] . '</td>';
    echo '<td class="align-middle">' . $row["modified"] . '</td>';
    echo '<td class="align-middle text-center">';
    echo '<button id="edit_' . $row["user_id"] . '" class="btn btn-warning m-2" type="button" name="button">Edit</button>';
    echo '<button id="delete_' . $row["user_id"] . '" class="btn btn-danger" type="button" name="button">Delete</button>';
    echo '</td>';
    echo "</tr>";
  }
  mysqli_free_result($result);
}

function fetchTagColour($conn)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT colours.colour FROM colours WHERE colours.id NOT IN (SELECT tags.colour_id FROM tag_register INNER JOIN tags ON tag_register.tag_id = tags.id WHERE tag_register.business_id = $businessID);";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result))
  {
    echo '<option value="' . $row["colour"] . '">' . $row["colour"] . '</option>';
  }
  mysqli_free_result($result);
}

function fetchStaff($conn)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT users.first_name, users.last_name, users.email, users.phone, users.created, users.modified, users.id FROM relationships INNER JOIN users ON relationships.user_id = users.id WHERE relationships.business_id = $businessID;";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result))
  {
    $initLastname = $row["last_name"];
    echo '<tr>';
    echo '<td class="align-middle">' . $row["email"] . '</td>';
    echo '<td class="align-middle">' . $row["first_name"] . ' ' . $initLastname[0] . '</td>';
    echo '<td class="align-middle">' . $row["phone"] . '</td>';
    echo '<td class="align-middle">' . $row["created"] . '</td>';
    echo '<td class="align-middle">' . $row["modified"] . '</td>';
    echo '<td class="align-middle text-center">';
    echo '<button data-id="' . $row["id"] . '" class="btn btn-warning m-2 updateUser" type="button" name="button">Edit</button>';
    echo '<button data-id="' . $row["id"] . '" class="btn btn-danger deleteUser" type="button" name="button">Delete</button>';
    echo '</td>';
    echo '</tr>';
  }
  mysqli_free_result($result);
}

function fetchTagInfo($conn)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT colours.colour, colours.class, tags.id ,tags.name, tags.description FROM tag_register INNER JOIN tags ON tag_register.tag_id = tags.id INNER JOIN colours ON tags.colour_id = colours.id WHERE tag_register.business_id = $businessID GROUP BY tags.name;";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result))
  {
    echo '<tr>';
    echo '<td class="align-middle">' . $row["name"] . '</td>';
    echo '<td class="align-middle">' . $row["description"] . '</td>';
    echo '<td class="align-middle"><p class="p-0 m-0 text-' . $row["class"] . '">' . $row["colour"] . '</p></td>';
    echo '<td class="align-middle text-center">';
    echo '<button id="edit_' . $row["id"] . '" class="btn btn-warning m-2" type="button" name="button">Edit</button>';
    echo '<button id="delete_' . $row["id"] . '" class="btn btn-danger" type="button" name="button">Delete</button>';
    echo '</td>';
    echo '</tr>';
  }
  mysqli_free_result($result);
}

function fetchCampaigns($conn)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT campaigns.id, users.first_name, users.last_name, campaigns.created, campaigns.modified, campaigns.start, campaigns.end, campaigns.name, campaigns.status, campaigns.content FROM campaigns INNER JOIN businesses ON campaigns.business_id = businesses.id INNER JOIN users ON campaigns.user_id = users.id WHERE campaigns.business_id = $businessID;";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result))
  {
    $initLastname = $row["last_name"];

    echo '<tr>';
    echo '<td class="align-middle"><p class="text-primary p-0 m-0">' . $row["name"] . '</p><small class="p-0 m-0">Edited by ' .$row["first_name"] . ' ' . $initLastname[0] . ' At: ' . $row["modified"] . '</small>' . '</td>';

    if ($row["status"] == 0)
    {
      echo '<td class="align-middle text-danger">Expired</td>';
    }
    if ($row["status"] == 1)
    {
      echo '<td class="align-middle text-success">Complete</td>';
    }
    if ($row["status"] == 2)
    {
      echo '<td class="align-middle text-success">Draft</td>';
    }
    echo '<td class="align-middle text-center">';
    echo '<button id="edit_' . $row["id"] . '" class="btn btn-warning m-2" type="button" name="button">Edit</button>';
    echo '<button id="delete_' . $row["id"] . '" class="btn btn-danger" type="button" name="button">Delete</button>';
    echo '</td>';
    echo '</tr>';
  }
  mysqli_free_result($result);
}

function fetchActivity($conn)
{
  $businessID = trim($_SESSION['businessID']);

  $sql = "SELECT users.first_name, users.last_name, logs.activity, logs.time FROM logs INNER JOIN users ON logs.user_id = users.id WHERE logs.business_id = $businessID;";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result))
  {
    $initLastname = $row["last_name"];

    echo '<tr>';
    echo '<td class="align-middle">'. $row["activity"] . '</td>';
    echo '<td class="align-middle">'. $row["first_name"] . ' ' . $initLastname[0]  .'</td>';
    echo '<td class="align-middle">'. $row["time"] . '</td>';
    echo '</tr>';

  }
  mysqli_free_result($result);
}

function fetchTags($conn, $businessID, $customerID)
{
  $sql = "SELECT colours.colour, colours.class, tags.id, tags.name FROM tag_register INNER JOIN customers ON tag_register.customer_id = customers.id INNER JOIN tags ON tag_register.tag_id = tags.id INNER JOIN colours ON tags.colour_id = colours.id WHERE tag_register.business_id = $businessID AND customers.id = $customerID;";
  $result = mysqli_query($conn, $sql);
  echo '<td class="align-middle">';
  while ($row = mysqli_fetch_assoc($result))
  {
    echo '<span class = "badge badge-' .$row["class"] . '">' . $row["name"] . '</span>';
    echo " ";
  }
  echo '</td>';
  mysqli_free_result($result);
}
