<?php
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php'; // Inclure votre classe contenant la fonction De

if (isset($_GET['id'])) {
                                                                                                                                                                                                                                                                                                                                                     
    $yourClass = new UserC(); // Créez une instance de votre classe
    $yourClass->getUserById( $userId); // Appelez la fonction de suppression de votre classe
    header('Location:./View/dashboard.php');
} else {
    echo 'ID d\'utilisateur non spécifié.';
}
?>