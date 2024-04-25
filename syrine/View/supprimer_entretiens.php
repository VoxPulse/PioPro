<?php
include 'C:\wamp64\www\VoxPulse4\Controller\entretiensC.php';
$entretiensC = new entretiensC();
$entretiensC->deleteentretiens($_GET['id']);
header("Location: affiche_entretiens.php");
?>