<?php
session_start();
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E = new UserC;

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Récupérer les données de l'utilisateur y compris le mot de passe hashé
    $user = $E->getUser($email);  // Supposons que cette méthode renvoie les données de l'utilisateur
    if (password_verify($password, $user['mdp'])) {
        // Si le mot de passe est correct et l'utilisateur existe
        $_SESSION['user'] = $user;  // Stockage des données utilisateur dans la session
        if ($user['role'] == "Admin") {
            $id=$user['id'];
            $E->setUserOnline($id);
            header('Location: dashboard.php'); // Redirection vers le tableau de bord admin
        } else {
            $id=$user['id'];
            $E->setUserOnline($id);
            header('Location: profile.php'); // Redirection vers le profil utilisateur
        }
        exit;
    } else {
        $_SESSION['user'] = $user;  // Stockage des données utilisateur dans la session
        if ($user['role'] == "Admin") {
            header('Location: dashboard.php'); // Redirection vers le tableau de bord admin
        } else {
            header('Location: profile.php'); // Redirection vers le profil utilisateur
        }
        exit;
    }
} else {
    // Si des données POST sont manquantes
    header('Location: sign-in.php?error=donnees_manquantes');
    exit;
}
