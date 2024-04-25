<?php
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E = new UserC;
$email = $_POST['email'];
$password = $_POST['password'];
$A = $E->getUserCO($email, $password);

if ($A == 1) {
    header('Location: dashboard.php');
    exit; // Arrête l'exécution du script après la redirection
} elseif ($A == 2) {
    header('Location: profile.php');
    exit; // Arrête l'exécution du script après la redirection
} elseif ($A == 3) {
    // Redirige vers sign-in.php avec le paramètre d'erreur utilisateur bloqué
    header('Location: sign-in.php?error=utilisateur_bloque');
    exit; // Arrête l'exécution du script après la redirection
} else {
    // Redirige vers sign-in.php avec le paramètre d'erreur utilisateur introuvable
    header('Location: sign-in.php?error=utilisateur_introuvable');
    exit; // Arrête l'exécution du script après la redirection
}
?>
