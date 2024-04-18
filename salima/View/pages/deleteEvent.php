<?php
include 'C:\wamp64\www\VoxPulse2\VoxPulse\Controller\eventC.php'; // Inclure votre classe contenant la fonction DeleteUser

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $yourClass = new eventC(); // Créez une instance de votre classe
    $yourClass->DeleteEvent($eventId); // Appelez la fonction de suppression de votre classe
    
} else {
    echo 'ID evenement non spécifié.';
}
?>
