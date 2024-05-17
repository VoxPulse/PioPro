<?php
include 'C:\wamp64\www\VoxPulse\Controller\entretiensC.php';
$offre_emploi = new Offre_emploi();

$id = $_POST['id'];
$titre_p = $_POST['titre_p'];
$description = $_POST['description'];
$date_fin = $_POST['date_fin'];
$salaire = $_POST['salaire'];
$categorie = $_POST['categorie'];

// Attribution des valeurs à l'instance de offre_emploiC en utilisant les méthodes setter
$offre_emploi->setId($id);
$offre_emploi->setTitre_p($titre_p);
$offre_emploi->setDescription($description);
$offre_emploi->setdate_fin($date_fin);
$offre_emploi->setSalaire($salaire);
$offre_emploi->setCategorie($categorie);
$offre_emploiC = new offre_emploiC();
$offre_emploiC->addOffre($_POST['id'] , $_POST['titre_p'] , $_POST['description'] , $_POST['date_fin'] , $_POST['salaire'], $_POST['categorie']);
header("Location:affiche_offreEmploi.php");
?>