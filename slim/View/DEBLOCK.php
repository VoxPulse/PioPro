<?php
// Inclusion du fichier contenant la classe UserC
include __DIR__ . '\..\Controller\UserC.php';
    $E = new UserC;
    $id = $_GET['id'];
    $E->DeblockUserById($id);
    header('Location: dashboard.php');
    exit; 
?>
