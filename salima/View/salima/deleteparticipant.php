
<?php
include 'C:\wamp64\www\PROJET\VoxPulse\Controller\eventC.php'; // Inclure votre classe contenant la fonction DeleteUser

$E = new eventC;

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $yourClass = new participationC; // Créez une instance de votre classe
    $yourClass->DeleteParticipation($eventId); // Appelez la fonction de suppression de votre classe

    $date = date('Y-m-d H:i:s');
    $action="Suppression";
    $description="Suppression du participant id : $eventId ";
    $E->AddHISTO($action, $description, $date);
    
} else {
    echo 'ID evenement non spécifié.';
}
?>
