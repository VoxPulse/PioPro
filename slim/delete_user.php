<?php

session_start();

include 'C:\wamp64\www\VoxPulse\Controller\UserC.php'; // Inclure votre classe contenant la fonction DeleteUser
// Redirection si l'utilisateur n'est pas connecté


    $userId = $_GET['id'];
    $yourClass = new UserC(); // Créez une instance de votre classe
    $yourClass->DeleteUser($userId); // Appelez la fonction de suppression de votre classe
    $admin_id = $_SESSION['id']; // Récupérer l'ID de l'admin connecté
    $type_action = "SUPP";  // Type d'action effectuée
    $description = "supression de  $nom $prenom ($email)";  // Description de l'action
    
            // Retrieve admin ID from session
            $admin_id = $_SESSION['user']['id'];  // Use the actual session variable that holds the user ID

            // Information for logging
            $type_action = "Suppression";
            $description = "Suppression  de l'utilisateur ID=$userId";
        
            // Log the action
            $yourClass->HISTO($admin_id, $type_action, $description);
    header('Location:./View/dashboard.php');

?>
