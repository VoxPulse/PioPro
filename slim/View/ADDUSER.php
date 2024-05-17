<?php
session_start();  // Start the session at the beginning

include __DIR__ . '\..\Controller\UserC.php';

$E = new UserC(); // One instance should suffice for all operations


if (isset($_POST['nom1'], $_POST['prenom1'], $_POST['Cin1'], $_POST['mail1'], $_POST['Tel'], $_POST['MotdePasse1'], $_POST['ddn1'])) {
    $nom = $_POST['nom1'];
    $prenom = $_POST['prenom1'];
    $cin = $_POST['Cin1'];
    $email = $_POST['mail1'];
    $telephone = $_POST['Tel'];
    $motdepasse = password_hash($_POST['MotdePasse1'], PASSWORD_DEFAULT);
    $ddn = $_POST['ddn1'];
    $role=$_POST['TA'];

    // Assuming 'Admin' and 'root' are constants, otherwise, they should be variables
    $E->AddUser($nom, $prenom, $cin, $telephone, $email, $role, $motdepasse, "root", $ddn, date("Y-m-d H:i:s"), "Unblocked", "N/D");

    // Retrieve admin ID from session
    $admin_id = $_SESSION['user']['id'];  // Use the actual session variable that holds the user ID

    // Information for logging
    $type_action = "AJOUT";
    $description = "Ajout de l'utilisateur $nom $prenom ($email)";

    // Log the action
    $E->HISTO($admin_id, $type_action, $description);

    // Redirection after action
    header('Location: dashboard.php');
    exit;
}
?>
