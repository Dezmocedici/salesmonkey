<?php

function insertModal($conn, $val)
{

  $created = e(date("d-m-Y"));
  $modified = e(date("d-m-Y"));

  if($val == "user")
  {
    if($_POST['submit'])
    {
      $fName = e(ucfirst($_POST['first_name']));
      $lName = e(ucfirst($_POST['last_name']));
      $email = e($_POST['email']);
      $phone = e($_POST['phone']);
      $uType = e($_POST['user_type']);


      if (checkUserQuery($conn, $email, $phone) !== false)
      {
        if (insertUserQuery($conn, $fName, $lName, $email, $phone, $uType) !== false)
        {

          $checkUser = checkUserQuery($conn, $email, $phone);
          $uID = $checkUser["id"];

          insertRelationshipQuery($conn, $uID, $businessID);
        }
      }
    }
  }

  if($val == "audience")
  {
    if($_POST['submit'])
    {
      $fName = e(ucfirst($_POST['first_name']));
      $lName = e(ucfirst($_POST['last_name']));
      $email = e($_POST['email']);
      $phone = e($_POST['phone']);
      $address = e($_POST['address']);
      $uType = e($_POST['user_type']);

      $tag = e($_POST['user_type']);

      insertAudience($conn, $email, $fName, $lName, $phone, $address, $tag);
    }
  }

  if($val == "campaign")
  {
    if($_POST['submit'])
    {
      $fName = e(ucfirst($_POST['first_name']));
      $lName = e(ucfirst($_POST['last_name']));
      $email = e($_POST['email']);
      $phone = e($_POST['phone']);
      $uType = e($_POST['user_type']);

      insertCampaign($conn, $name, $content, $start, $end, $status);
    }
  }

  if($val == "tag")
  {
    if($_POST['submit'])
    {
      $name = e(ucfirst($_POST['tag_name']));
      $desc = e(ucfirst($_POST['description']));
      $cID = e($_POST['colour']);

      if (insertTag($conn, $cID, $name, $desc, $created, $modified) !== false)
      {
        if (checkTag($conn, $cID) !== false)
        {
          $customerID = checkTag($conn, $cID);
          insertTagRegister($conn, $customerID);
        }
      }
    }
  }
}

function updateModal($conn, $val) // Edited by Jay 24 Aug 3:32 AM
{

  $modified = e(date("d-m-Y"));

  if ($val == "user")
  {
    if(isset($_POST['submit']))
    {
      //GET METHOD
      $id = e($_GET['id']);

      //POST METHOD
      $fName = e(ucfirst($_POST['fName']));
      $lName = e(ucfirst($_POST['lName']));
      $email = e($_POST['email']);
      $phone = e($_POST['phone']);
      $modified = e(date("d-m-Y"));

      //TODO:Add valiidation code here


      //DONE: Add SQL Query
      updateUserQuery($conn, $id, $fName, $lName, $email, $phone, $modified);
    }
  }

  if ($val == "audience")
  {
    if(isset($_POST['submit']))
    {
      //GET METHOD
      $id = e($_GET['id']);

      //POST METHOD
      $fName = e(ucfirst($_POST['fName']));
      $lName = e(ucfirst($_POST['lName']));
      $email = e($_POST['email']);
      $phone = e($_POST['phone']);
      $modified = e(date("d-m-Y"));

      $tag = e($_POST['user_type']);

      //TODO:Add valiidation code here


      //DONE: Add SQL Query
      updateUserQuery($conn, $id, $fName, $lName, $email, $phone, $address, $modified);
    }
  }

  if($val == "campaign")
  {
    if($_POST['update'])
    {
      //GET METHOD
      $id = e($_GET['id']);

      //POST METHOD
      $fName = e(ucfirst($_POST['first_name']));
      $lName = e(ucfirst($_POST['last_name']));
      $email = e($_POST['email']);
      $phone = e($_POST['phone']);
      $uType = e($_POST['user_type']);

      updateCampaignQuery($conn, $id, $name, $content, $start, $end, $status, $modified);
    }
  }

  if($val == "tag")
  {
    if($_POST['update'])
    {
      //GET METHOD
      $id = e($_GET['id']);

      //POST METHOD
      $name = e(ucfirst($_POST['tag_name']));
      $desc = e(ucfirst($_POST['description']));
      $cID = e($_POST['colour']);

      updateTagQuery($conn, $id, $cID, $name, $desc, $modified);
    }
  }

}

function deleteModal($conn, $val)
{
  if ($val == "user")
  {
    if(isset($_POST['delete']))
    {
      //GET METHOD
      $id = e($_GET['id']);

      deleteUserQuery($conn, $id, $fName, $lName, $email, $phone, $modified);
    }
  }

  if ($val == "audience")
  {
    if(isset($_POST['delete']))
    {
      //GET METHOD
      $id = e($_GET['id']);

      //DONE: Add SQL Query
      deleteAudienceQuery($conn, $id, $fName, $lName, $email, $phone, $address, $modified);
    }
  }

  if($val == "campaign")
  {
    if($_POST['delete'])
    {
      //GET METHOD
      $id = e($_GET['id']);

      deleteCampaignQuery($conn, $id, $name, $content, $start, $end, $status, $modified);
    }
  }

  if($val == "tag")
  {
    if($_POST['delete'])
    {
      //GET METHOD
      $id = e($_GET['id']);

      deleteTagQuery($conn, $id, $cID, $name, $desc, $modified);
    }
  }
}
