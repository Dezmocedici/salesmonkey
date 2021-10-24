<?php
function getAllCustomers()
{
    include("config.func.php");
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn, $sql);
    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $array;
}

function getCustomersById($ids)
{
    include("config.func.php");
    $sql = "SELECT email FROM customers where id IN (" . $ids . ")";
    $result = mysqli_query($conn, $sql);
    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $array;
}

function getReceipients($emails)
{
    include("config.func.php");
    $emails = implode("','", $emails);
    $sql = "SELECT * FROM customers where email IN ('$emails')";
    $result = mysqli_query($conn, $sql);
    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $array;
}

function getAllCampaigns()
{
    include("config.func.php");
    $sql = "SELECT * FROM campaigns ";
    $result = mysqli_query($conn, $sql);
    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $array;
}


function getAllTemplates()
{
    include("config.func.php");
    $sql = "SELECT * FROM template";
    $result = mysqli_query($conn, $sql);
    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $array;
}

function getTemplatePath($id)
{
    include("config.func.php");
    $sql = "SELECT * FROM template where id = $id";
    $result = mysqli_query($conn, $sql);
    $array = mysqli_fetch_row($result);
    return $array;
}
