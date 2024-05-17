<?php
include __DIR__ . '\..\Controller\entretiensC.php';
$entretiensC = new entretiensC();
$entretiensC->deleteentretiens($_GET['id']);
header("Location: affiche_entretiens.php");
?>