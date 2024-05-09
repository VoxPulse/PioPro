
<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\PROJET\VoxPulse\Controller\eventC.php';
    $E = new eventC;
    $titre = $_POST['tit'];
    $description = $_POST['desc'];
    $cout = $_POST['cout'];
    $statut = $_POST['statut'];
    $date = $_POST['date'];
    $lieu = $_POST['lieu'];
    $nb_places = $_POST['nbp'];
    $NBPD=$_POST['nbp'];
    // Ajout de l'utilisateur avec les données récupérées
    $E->AddEvent( $titre,$description, $cout, $statut, $date, $lieu, $nb_places,$NBPD);
   

    $date = date('Y-m-d H:i:s');
    $action="AJOUT";
    $description="ajout evenement  $titre ";
    $E->AddHISTO($action, $description, $date);
    // Redirection vers une autre page après l'ajout de l'utilisateur
    header('Location: dashboard.php?msg');
    exit; // Assurez-vous de terminer le script après la redirection
?>
