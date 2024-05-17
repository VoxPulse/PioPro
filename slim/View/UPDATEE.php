<?php
session_start();

include __DIR__ . '\..\Controller\UserC.php';
$E = new UserC();

// Check if all expected POST variables are set
if(isset($_POST['Id'], $_POST['nom'], $_POST['PR'], $_POST['cin'], $_POST['email'], $_POST['tel'], $_POST['role'], $_POST['mdp'], $_POST['etab'], $_POST['DDN'])) {
    $id = $_POST['Id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['PR'];
    $cin = $_POST['cin'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $role = $_POST['role'];
    $mdp = $_POST['mdp'];
    $etab = $_POST['etab'];
    $date_n = $_POST['DDN'];

    // Hash the password if it's not empty
    $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT) ;
    // Update the user if password is provided; otherwise, skip password update

    $E->updateUser($id, $nom, $prenom, $cin, $tel, $email, $role, $hashed_mdp, $etab, $date_n);
        // Retrieve admin ID from session
        $admin_id = $_SESSION['user']['id'];  // Use the actual session variable that holds the user ID

        // Information for logging
        $type_action = "MAJ";
        $description = "màj de l'utilisateur $nom $prenom ($email)";
    
        // Log the action
        $E->HISTO($admin_id, $type_action, $description);

    header('Location: dashboard.php');
    exit;
} else {
    echo "All required fields must be provided.";
    exit;
}
?>
