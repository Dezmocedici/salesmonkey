<?php

function deleteTokenQuery($conn, $uID)
{
  $sql = "DELETE FROM tokens WHERE user_id = ?;";
  $stmt = mysqli_stmt_init($conn);
  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "s", $uID);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function deleteBusinessQuery($conn, $id)
{
  $sql = "DELETE FROM businesses WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function deleteTagQuery($conn, $id)
{
  $sql = "DELETE FROM tags WHERE id = ?;";

  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header('LOCATION: ' . $_SERVER['PHP_SELF'] . '?message=success');
}

function deleteUserQuery($conn, $id)
{
  $sql = "DELETE FROM users WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header('LOCATION: ' . $_SERVER['PHP_SELF'] . '?message=success');
}

function deleteCampaignQuery($conn, $id)
{
  $sql = "DELETE FROM campaigns WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header('LOCATION: ' . $_SERVER['PHP_SELF'] . '?message=success');
}

function deleteAudienceQuery($conn, $id)
{
  $sql = "DELETE FROM customers WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);

  checkSQL($stmt, $sql);

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header('LOCATION: ' . $_SERVER['PHP_SELF'] . '?message=success');
}
