<?php
session_start();

include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';
$E = new UserC();

// Check if all expected POST variables are set

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['PP'];
    $cin = $_POST['cin'];
    $email = $_POST['MM'];
    $tel = $_POST['TT'];
    $role = $_POST['role'];
    $etab = $_POST['ETAB'];
    $date_n = $_POST['DD'];



    // Update the user if password is provided; otherwise, skip password update

    $E->updateUser2($id,  $nom, $prenom, $cin, $tel, $mail, $role, $etab, $date_n);
        // Retrieve admin ID from session
        $admin_id = $_SESSION['user']['id'];  // Use the actual session variable that holds the user ID

        // Information for logging
        $type_action = "MAJ";
        $description = "màj de l'utilisateur $nom $prenom ($email)";
    
        // Log the action
        $E->HISTO($admin_id, $type_action, $description);

    header('Location: profile.php');
    exit;
?>
