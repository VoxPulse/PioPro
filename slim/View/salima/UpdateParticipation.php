<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\VoxPulse\Controller\eventC.php';
    $E = new participationC;
    $id = $_POST['IDD'];
    $nom = $_POST['NOM'];
    $prenom = $_POST['PRENOM'];
    $email = $_POST['EMAIL'];
    $tel = $_POST['TEL'];
    $etablissement = $_POST['ETABLISSEMENT'];
    $description = $_POST['description'];
    $idE = $_POST['Id_Event'];
    // Ajout de l'utilisateur avec les données récupérées
    $E->UpdateParticipation($id, $nom, $prenom, $email, $tel, $etablissement, $description, $idE);

    header('Location: dashboard.php');
    exit; // Assurez-vous de terminer le script après la redirection
?>
