
<?php
include 'C:\wamp64\www\VoxPulse\Controller\eventC.php'; // Inclure votre classe contenant la fonction DeleteUser

$E = new eventC;

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $yourClass = new eventC(); // Créez une instance de votre classe
    $yourClass->DeleteEvent($eventId); // Appelez la fonction de suppression de votre classe

    $date = date('Y-m-d H:i:s');
    $action="suppression";
    $description="suppression de  evenement id:  $eventId ";
    $E->AddHISTO($action, $description, $date);
    
} else {
    echo 'ID evenement non spécifié.';
}
?>
