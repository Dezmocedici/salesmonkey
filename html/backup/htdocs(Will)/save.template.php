<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Content-Type: application/json');
include("config.func.php");

$design = $_POST["design"];
$html = $_POST["html"];
$name = $_POST["name"];

if (empty($design) || empty($html) || empty($name)) {
    echo json_encode(array('success' => 'false', "msg" => "Please fill all fields"));
    die();
}

$folderpath = "templates/" . time();
mkdir($folderpath,0777, true);
$myfile = fopen($folderpath . "/template.html", "w");
fwrite($myfile, $html);

$myfile2 = fopen($folderpath . "/design.json", "w");
fwrite($myfile2, $design);


$sql = "INSERT INTO template values(0,'$folderpath','$name')";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array('success' => 'true'));
} else {
    echo json_encode(array('success' => 'false', "msg" => mysqli_error($conn)));
}
