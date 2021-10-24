<?php
header('Content-Type: application/json');
include_once('get.data.php');
$emails = $_POST["emails"];
$emails = explode(",", $emails);
echo json_encode(array("data" => getReceipients($emails)));
