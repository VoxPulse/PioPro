<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';

// Vérification si toutes les données nécessaires sont présentes
if(isset($_POST['nom1'], $_POST['prenom1'], $_POST['Cin1'], $_POST['mail1'], $_POST['Tel'], $_POST['MotdePasse1'], $_POST['ddn1'])) {
    $E = new UserC;
    $nom = $_POST['nom1'];
    $prenom = $_POST['prenom1'];
    $cin = $_POST['Cin1'];
    $email = $_POST['mail1'];
    $telephone = $_POST['Tel']; // Correction de la syntaxe
    $role = "Admin";
    $motdepasse = $_POST['MotdePasse1'];
    $etablissement = "root";
    // Obtention de la date d'aujourd'hui
    $dateAujourdhui = date("Y-m-d H:i:s");
    $ddn = $_POST['ddn1'];
    $Block = "Unblocked";
    $statut = "N/D";
    // Ajout de l'utilisateur avec les données récupérées
    $E->AddUser($nom, $prenom, $cin, $telephone, $email, $role, $motdepasse, $etablissement, $ddn, $dateAujourdhui, $Block, $statut);

    // Redirection vers une autre page après l'ajout de l'utilisateur
    header('Location: dashboard.php');
    exit; // Assurez-vous de terminer le script après la redirection
} else {
    // Si des données requises ne sont pas définies, vous pouvez gérer l'erreur ici
    echo "Toutes les données requises n'ont pas été fournies.";
}
?>
