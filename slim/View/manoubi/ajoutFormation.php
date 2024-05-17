<?php
include 'C:\wamp64\www\VoxPulse\Controller\formationC.php';
$formation = new Formation();

// Récupération des valeurs depuis les données POST (à adapter selon vos champs)
$id = $_POST['id'];
$description = $_POST['description'];
$duree = $_POST['duree'];
$prix = $_POST['prix'];
$image = $_POST['image'];

// Attribution des valeurs à l'instance de Formation en utilisant les méthodes setter

$formationC = new FormationC();
$formationC->addFormation($_POST['id'] , $_POST['description'] , $_POST['duree'] , $_POST['prix'] , $_POST['image']);
//header("Location: formationvVew.php");
?>