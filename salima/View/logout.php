<?php
session_start();
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E= new UserC;
$id=$_SESSION['user']['id'];
$E->setUserOffline($id);
session_destroy(); // Détruit toutes les données associées à la session courante.
header("Location: sign-in.php"); // Redirige vers la page de connexion
exit();
?>
