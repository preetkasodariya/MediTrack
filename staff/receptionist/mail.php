<? include 'connection.php' ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gfg.com;';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'preetkasodariya3008@gmail.com';
    $mail->Password   = 'vhqc fhwb zeud bsyw';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('preetkasodariya3008@gmail.com', 'Name');
    $mail->addAddress('receiver1@gfg.com');
    $mail->addAddress('receiver2@gfg.com', 'Name');

    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body    = 'HTML message body in <b>bold</b> ';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
