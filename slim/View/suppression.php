<?php

include 'C:\wamp64\www\VoxPulse\Controller\UserC.php'; 

    $userId = $_POST['id'];
    $yourClass = new UserC(); // Créez une instance de votre classe
    $yourClass->DeleteUser($userId); // Appelez la fonction de suppression de votre classe
    header('Location:dashboard.php');

?>
