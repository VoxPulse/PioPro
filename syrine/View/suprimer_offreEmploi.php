<?php
include 'C:\wamp64\www\VoxPulse4\Controller\offre_emploiC.php';
$offre_emploiC = new Offre_emploiC();
$offre_emploiC->deleteOffre($_GET['id']);
header("Location: affiche_offreEmploi.php");
?>