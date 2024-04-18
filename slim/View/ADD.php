<?php
// Inclusion du fichier contenant la classe UserC
include 'C:\wamp64\www\VoxPulse\Controller\UserC.php';

// Vérification de l'existence et de l'intégrité des données POST
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['cin']) && isset($_POST['telephone']) && isset($_POST['email']) && isset($_POST['role']) && isset($_POST['motdepasse']) && isset($_POST['ddn']) && isset($_POST['etablissement'])) {
    
    // Création d'une instance de la classe UserC
    $E = new UserC;

    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $motdepasse = $_POST['motdepasse'];
    $ddn = $_POST['ddn'];
    $etablissement = $_POST['etablissement'];

    // Obtention de la date d'aujourd'hui
    $dateAujourdhui = date("Y-m-d H:i:s");
    $Block = "Unblocked";
    $statut = "N/D";
    // Ajout de l'utilisateur avec les données récupérées
    $E->AddUser($nom, $prenom, $cin, $telephone, $email, $role, $motdepasse, $etablissement, $ddn, $dateAujourdhui,$Block,$statut);
    
    // Redirection vers la page de connexion
    header('Location: Sign-in.php');
    exit; // Assurez-vous de terminer le script après la redirection
} else {
    // Si des données POST sont manquantes, affichez un message d'erreur ou redirigez l'utilisateur vers une autre page
    echo "Des données du formulaire sont manquantes.";
    header('Location: Sign-up.php');
}
?>
