<?php

header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

date_default_timezone_set('Etc/UTC');
require '../vendor/autoload.php';


function sendMail($subject, $receipients, $body, $attachment_file, $type)
{

    $mail = new PHPMailer();
    $mail->isSMTP();
    //Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    //SMTP::DEBUG_CLIENT = client messages
    //SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->AuthType = 'XOAUTH2';
    $email = 'asurani90@gmail.com';
    $clientId = '927373256347-2t893i0qp2odng0b5hada8tb0dnkj8v9.apps.googleusercontent.com';
    $clientSecret = 'XbSX4YKnR3P_UOl5BB_e1d3r';
    $refreshToken = '1//0gNToce0cHXoiCgYIARAAGBASNwF-L9IrGvl_IV4oRwronVuqRqlqTq_hnl7upwlWt-MOWr4ojQ388JYLtYpvVLvBXm05O0TeHrg';
    $provider = new Google(
        [
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]
    );
    $mail->setOAuth(
        new OAuth(
            [
                'provider' => $provider,
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
                'refreshToken' => $refreshToken,
                'userName' => $email,
            ]
        )
    );

    $mail->setFrom($email, 'Aziz Surani');
    foreach ($receipients as $receipient) {
        $mail->addBCC($receipient['email'], $receipient['name']);
    }
    $mail->Subject = $subject;
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->Body = $body;
    if (isset($attachment_file)) {
        if ($type == "template" && file_exists($attachment_file)) {
            $mail->isHTML(true);
            $mail->msgHTML(file_get_contents($attachment_file), __DIR__);
        } else if ($type == "pamphlet") {
            $mail->addAttachment($attachment_file);
        }
    }
    if (!$mail->send()) {
        return "error";
    } else {
        return "success";
    }
}
