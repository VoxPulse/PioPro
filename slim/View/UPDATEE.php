<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
    $E = new UserC;
    $id = $_POST['Id'];
    $nom = $_POST['nom'];
    $prenom= $_POST['PR'];
    $cin = $_POST['cin'];
    $mail = $_POST['email'];
    $tel = $_POST['tel']; // Correction de la syntaxe
    $role = $_POST['role'];
    $mdp = $_POST['mdp'];
    $etab = $_POST['etab'];
    // Obtention de la date d'aujourd'hui
    $date_n = $_POST['DDN'];
    // Ajout de l'utilisateur avec les données récupérées
    $E->updateUser($id,$nom,$prenom, $cin, $tel, $mail, $role, $mdp, $etab, $date_n);

    header('Location: dashboard.php');
    exit; 
?>
