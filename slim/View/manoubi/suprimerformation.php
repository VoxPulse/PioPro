<?php
include 'C:\wamp64\www\VoxPulse\Controller\formationC.php';
$formation = new FormationC();
$formation->deleteFormation($_GET['id']);
header("Location: formationvVew.php");
?>