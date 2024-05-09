
<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\VoxPulse\Controller\eventC.php';
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

    // Redirection vers une autre page après l'ajout de l'utilisateur
    header('Location: dashboard.php');
    exit; // Assurez-vous de terminer le script après la redirection
?>
<script src="C:\wamp64\www\VoxPulse2\VoxPulse\View\pages\script2.js"></script>
