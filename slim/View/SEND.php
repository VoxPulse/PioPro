<?php

include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';

$E = new UserC;

function genererMotDePasse($longueur = 10) {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $nombreCaracteres = strlen($caracteres);
    $motDePasse = '';

    for ($i = 0; $i < $longueur; $i++) {
        $indexAleatoire = rand(0, $nombreCaracteres - 1);
        $motDePasse .= $caracteres[$indexAleatoire];
    }

    return $motDePasse;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer1/src/Exception.php';
require 'mailer1/src/PHPMailer.php';
require 'mailer1/src/SMTP.php';


if (isset($_POST["email"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'slimsassi5004@gmail.com';
    $mail->Password = 'xxrz yclq pdzu lhbe';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('slimsassi5004@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = "Votre code pour la réinitialisation du mot de passe";
    $code = genererMotDePasse();
    $mail->Body = "Votre code de reinitialisation du mot de passe est : <strong>$code</strong>";
     
    $email=$_POST["email"];

    $E->UpdateToken($email,$code);

    header('Location:RECUP1.php');

    $mail->send();

}
?>
