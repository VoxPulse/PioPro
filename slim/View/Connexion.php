<?php
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E = new UserC;

if(isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Récupérer le mot de passe haché de l'utilisateur à partir de la base de données
    $A = $E->getUserCO($email,$password);
    if ($A==2)
    {
        header('Location:dashboard.php');
    }
} else {
    // Données manquantes
    header('Location: sign-in.php?error=donnees_manquantes');
    exit;
}
?>