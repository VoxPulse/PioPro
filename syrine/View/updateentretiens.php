<?php
include 'C:\wamp64\www\VoxPulse4\Controller\entretiensC.php';
$entretiensC = new entretiensC();
echo $_POST['id'] ;
echo $_POST['date'] ;
echo $_POST['heure'] ;
echo $_POST['statut'] ;
echo $_POST['url'] ;
echo $_POST['id_user'] ;
echo $_POST['id_offre'] ;
$entretiensC->updateentretiens($_POST['id'] , $_POST['date'] , $_POST['heure'] , $_POST['statut'] , $_POST['url'], $_POST['id_user'], $_POST['id_offre']);
header("Location: affiche_entretiens.php");
?>