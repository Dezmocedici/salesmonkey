<?php
//header('Content-Type: application/json');

define("permit", TRUE);

//include("mailer.php");
if(isset($_POST['add_campaign'])){
$subject = $_POST['subject'];
$body = $_POST['preview_text'];
$ids = $_POST['receipients'];
$name = $_POST['campaign_name'];
$type = $_POST['type'];
$schedule = $_POST['schedule'];
$template_id = $_POST['template'];
$business_id = $_SESSION['business_id'];
$customers = getCustomersById($ids);
$target_file = "";

if ($type == "pamphlet" && isset($_FILES["file"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . time() . '.' . basename($_FILES["file"]["name"]);
    $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo json_encode(array('success' => 'false', 'msg' => "Unable to upload pamphlet"));
        die();
    }
} elseif ($type == "template" && $template_id > 0) {
    $data = getTemplatePath($template_id);
    $target_file = $data[1] . "/template.html";
}
$emails = [];
foreach ($customers as $customer) {
    $emails[] = $customer["email"];
}
$email_str = implode(",", $emails);

if (isset($schedule) && $schedule != "") {
    $sql = "INSERT INTO campaigns (user_id, business_id, name, content, start, end, status, created, modified) values('$name','$email_str','$subject','$body','$target_file','$type' , 'pending')";
    mysqli_query($conn, $sql);
    $id = mysqli_insert_id($conn);
    $sql = "INSERT INTO job values(0,$id,$schedule,'pending')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo json_encode(array('success' => 'true'));
} else {
    $response = sendMail($_POST['subject'], $customers, $_POST['body'], $target_file, $type);
    $upload_ok = 0;
    $sql = "";
    if ($response == "success") {
        $sql = "INSERT INTO campaigns values(0,'$name','$email_str','$subject','$body','$target_file','$type' , 'success')";
        $upload_ok = 1;
    } else {
        $sql = "INSERT INTO campaigns values(0,'$name','$email_str','$subject','$body','$target_file','$type', 'error')";
    }
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        if ($upload_ok == 1) {
            echo json_encode(array('success' => 'true'));
        } else {
            echo json_encode(array('success' => 'false'));
        }
    } else {
        mysqli_close($conn);
        echo json_encode(array('success' => 'false'));
    }
}
}