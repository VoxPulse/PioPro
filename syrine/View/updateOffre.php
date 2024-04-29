<?php
include 'C:\wamp64\www\VoxPulse4\Controller\offre_emploiC.php';
$Offre_emploiC = new Offre_emploiC();
echo $_POST['id'] ;
echo $_POST['titre_p'] ;
echo $_POST['description'] ;
echo $_POST['date_fin'] ;
echo $_POST['salaire'] ;
echo $_POST['categorie'] ;
$Offre_emploiC->updateOffre($_POST['id'] , $_POST['titre_p'] , $_POST['description'] , $_POST['date_fin'] , $_POST['salaire'], $_POST['categorie']);
header("Location: affiche_offreEmploi.php");
?>