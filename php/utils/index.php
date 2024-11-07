<?php
include '../../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->CharSet = "UTF-8";
$mail->SMTPAuth = true;
$mail->Username = "facebook.backvia99@gmail.com";
$mail->Password = "clsk cmiq bujt tzav";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;

function sendMail($to, $subject, $body)
{

    // 
    global $mail;
    $mail->SetFrom("anker@gmail.com", "Anker Shop");
    $mail->AddAddress($to);
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    if (!$mail->Send()) {
        return false;
    } else {
        return true;
    }
}
