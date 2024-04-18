
<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\VoxPulse2\VoxPulse\Controller\eventC.php';
    $E = new eventC;
    $id = $_POST['Id'];
    $titre = $_POST['TIT'];
    $description = $_POST['DESC'];
    $cout = $_POST['COUT'];
    $statut = $_POST['STATUT'];
    $date = $_POST['Date'];
    $lieu = $_POST['L'];
    $nb_places = $_POST['NOMP'];
    // Ajout de l'utilisateur avec les données récupérées
    $E->UpdateEvent($id,$img,$titre, $description, $cout, $statut, $date, $lieu, $nb_places);

    // Redirection vers une autre page après l'ajout de l'utilisateur
    header('Location: dashboard.php');
    exit; // Assurez-vous de terminer le script après la redirection
?>