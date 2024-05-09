<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;  // Assurez-vous d'inclure ceci

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Activation du debug pour voir les erreurs

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // A remplacer par votre serveur SMTP
$mail->SMTPAuth = true;
$mail->Username = 'slimsassi5004@gmail.com'; // A remplacer par votre nom d'utilisateur SMTP
$mail->Password = 'slim5004'; // A remplacer par votre mot de passe SMTP
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom('noreply@yourdomain.com', 'Mailer');
$mail->addAddress('recipient@example.com'); // Ajouter un destinataire

$mail->isHTML(true);
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';

try {
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>