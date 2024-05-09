<?php
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E = new UserC;

// Vérifier si l'email est bien posté pour éviter les erreurs
if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    die("Email not provided");
}

// Générer un token sécurisé
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30); // Définit l'heure d'expiration 30 minutes plus tard

// Mettre à jour le token et l'heure d'expiration de l'utilisateur dans la base de données

$mail = require __DIR__ . "/mailer.php";

$updateStatus = $E->updateUserResetToken($email, $token_hash, $expiry);

require 'vendor/autoload.php';

$mail->SetFrom("noreply@example.com");
$mail->addAddress($email);
$mail->Subject = "Password Reset";
$mail->Body = <<<END

click <a href="C:\wamp64\www\VoxPulse\View\RECUP.php?token=$token">
to reset your password.
END;
try{
    $mail->send();

} catch(Exception $e)
{
    echo "Message could not be sent . Mailer Error . {$mail->ErrorInfo}";
}

echo "Message is sent ,check your Inbox .";

?>
