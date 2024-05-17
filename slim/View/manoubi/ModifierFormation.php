<?php
include 'C:\wamp64\www\VoxPulse\Controller\formationC.php';
$formation = new Formation();
$formation->setId($_POST['id']);
$formation->setDescription($_POST['description']);
$formation->setDuree($_POST['duree']);
$formation->setPrix($_POST['prix']);
$formation->setImage($_POST['image']);
$formationC = new FormationC();
$formationC->updateFormation($_POST['id'] , $_POST['description'] , $_POST['duree'] , $_POST['prix'] , $_POST['image']);
header("Location: formationvVew.php");
?>