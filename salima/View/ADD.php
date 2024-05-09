<?php
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';

if (isset($_POST['nom'], $_POST['prenom'], $_POST['cin'], $_POST['telephone'], $_POST['email'], $_POST['role'], $_POST['motdepasse'], $_POST['ddn'], $_POST['etablissement'])) {
    $E = new UserC;

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);  // Hash du mot de passe
    $ddn = $_POST['ddn'];
    $etablissement = $_POST['etablissement'];
    $dateAujourdhui = date("Y-m-d H:i:s");
    $Block = "Unblocked";
    $statut = "N/D";

    $E->AddUser($nom, $prenom, $cin, $telephone, $email, $role, $motdepasse, $etablissement, $ddn, $dateAujourdhui, $Block, $statut);

    header('Location: Sign-in.php');
    exit;
} else {
    echo "Des données du formulaire sont manquantes.";
    header('Location: Sign-up.php');
    exit;
}
?>
