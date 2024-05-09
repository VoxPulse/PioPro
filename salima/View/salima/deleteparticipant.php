
<?php
include 'C:\wamp64\www\VoxPulse\Controller\eventC.php'; // Inclure votre classe contenant la fonction DeleteUser

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $yourClass = new participationC; // Créez une instance de votre classe
    $yourClass->DeleteParticipation($eventId); // Appelez la fonction de suppression de votre classe
    
} else {
    echo 'ID evenement non spécifié.';
}
?>
