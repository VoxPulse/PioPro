<?php
include 'C:\wamp64\www\VoxPulse4\Controller\entretiensC.php';
$entretiens = new entretiens();

$id = $_POST['id'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$statut = $_POST['statut'];
$url = $_POST['url'];
$id_user = $_POST['id_user'];
<<<<<<< HEAD
$id_offre = $_POST['id_off'];
=======
<<<<<<< HEAD
$offre_emploi = $_POST['id_offre'];
=======
$id_off = $_POST['id_off'];
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4

// Attribution des valeurs à l'instance de entretiensC en utilisant les méthodes setter
$entretiens->setId($id);
$entretiens->setdate($date);
$entretiens->setheure($heure);
$entretiens->setstatut($statut);
$entretiens->seturl($url);
$entretiens->setid_user($id_user);
<<<<<<< HEAD
$entretiens->setid_offre($id_offre);
$entretiensC = new EntretiensC();
$entretiensC->addOffre($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_off']);
=======
<<<<<<< HEAD
$entretiens->setoffre_emploi($offre_emploi);
$entretiensC = new entretiensC();
$entretiensC->addentretiens($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_offre']);
=======
$entretiens->setid_off($id_off);
$entretiensC = new entretiensC();
$entretiensC->addentretiens($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_off']);
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
header("Location:affiche_entretiens.php");
?>