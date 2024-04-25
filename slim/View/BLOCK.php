<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';


    $E = new UserC;

    $id = $_POST['Id'];

    $E->blockUserById($id);
    header('Location: dashboard.php');
    exit; 
?>
