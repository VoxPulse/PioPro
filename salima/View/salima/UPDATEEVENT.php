<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\PROJET\VoxPulse\Controller\eventC.php';
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

    $date = date('Y-m-d H:i:s');
    $action="MAJ";
    $description="Modifie  l evenement : $titre ";
    $E->AddHISTO($action, $description, $date);

    // Redirection vers une autre page après l'ajout de l'utilisateur
    header('Location: dashboard.php');
    exit; // Assurez-vous de terminer le script après la redirection
?>
