<?php
include 'C:\wamp64\www\piopro2\VoxPulse\Controller\formationC.php';
$formation = new FormationC();
$formation->deleteFormation($_GET['id']);
header("Location: formationvVew.php");
?>