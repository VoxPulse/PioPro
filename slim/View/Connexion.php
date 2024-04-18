<?php
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E = new UserC;
$email = $_POST['email'];
$password = $_POST['password'];
$A = $E->getUserCO($email, $password);
if ($A = 1) {
    header('Location: dashboard.php');
}
 else if ($A = 2) {
    header('Location:profile.php');
}
else {
    header('Location: sign-in.php?error=utilisateur_introuvable');
}
?>
