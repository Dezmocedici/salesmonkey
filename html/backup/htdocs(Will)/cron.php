<?php
require_once('config.func.php');
require_once('get.data.php');
require_once('mailer.php');
$currentTime = round(microtime(true) * 1000);
$sql = "SELECT * from job join campaign on job.campaign_id = campaign.id where job.status = 'pending' and job.time < $currentTime";
$result = mysqli_query($conn, $sql);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($array as $data) {
    $res = sendMail($data['subject'], getReceipients(explode(",", $data['recipient'])), $data['body'], $data['media'], $data['type']);
    $sql = "UPDATE job set status = 'done' where campaign_id =" . $data['campaign_id'];
    mysqli_query($conn, $sql);
    if ($res == "error") {
        $sql = "UPDATE campaign set status = 'error' where id =" . $data['campaign_id'];
        mysqli_query($conn, $sql);
    } else {
        $sql = "UPDATE campaign set status = 'success' where id =" . $data['campaign_id'];
        mysqli_query($conn, $sql);
    }
}
