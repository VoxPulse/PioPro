
<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\VoxPulse\Controller\eventC.php';
    $E = new participationC;
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $etablissement = $_POST['etablissement'];
    $description = $_POST['Description'];
    $id = $_POST['ID'];
    // Ajout de l'utilisateur avec les données récupérées
    $E->AddParticipation($nom, $prenom, $email, $tel,$etablissement,$description,$id);

    // Redirection vers une autre page après l'ajout de l'utilisateur
    header('Location: dashboard.php');
    exit; // Assurez-vous de terminer le script après la redirection
?>
