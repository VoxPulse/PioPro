<?php
include 'C:\wamp64\www\VoxPulse\Controller\entretiensC.php';
$entretiens = new entretiens();

$id = $_POST['id'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$statut = $_POST['statut'];
$url = $_POST['url'];
$id_user = $_POST['id_user'];
$id_offre = $_POST['id_off'];

// Attribution des valeurs à l'instance de entretiensC en utilisant les méthodes setter
$entretiens->setId($id);
$entretiens->setdate($date);
$entretiens->setheure($heure);
$entretiens->setstatut($statut);
$entretiens->seturl($url);
$entretiens->setid_user($id_user);
$entretiens->setid_offre($id_offre);
$entretiensC = new EntretiensC();
$entretiensC->addOffre($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_off']);
header("Location:affiche_entretiens.php");
?>