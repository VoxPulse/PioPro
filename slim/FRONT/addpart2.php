
<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\VoxPulse\Controller\eventC.php';
    $E = new participationC;
    $B = new eventC;
    $nom = $_POST['nom'];
    $prenom = $_POST['Prenom'];
    
    $email = $_POST['email'];

    $tel =$_POST['tel'];

    $etablissement = $_POST['etablissement'];
    
    $description = " ";
    $id =$_POST['ID'];

    // Ajout de l'utilisateur avec les données récupérées
    $E->AddParticipation($nom, $prenom, $email, $tel,$etablissement,$description,$id);


    // Redirection vers une autre page après l'ajout de l'utilisateur
    header('Location: index.php');
    exit; // Assurez-vous de terminer le script après la redirection
?>
