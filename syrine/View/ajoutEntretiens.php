<?php
include 'C:\wamp64\www\VoxPulse4\Controller\entretiensC.php';
$entretiens = new entretiens();

$id = $_POST['id'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$statut = $_POST['statut'];
$url = $_POST['url'];
$id_user = $_POST['id_user'];
$offre_emploi = $_POST['id_offre'];

// Attribution des valeurs à l'instance de entretiensC en utilisant les méthodes setter
$entretiens->setId($id);
$entretiens->setdate($date);
$entretiens->setheure($heure);
$entretiens->setstatut($statut);
$entretiens->seturl($url);
$entretiens->setid_user($id_user);
$entretiens->setoffre_emploi($offre_emploi);
$entretiensC = new entretiensC();
$entretiensC->addentretiens($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_offre']);
header("Location:affiche_entretiens.php");
?>