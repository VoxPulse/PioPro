<?php
include __DIR__ . '\..\Controller\offre_emploiC.php';
$offre_emploiC = new Offre_emploiC();
$offre_emploiC->deleteOffre($_GET['id']);
header("Location: affiche_offreEmploi.php");
?>